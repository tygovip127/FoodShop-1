<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    use StorageImageTrait, DeleteModelTrait;

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Show all products for users
     */
    public function showProducts(Request $request)
    {
        $categories = Category::all();
        $category_id=$request->get('category_id');
        // $sort_price= $request->get('sort_price');

        $url= url()->current()."?";

        if($category_id===null){
            $products = Product::paginate(9);
        }else{
            $products=Product::where('category_id', '=', $category_id)->paginate(9);
            $url= $url."category_id=".$category_id."&&";
        }

        // if($sort_price=="asc"){
        //     $products= Product::orderBy('sell_value', 'asc')->paginate(9);
        //     $url=$url."sort_price=".$sort_price."&&";
        // }elseif($sort_price=="desc"){
        //     $products= Product::orderBy('sell_value', 'desc')->paginate(9);
        //     $url=$url."sort_price=".$sort_price."&&";
        // }
        return view('products', [
            'products' => $products,
            'categories' => $categories,
            'url' => $url
        ]);
    }

    public function index()
    {
        $this->authorize('list_product');
        $products = Product::latest()->paginate(10);
        return view('admin.product-management', ['products' => $products]);
    }

    public function create()
    {
        $this->authorize('create_product');
        $categories = Category::all();
        return view('products.create', ['categories' => $categories]);
    }

    public function store(StoreProductRequest $request)
    {
        $this->authorize('create_product');
        try {
            DB::beginTransaction();
            $data_upload_feature_image = $this->storageTraitUpload($request, 'feature_image_path', 'product');

            $data_product_create = [
                'title' => $request->input('title'),
                'category_id' => $request->input('category_id'),
                'restock_value' => $request->input('restock_value'),
                'sell_value' => $request->input('sell_value'),
                'subtitle' => $request->input('subtitle'),
            ];

            if (!empty($data_upload_feature_image)) {
                $data_product_create['feature_image_path'] = $data_upload_feature_image['file_path'];
            }

            $product = Product::create($data_product_create);

            if ($request->hasFile('image_path')) {

                foreach ($request->file('image_path') as $file) {
                    $data_upload_images = $this->storageTraitUploadMultiple($file, 'product');
                    $product->pictures()->create([
                        'picture' => $data_upload_images['file_path'],
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('admin.products.create');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }
    }

    public function show($id)
    {
        $product = Product::find($id);
        $product->view++;
        $product->save();
        $product->pictures;
        return view('products.show', ['product' => $product]);
    }

    public function edit($id)
    {
        $this->authorize('edit_product');
        $product = Product::find($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(StoreProductRequest $request, $id)
    {
        $this->authorize('edit_product');
        try {
            DB::beginTransaction();
            $data_upload_feature_image = $this->storageTraitUpload($request, 'feature_image_path', 'product');

            $data_product_update = [
                'title' => $request->input('title'),
                'category_id' => $request->input('category_id'),
                'restock_value' => $request->input('restock_value'),
                'sell_value' => $request->input('sell_value'),
                'subtitle' => $request->input('subtitle'),
            ];

            if (!empty($data_upload_feature_image)) {
                $data_product_update['feature_image_path'] = $data_upload_feature_image['file_path'];
            }

            Product::find($id)->update($data_product_update);
            $product = Product::find($id);

            $product->pictures()->delete();

            if ($request->image_picture) {
                foreach ($request->image_picture as $picture) {
                    $product->pictures()->create(['picture' => $picture]);
                }
            }

            if ($request->hasFile('image_path')) {
                foreach ($request->file('image_path') as $file) {
                    $data_upload_images = $this->storageTraitUploadMultiple($file, 'product');
                    $product->pictures()->create([
                        'picture' => $data_upload_images['file_path'],
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('admin.products.edit', array($id));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }
    }

    public function destroy($id)
    {
        $this->authorize('delete_product');
        return $this->deleteModelTrait($this->product, $id);
    }

    public function search(Request $request)
    {
        try {
            $keyword = $request->input('keyword');
            $products = Product::where('title', 'LIKE', '%' . $keyword . '%')
                ->paginate(9);
            $categories = Category::all();
            $url='/search?keyword='.$keyword."&&";
            return view('products', [
                'products' => $products,
                'categories' => $categories,
                'url'=> $url,
            ]);
        } catch (\Exception $exception) {

        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    use StorageImageTrait;

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
        $products = Product::latest()->paginate(10);
        return view('admin.product-management', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', ['categories' => $categories]);
    }

    public function store(StoreProductRequest $request)
    {
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
        $product = Product::find($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(StoreProductRequest $request, $id)
    {
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
        try {
            Product::find($id)->delete();

            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
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

    public function filter(Request $request){
        $products= Product::query();
        $perPage= $request->get('perPage');
        $products->Name($request)->SortPrice($request)->NewProducts($request)
            ->Category($request);
        $products=$products->paginate($perPage);

        // render blade compontent to hmtl
        $html_render= array();
        foreach($products as $item){
            $item= new \App\View\Components\Card($item->id,$item->title,null,$item->sell_value, null, $item->feature_image_path);
            array_push($html_render,$item->resolveView()->with($item->data())->render());
        }
        
        return response()->json([
            'data'=> $html_render, //array card component
            'products'=>$products, //origin products
        ]);
        return $products;
    }
}

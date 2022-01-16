<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Setting;
use App\Models\Transaction;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

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

        $url= url()->current()."?";

        if($category_id===null){
            $products = Product::paginate(9);
        }else{
            $products=Product::where('category_id', '=', $category_id)->paginate(9);
            $url= $url."category_id=".$category_id."&&";
        }
      
        return view('products', [
            'products' => $products,
            'categories' => $categories,
            'url' => $url,
        ]);
    }

    public function index()
    {
        $this->authorize('list_product');
        $products = Product::latest()->paginate(10);
        return view('admin.product-management', compact('products'));
    }

    public function create()
    {
        $this->authorize('create_product');
        $categories = Category::all();
        return view('products.create', compact('categories'));
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
        $rating =Rating::where('product_id', $product->id)->get();

        $user= Auth::user();
        $availableRate=$this->availableRate($id);
        return view('products.show', ['product' => $product, 'rating'=>$rating,'availableRate'=>$availableRate]);
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
                'discount' => $request->discount,
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

    public function filter(Request $request){
        $products= Product::query();
        $perPage= $request->get('perPage');
        $products->Name($request)->SortPrice($request)->NewProducts($request)
            ->Category($request)->RangerPrice($request)->Sale($request);
        $products=$products->paginate($perPage);

        // render blade compontent to hmtl
        $html_render= array();
        foreach($products as $item){
            $item= new \App\View\Components\Card($item->id,$item->title,null,$item->sell_value, $item->discount, $item->feature_image_path,null,$item->rate);
            array_push($html_render,$item->resolveView()->with($item->data())->render());
        }
        
        return response()->json([
            'data'=> $html_render, //array card component
            'products'=>$products, //origin products
        ]);
        return $products;
    }

    public function rating(Request $request){

        $user= Auth::user();
        $product_id = $request->input('product_id');
        $rate = $request->input('rate');
        $review = $request->input('review');
        if($rate==0){
            $rate=1;
        }
        // create rating in Rating table
        $new_rating =Rating::create([
            'product_id'=>$product_id,
            'user_id'=>$user->id,
            'rate'=>$rate,
            'review'=>$review,
        ]);

        // get total rating of product
        $product_rating= Rating::select('product_id',DB::raw('sum(rate) rate'),DB::raw('count(product_id) count'))
                        ->where('product_id','=', $product_id)
                        ->groupBy('product_id')
                        ->get();

        // update rate to Product table
        $product= Product::find($product_id);
        $product->rate= floatval($product_rating[0]->rate)/$product_rating[0]->count;
        $product->rate= round($product->rate,0);
        $product->save();

        return response()->json([
            'new_rating' => $new_rating,
            'user' => $user,
        ]);
    }

    public static function availableRate($product_id) {
        // return true if user can rate
        $user=Auth::user();
        if($user!=null){
            $orders= $user->orders; //get all orders of user
            foreach($orders as $order){
                if($order->product_id == $product_id){
                    return true;
                }
            }
        }
        return false;
    }

    public function setDiscount(Request $request){
        // set discount for products
        $discount = $request->input('discount');
        $checkAll = $request->input('checkAll');
        $productIDs = $request->input('productIDs');
        $status=null;
        if($checkAll=="true"){
            // set discount for all products
            $status= DB::table('products')
                ->update(['discount' => $discount]);
        }else{
            // set discount for products is selected
            foreach($productIDs as $item){
                $status= DB::table('products')
                    ->where('id',$item)
                    ->update(['discount' => $discount]);
            }
        }

        return response()->json([
            'status' => $status,
        ]);
    }
}

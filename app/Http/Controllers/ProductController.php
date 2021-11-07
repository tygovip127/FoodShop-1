<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\Goods;
use App\Models\Category;
use App\Models\Picture;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use StorageImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Get data from database and pass them through view 
         */
        // $products = Goods::paginate(9);
        // return view('products', ['products'=>$products]);

        $products = Goods::paginate(10);
        return view('admin.product-management', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
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

        $product = Goods::create($data_product_create);
        
        if ($request->hasFile('image_path')) {
            
            foreach ($request->file('image_path') as $file) {
                $data_upload_images = $this->storageTraitUploadMultiple($file, 'product');
                Picture::create([
                    'picture' => $data_upload_images['file_path'],
                    'goods_id' => $product->id
                ]);
            }
        }

        return redirect()->route('admin.products.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('products.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Goods::find($id)->delete();
        return Goods::all();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Setting;
use App\Models\Transaction;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\File; 

class BannerController extends Controller
{
 
    use StorageImageTrait, DeleteModelTrait;
    
    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    public function index()
    {
        $this->authorize('list_banner');
        $banners = Banner::all();
        return view('admin.banner', compact('banners'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {  
        $this->authorize('create_banner');
        $request->validate([
            'title'=>['string', 'max: 20'],
            'name'=>['required','string', 'max: 30'],
            'description'=>['required','string', 'max:255'],
            'image'=>['required','mimes:png,jpg,jpeg|max:5048' ],
        ]);

        $data_upload_banner_image = $this->storageTraitUpload($request, 'image', 'banner');

        $banner = Banner::create([
            'title' => $request->title,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $data_upload_banner_image['file_path']
        ]);
        if($banner){
            return redirect('admin/banner')->with('success',"Save the banner successfully!");
        }
        return redirect('admin/banner')->with('failure',"Upload image failed!");

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->authorize('edit_banner');
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit_banner');
    }

    public function destroy($id)
    {
        $this->authorize('delete_banner');
        
        return $this->deleteModelTrait($this->banner, $id);
    }
}

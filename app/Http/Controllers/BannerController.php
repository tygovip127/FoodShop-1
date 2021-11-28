<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\File; 

class BannerController extends Controller
{
 
    public function index()
    {
        $this->authorize('list_banner');
        $banners = Banner::all();
        return view('admin.banner',['banners'=>$banners]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {  
        $this->authorize('create_banner');
        $image= $request->image;
        $request->validate([
            'title'=>['string', 'max: 20'],
            'name'=>['required','string', 'max: 30'],
            'description'=>['required','string', 'max:255'],
            'image'=>['required','mimes:png,jpg,jpeg|max:5048' ],
        ]);
        $newImage= time()."_".$image->getClientOriginalName();
        $request->image->move(public_path('images\slider'), $newImage);
        $newImage= '/slider/'.$newImage;
        $banner =Banner::create([
            'title' => $request->input('title'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image'=> $newImage,
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
        $image=Banner::find($id);
        unlink('images'.$image->image);
        $image->delete();

        return redirect('admin/banner');
    }
}

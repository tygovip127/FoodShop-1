<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\File; 

class BannerController extends Controller
{
 
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner',['banners'=>$banners]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {  
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $image=Banner::find($id);
        unlink('images'.$image->image);
        $image->delete();

        return redirect('admin/banner');
    }
}

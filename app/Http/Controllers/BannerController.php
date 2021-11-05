<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\File; 

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner',['banners'=>$banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $image=Banner::find($id);
        unlink('images'.$image->image);
        $image->delete();

        return redirect('admin/banner');
    }
}

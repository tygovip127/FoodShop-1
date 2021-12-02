<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
   
    public function index()
    {
        $this->authorize('list_category');
        $categories= Category::paginate(10);
        return view('admin.category', ['categories' => $categories]);
    }

    public function create()
    {
        $this->authorize('create_category');
        return view('category.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create_category');
        $request->validate([
            'category' =>"required",
        ]);
        $category= Category::create([
            'name' => $request->input('category'),
        ]);
        return $category;
        // return view('admin.category', ['categories' => Category::all()]);
    }

    public function show($id)
    {
        return Category::find($id);
    }

    public function edit($id)
    {
        $this->authorize('edit_category');
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit_category');
        // return Category::find($id);
        $category =Category::find($id);
        $category->update($request->all());
        return $category;
    }

    public function destroy($id)
    {
        $this->authorize('delete_category');
        Category::find($id)->delete();
        // return view('admin.category', ['categories' =>  Category::paginate(10)]);
    }
}

<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{    
    public function index(){
        $categories = Category::paginate(6);
        return view('backend.admin.category.index',compact('categories'));
    }

    public function create(){
        return view('backend.admin.category.create');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|max:255|unique:categories',
        ],[
            'name.required' => 'Plz Enter Your Category name',
        ]);

        $categories = new Category();
        $categories->name = $request->name;
        $categories->slug = Str::slug($request->name);
        $categories->status = (boolean)$request->status;
        $categories->save();
        Toastr::success('New category has been created', 'Success');
        return redirect()->back();
    }

    public function show($id){
        $data = Category::where('id',$id)->firstOrFail();
        return view('backend.admin.category.show',compact('data'));
    }

    public function edit($id){
        $data = Category::where('id',$id)->firstOrFail();
        return view('backend.admin.category.edit',compact('data'));
    }

    public function update(Request $request ,$id){
        $category = Category::find($id);
        $validated = $request->validate([
            'name' => 'required|max:255',
        ],[
            'name.required' => 'Plz Enter Your Category name',
        ]);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = (boolean)$request->status;
        $category->save();
        Toastr::success('Category Successfully Updated', 'Success');
        return redirect('admin/categories');
    }

    public function delete($id){
        $data = Category::where('id',$id)->firstOrFail();
        $data->delete();
        Toastr::success('Category Successfully deleted', 'Success');
        return redirect()->back();

    }
}

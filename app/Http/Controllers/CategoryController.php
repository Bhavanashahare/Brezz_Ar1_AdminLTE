<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function admin()
    {
        return view('welcome');
    }
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $this->validate ($request,[
            'title'=>'required',
            'status'=>'required',
        ]);

        $category = new Category();
        $category->title = $request->title;
        $category->status = $request->status;
        // $data->category = $request->category;

        $category->save();
        return redirect()->route('categories')->with('message','Data Updated Successfully!!!');
    }
    public function index()
    {

        $category = Category::all();
        return view('category.index', compact('category'));

    }
    public function edit($id){

        $category=Category::find($id);
        return view('category.edit',compact('category'));

    }

    public function delete($id){
        $category=Category::find($id);
        $category->delete();
        return redirect()->route('categories')->with('message','Data Delete Successfully!!!');

    }
    public function update(Request $request,$id){
        {
            $this->validate ($request,[
                'title'=>'required',
                'status'=>'required',
            ]);
        $category=Category::find($id);
        $category->title = $request->title;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('categories')->with ('message','Data Update Successfully!!!');
    }
}

}



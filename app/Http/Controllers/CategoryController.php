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
    public function form()
    {
        return view('category.form');
    }

    public function store(Request $request)
    {
        $this->validate ($request,[
            'title'=>'required',
            'status'=>'required',
        ]);

        $data = new Category();
        $data->title = $request->title;
        $data->status = $request->status;
        // $data->category = $request->category;

        $data->save();
        return redirect()->route('category.table')->with('message','Data Updated Successfully!!!');
    }
    public function table()
    {

        $data = Category::all();
        return view('category.table', compact('data'));

    }
    public function edit($id){

        $data=Category::find($id);
        return view('category.edit',compact('data'));

    }

    public function delete($id){
        $data=Category::find($id);
        $data->delete();
        return redirect()->route('category.table')->with('message','Data Delete Successfully!!!');

    }
    public function update(Request $request,$id){
        {
            $this->validate ($request,[
                'title'=>'required',
                'status'=>'required',
            ]);
        $data=Category::find($id);
        $data->title = $request->title;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('category.table')->with ('message','Data Update Successfully!!!');
    }
}
}



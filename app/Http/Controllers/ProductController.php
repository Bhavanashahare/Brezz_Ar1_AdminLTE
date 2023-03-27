<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use COM;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::where('status','=',1)->get();
        // dd($categories);

        return view('product.create', compact('categories'));
    }
    public function store(Request $request){
    $this->validate($request,[
        'title'=>'required',
        'description'=>'required',
        'image'=>'required',
        'category_id'=>'required',
    ]);
    {
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads', $filename);
            $data->image = $filename;
        }
        $data->save();
        return redirect()->route('product.table')->with ('message','Data Store Successfully!!!');
    }

}

    public function table()
    {
        $data = Product::all();
        return view('product.table', compact('data'));
    }
    public function edit($id)
    {
       $data = Product::find($id);
//
       $categories=Category::all();
//
        return view('product.edit', compact('data','categories'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',

            'category_id'=>'required',
        ]);
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads', $filename);
            $data->image = $filename;
        }
        $data->save();
        return redirect()->route('product.table')->with ('message','Data Updated Successfully!!!');
    }
    public function delete($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->route('product.table')->with ('message','Data Delete Successfully!!!');
    }
}

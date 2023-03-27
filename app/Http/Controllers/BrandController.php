<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{

    public function create()
    {
        $products=Product::all();
        // dd($products);
        return view('brands.create',compact('products'));
    }

    public function store(Request $request)

{
    {
        $this->validate ($request,[
            'name'=>'required',
            'user_id'=>'required',
            'product_id'=>'required',
        ]);
    // dd($request->all());
        $data = new Brand();
        $data->name = $request->name;
        //$data->user_id = Auth::user_id()->id;
        $data->user_id = 1;

        $data->product_id = $request->product_id;



        $data->save();
        // return redirect()->route('brands.table')->with('message','Data store Successfully!!!');


        return redirect()->route('brand.table')->with('message','Data Updated Successfully!!!');
    }
}

public function table(){


$data=Brand::all();

return view('brands.table',compact ('data'));
}






public function edit($id){

    $data=Brand::find($id);
    $category=Product::all();
    return view('brands.edit',compact('data'));

}
public function update(Request $request,$id){

    {
        $this->validate ($request,[
            'name'=>'required',
            'user_id'=>'required',
            'product_id'=>'required',
        ]);


    $data=Brand::find($id);
    $data->name = $request->name;
    $data->user_id = $request->user_id;
    $data->product_id = $request->product_id;
    $data->save();
    return redirect()->route('brand.table')->with ('message','Data Update Successfully!!!');

        }
    }

//         public function delete($id){
//             $data=Brand::find($id);
//             $data->delete();
//             return redirect()->route('brands.table');




public function delete($id){
    $data=Brand::find($id);
    $data->delete();
    return redirect()->route('brands.table')->with('message','Data Delete Successfully!!!');


}
    }





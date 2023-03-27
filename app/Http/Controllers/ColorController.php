<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Models\Product;
class ColorController extends Controller
{
    public function create(){
        $products=Product::all();
        return view('colors.create',compact ('products'));
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
            $data = new Color();
            $data->name = $request->name;
            $data->user_id = $request->user_id;
            $data->product_id = $request->product_id;


            $data->save();

        return redirect()->route('color.table')->with ('message','Data Update Successfully!!!');
// return redirect('color/table');   ->  (url)
    }
}
public function table(){


    $data=Color::all();
    return view('colors.table',compact ('data'));
    }






    public function edit($id){

        $data=Color::find($id);

        $category=Product::all();
        return view('colors.edit',compact('data'));

    }

    public function update(Request $request,$id){

        {
            $this->validate ($request,[
                'name'=>'required',
                'user_id'=>'required',
                'product_id'=>'required',
            ]);


        $data=Color::find($id);
        $data->name = $request->name;
        $data->user_id = $request->user_id;
        $data->product_id = $request->product_id;
        $data->save();
        return redirect()->route('color.table')->with ('message','Data Update Successfully!!!');

        }
    }
public function delete($id){
    $data=Color::find($id);
    $data->delete();
    return redirect()->route('color.table')->with('message','Data Delete Successfully!!!');


}
}


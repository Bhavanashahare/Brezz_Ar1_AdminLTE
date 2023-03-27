<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function create(){
        return view('colors.create');
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


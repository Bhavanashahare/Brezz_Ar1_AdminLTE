<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\Cms;
class CmsController extends Controller
{
    public function admin()
    {
        return view('welcome');
    }

    public function create()
    {
        return view('cms.create');
    }


    public function store(Request $request)
    {
        $this->validate ($request,[
            'title'=>'required',
            'description'=>'required',
            'image'=>'required',
            'status'=>'required',
        ]);

        $data = new Cms();
        $data->title = $request->title;
        // dd($request->all());
        $data->description = $request->description;


        // if ($request->hasFile('image')) {
        //     $file = $request->image;
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $file->move('uploads', $filename);
        //     $data->image = $filename;
        // }

        // if($files=$request->file('image')){
        //     foreach($files as $file){
        //         // $name=$file->getClientOriginalExtension();
        //         // $filename = time().'.'.$name;
        //         // $file->move('uploads/car/',$filename);
        //         // $images[]=$filename;
        //         $name=$file->getClientOriginalName();
        //     $file->move('uploads',$name);
        //     $image[]=$name;
        //     }

        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
            $file->move('uploads/car/',$name);
            $images[]=$name;
            }
        }
        $data->images =   implode("|",$images);
        $data->status = $request->status;


        $data->save();
        return redirect()->route('cms.table')->with('message','Data Updated Successfully!!!');
    }

    public function table()
    {

        $data = Cms::all();
        return view('cms.table', compact('data'));

    }
    public function edit($id){

        $data=Cms::find($id);
        return view('cms.edit',compact('data'));

    }

    public function delete($id){
        $data=Cms::find($id);
        $data->delete();
        return redirect()->route('cms.table')->with('message','Data Delete Successfully!!!');

    }
    public function update(Request $request,$id){
        {
            $this->validate ($request,[
                'title'=>'required',
                'description'=>'required',
                'image'=>'required',
                'status'=>'required',
            ]);
        $data=Cms::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads', $filename);
            $data->image = $filename;
        }
        $data->status = $request->status;
        $data->save();
        return redirect()->route('cms.table')->with ('message','Data Update Successfully!!!');
    }
}
}



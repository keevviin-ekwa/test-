<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::all();
        $test='test';
        return view('welcome')->with('test',$test);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'cover_image'=>'image|max:1999'
        ]);

//        dd($request->all());

        //Get filename extension
        $filenmaeWithExt= $request->file('image')->getClientOriginalName();

        //Get just des filename
        $filename=pathinfo($filenmaeWithExt,PATHINFO_FILENAME);

        //Get extension
        $extension= $request->file('image')->getClientOriginalExtension();

        //create new filenam
        $filenameToStod= $filename.'_'.time().'.'.$extension;

        $path= $request->file('image')->storeAs('public/image',$filenameToStod);




        $product= new Product();
        $product->name=$request->input('name');
        $product->description= $request->input('description');
        $product->image=$filenameToStod;
        $product->save();
        return redirect('/')->with('success','product created');
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
        $product= Product::find($id);
        return view('edit')->with('product',$product);
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

        $this->validate($request, [
            'name'=>'required',
            'cover_image'=>'image|max:1999'
        ]);

//        dd($request->all());
        $product=Product::find($id);
        //Get filename extension
        $filenmaeWithExt= $request->file('image')->getClientOriginalName();

        //Get just des filename
        $filename=pathinfo($filenmaeWithExt,PATHINFO_FILENAME);

        //Get extension
        $extension= $request->file('image')->getClientOriginalExtension();

        //create new filenam
        $filenameToStod= $filename.'_'.time().'.'.$extension;

        $path= $request->file('image')->storeAs('public/image',$filenameToStod);


        $product->name=$request->input('name');
        $product->description= $request->input('description');
        $product->image=$filenameToStod;
        $product->save();
        return redirect('/')->with('success','product updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('index');
    }
}

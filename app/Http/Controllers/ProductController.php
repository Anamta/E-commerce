<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategorie;
use App\Categorie;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorie = Categorie::all();
        $subcats = Subcategorie::all();
        return view('product.create',compact('subcats','categorie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $product = new Product;

        $image = $request->image;
        $image_new = time().$image->getClientOriginalName();
        $image->move('uploads/products',$image_new);

        // if($request->hasFile('image'))
        // {
        //     $filename = $request->image->getClientOriginalName();
        //     $request->image->store('public/products'.$filename);
        //     $product->name = $request->name;
        //     $product->price = $request->price;
        //     $product->image = $filename;
        //     $product->sub_category_id = $request->sub_category_id;
        //     $product->description = $request->description;
        //     $product->save();
        // }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = 'uploads/products/'.$image_new;
        $product->sub_category_id = $request->sub_category_id;
        $product->description = $request->description;
        // return $product;
        $product->save();
        return redirect()->route('product.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = Product::with('subcategorie')->get();
        return view('product.show',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::with('subcategorie')->find($id);
        $subcats = Subcategorie::all();
        return view('product.edit',compact('products','subcats'));
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
        $products = Product::with('subcategorie')->find($id);
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('file'))
        {
            $image = $request->image;
            $image_new = time().$image->getClientOriginalName();
            $image->move('uploads/products',$image_new);
            $products->image = 'uploads/products/'.$image_new;

        }

        

        $products->name = $request->name;
        $products->price = $request->price;
        // $products->image = 'uploads/products/'.$image_new;
        $products->sub_category_id = $request->sub_category_id;
        $products->description = $request->description;
        
        $products->save();
        return redirect()->route('product.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::with('subcategorie')->find($id);
        $products->delete();
        return redirect()->route('product.show');

    }
}

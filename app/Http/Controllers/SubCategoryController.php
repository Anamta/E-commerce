<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Subcategorie;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Categorie::all();
        return view('subcategorie.create',compact('categories'));
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
        ]);
        $subcategory = new Subcategorie;
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;

        $subcategory->save();
        return redirect()->route('sub_category.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $subcategories = Subcategorie::with('categorie')->get();
        return view('subcategorie.show',compact('subcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Categorie::all();
        $subcategories = Subcategorie::with('categorie')->find($id);
        return view('subcategorie.edit',compact('subcategories','categories'));
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
        $subcategories = Subcategorie::with('categorie')->find($id);
        $request->validate([
            'name' => 'required',
        ]);
        
        $subcategories->name = $request->name;
        $subcategories->category_id = $request->category_id;

        $subcategories->save();
        return redirect()->route('sub_category.show');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategories = Subcategorie::with('categorie')->find($id);
        $subcategories->delete();
        return redirect()->route('sub_category.show');
    }
}

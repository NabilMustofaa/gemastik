<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Termwind\Components\Raw;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return response()->json(
            [
                'categories'=>$categories
            ]
        );



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name'=>'required',
            'emojiCode'=>'required'
        ]);
        $category=Category::create($validated);
        return response()->json(
            [
                'category'=>$category
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show( $name)
    {
        $category=Category::where('name',$name)->first();
        return response()->json(
            [
                'category'=>$category
            ]
        );
    }
    public function search ($input){
        $search=$input;
        if($search==''){
            $categories=Category::orderby('name','asc')->select('id','name')->limit(5)->get();
        }else{
            $categories=Category::orderby('name','asc')->select('id','name')->where('name','like','%'.$search.'%')->limit(5)->get();
        }
        $response=array();
        foreach($categories as $category){
            $response[] = array("value"=>$category->id,"label"=>$category->name);
        }
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}

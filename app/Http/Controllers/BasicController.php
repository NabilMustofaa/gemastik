<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Partner;
use App\Models\TagPartner;
use Illuminate\Http\Request;

class BasicController extends Controller
{
    //
    public function landing(){
        return view('landing');
    }
    public function home(){
        $categories=Category::all();
        //get partner sorted by date
        $partners1=Partner::orderBy('created_at','desc')->get();
        //get partner sorted by date asc
        $partners2=Partner::orderBy('created_at','asc')->get();
        return view('home',
        ['categories'=>$categories,
        'partners1'=>$partners1,
        'partners2'=>$partners2]);
    }
    public function detail(){
        $categories=Category::all();
        return view('detail',
        ['categories'=>$categories]);
    }
    public function join(){
        $categories=Category::all();
        return view('partner',
        ['categories'=>$categories]);
    }
    public function comingsoon(){
        $categories=Category::all();
        return view('comingsoon',
        ['categories'=>$categories]);
    }
    public function category(string $id){
        $categories=Category::all();
        $partners=$categories->find($id)->tagPartner;
        $name=$categories->find($id)->name;
        return view('category',
        ['categories'=>$categories,
        'name'=>$name,
        'partners'=>$partners]);
    }
}


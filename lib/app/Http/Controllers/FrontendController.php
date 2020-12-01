<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function getHome(){
        $data['product'] = Product::all();
        return view('frontend.index',$data);
    }
    public function getDetails($id){
        $data['item'] = Product::find($id);
        return view('frontend.details',$data);
    }
    public function getSpecials(){
        $data['product'] = Product::where('prod_featured',1)->take(8)->get();
        return view('frontend.specials',$data);
    }
    public function getSort($id){
        $data['product'] = Product::where('prod_cate',$id)->take(8)->get();
        return view('frontend.sort',$data);
    }
    public function getNewProduct(){
        $data['product'] = Product::orderBy('prod_id','desc')->take(8)->get();
        return view('frontend.new',$data);
    }
}

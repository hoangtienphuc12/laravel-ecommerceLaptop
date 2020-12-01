<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Http\Requests\AddProductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function getProduct(){
        $data['productlist'] = DB::table('vp_products')->join('vp_categories','vp_products.prod_cate','=','vp_categories.cate_id')->orderBy('prod_id','desc')->get();
        return view('backend.product',$data);
    }
    public function getAddProduct(){
        $data['catelist'] = Category::all();
        return view('backend.addproduct',$data);
    }
    public function postAddProduct(AddProductRequest $request){
        $filename = $request->img->getClientOriginalName();
        $product= new Product;
        $product->prod_name = $request->name;
        $product->prod_slug = Str::slug($request->name);
        $product->prod_img = $filename;
        $product->prod_accessories = $request->accessories;
        $product->prod_price = $request->price;
        $product->prod_warranty = $request->warranty;
        $product->prod_promotion = $request->promotion;
        $product->prod_condition = $request->condition;
        $product->prod_status = $request->status;
        $product->prod_description = $request->description;
        $product->prod_cate = $request->cate;
        $product->prod_featured = $request->featured;
        $product->prod_sales = $request->sales;
        $product->save();
        $request->img->storeAs('avatar',$filename);
        return redirect()->intended('admin/product');

    }
    public function getEditProduct($id){
        // dd($id);
        // $data['product'] = Products::where($id,'prod_id')->get();
        $data['product'] = DB::table('vp_products')->where('prod_id',$id)->first();
        $data['listcate'] = Category::all();
        return view('backend.editproduct',$data);
    }
    public function postEditProduct(Request $request,$id){
        $product= new Product;
        $arr['prod_name'] = $request->name;
        $arr['prod_slug'] = Str::slug($request->name);
        $arr['prod_accessories'] = $request->accessories;
        $arr['prod_price'] = $request->price;
        $arr['prod_warranty'] = $request->warranty;
        $arr['prod_promotion'] = $request->promotion;
        $arr['prod_condition'] = $request->condition;
        $arr['prod_status'] = $request->status;
        $arr['prod_description'] = $request->description;
        $arr['prod_cate'] = $request->cate;
        $arr['prod_featured'] = $request->featured;
        $arr['prod_sales'] = $request->sales;

        if($request->hasFile('img')){
            $img = $request->img->getClientOriginalName();
            $arr['prod_img'] = "img";
            $request->img->storeAs('avatar'.$img);
        }
        $product::where('prod_id',$id)->update($arr);
        return redirect('admin/product');
    }
    public function getDeleteProduct($id){
        Product::destroy($id);
        return back();
    }
}

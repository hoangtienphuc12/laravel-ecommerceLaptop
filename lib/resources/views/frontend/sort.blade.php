@extends('frontend.master')
@section('main')
<div class="content-wrapper">		  
    <div class="content-top">
        <div class="box_wrapper"><h1>New Products For July</h1></div>
         <div class="text" style="margin-left:0px;display:flex;justify-content:space-between;flex-wrap:wrap">
            @foreach($product as $prod)
            <div class="grid_1_of_3 images_1_of_3" style="margin-left:0px;width:30%;">
                <div class="grid_1">
                    <a href="#" style=""><img src="{{asset('lib/storage/app/avatar/'.$prod->prod_img)}}" title="continue reading" alt=""></a>
                        <div class="grid_desc">
                            <p class="title">{{$prod->prod_name}}</p>
                            
                                 <div class="price" style="height: 19px;">
                                 <span class="reducedfrom">${{number_format($prod->prod_price,0,',','.')}}</span>
                                 <span class="actual">${{number_format($prod->prod_sales,0,',','.')}}</span>
                                </div>
                                <div class="cart-button">
                                    <div class="cart">
                                        <a href="#"><img src="images/cart.png" alt=""/></a>
                                    </div>
                                <a href="{{asset('details/'.$prod->prod_id.'/'.$prod->prod_slug)}}" class="button"><span>Details</span></a>
                                    <div class="clear"></div>
                                </div>
                        </div>
                 
                </div>
            </div>
            @endforeach
            <div class="clear"></div>
            </div>
    </div>
</div>
@stop		
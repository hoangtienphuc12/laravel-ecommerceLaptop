@extends('frontend.master')
@section('main')
@section('title','trang thong tin chi tiet')
<div class="content-wrapper">		  
    <div class="content-top">
    <div class="box_wrapper"><h1>Details of {{$item->prod_name}}</h1>
    </div>
        <div class="text">
                    <div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
                        <img src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}">
                    </div>
                    <div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
                        <p>Price: <span class="price">${{number_format($item->prod_price,0,',','.')}}</span></p>
                        <p>Warranty: {{$item->prod_warranty}}</p> 
                        <p>Accessory: {{$item->prod_accessories}}</p>
                        <p>Status: Máy mới 100%</p>
                        <p>Promotion: Hỗ trợ trả góp 0% dành cho các chủ thẻ Ngân hàng Sacombank</p>
                        <p>Stocking: Stocking</p>
                        <p class="add-cart text-center"><a href="#">Đặt hàng online</a></p>
                    </div>
                    <div id="product-detail">
                        <h3>Product details</h3>
                    <p class="text-justify">{!!$item->prod_description!!}</p>
                    </div>   
        </div>
    </div>							
</div>
@stop
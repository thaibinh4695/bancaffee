@extends('layouts.master')
@section('title','Product Details')
@section('khoa')
	<div class="row">
	@foreach($sanpham as $value)
	<div class="col-1">
	</div>
	<div class="col-3">
	    
			<img class="card-img-top" height="200" src="{{url('storage/images/'.$value->HinhAnh)}}" alt="">
		
    </div>
    <div class="col-1">
	</div>
    <div class="col-5">
    	<h1>{{$value->Tensanpham}}</h1>
	    <a style="font-weight: bold;">Mô Tả:</a>
	    <br/>{{$value->MoTa}}
	    <br/>
	    <br/><a style="font-weight: bold;">Giá :</a><a style="padding-left: 150px;color: red">{{number_format($value->DonGia)}} VNĐ</a>
	    <br/><br/>
	    <a href="giohang_them&id={{$value->ID}}" class="btn btn-outline-warning my-2 my-sm-0 col-3" >Đặt Hàng</a>
    </div>
    
    @endforeach
</div>
@endsection 
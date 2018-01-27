@extends('layouts.master')
@section('khoa')
@include('layouts/body')

<div class="card">
 <div class="card-header " > <h4 class="btn btn-success " >Thêm sản phẩm Caffee</h4>
 	
  </div>
 <div class="card-body">
 <div class="card-deck">

				@foreach($sanpham as $value)
					<div class="col-xl-3 col-md-4 col-sm-6 col-12">
						<div class="card list-books">
							<img class="card-img-top" src="{{url('storage/images/'.$value->HinhAnh)}}" style="height: 200px; width: 100px;"  alt="" />
							<div class="card-body">
								<h4 class="card-title">{{$value->Tensanpham}}</h4>
								<p class="card-text">{{number_format($value->DonGia)}} VNĐ</p>
							</div>
							<div class="card-footer">
								
									<a class="btn btn-primary btn-sm col-5" href="{{url('giohang_them&id='.$value->ID)}}" role="button">Đặt hàng</a>
									<a class="col-1"></a>
									<a class="btn btn-warning btn-sm col-4" href="{{url('/sanpham/chitiet='.$value->ID)}}" role="button">Chi tiết</a>

							</div>
						</div>
					</div>
				@endforeach
</div>
</div>
</div>
@stop
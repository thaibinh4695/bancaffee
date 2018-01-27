@extends('layouts.master')
@section('khoa')
@section('title','Giỏ hàng')
<div class="card">
	<h4 class="card-header" style="color: red";>Giỏ hàng</h4>
	<div class="card-body">
		@if($errors->has('khoa'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						{{$errors->first('khoa')}}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
		@endif
		@if($GioRong)
			Giỏ hàng chưa có sản phẩm. Xin vui lòng <a href="{{url('/')}}">mua hàng</a>.
		@else
		<form action="{{url ('giohang/capnhat')}}" method="post">
			<p><a class="btn btn-outline-warning my-2 my-sm-0" href="{{url('/')}}" role="button">Tiếp tục mua hàng</a></p>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="15%">Ảnh sản phẩm</th>
						<th width="45%">Tên sản phẩm</th>
						<th width="10%">Số lượng</th>
						<th width="10%">Đơn giá</th>
						<th width="10%">Thành tiền</th>
						<th width="5%">Xóa</th>
					</tr>
				</thead>
				<tbody>
				
					@php
					$stt = 1;
					$tongTien = 0;
					@endphp	
						@foreach($sanpham as $value)
							<tr>
								<th>{{$stt}}</th>
								<td class="text-center"><img class="rounded img-thumbnai" src="storage/images/{{$value->HinhAnh}}" width="100" /></td>
								<td>{{$value->Tensanpham}}</td>
								<td><input class="form-control" type="number" name="SoLuong[{{$value->ID}}]" value="{{$_SESSION['GioHang'][$value->ID]}}" /></td>
								<td>{{number_format($value->DonGia)}}</td>
								<td>{{number_format($_SESSION['GioHang'][$value->ID] * $value->DonGia)}}</td>
								<td class="text-center"><a onclick="return confirm('bạn có muốn xóa {{$value->Tensanpham}}?')" href="{{url('giohang_xoa&id='.$value->ID)}}">Xóa</a></td>
							</tr>
							@php
							$stt++;
							$tongTien += ($_SESSION['GioHang'][$value->ID]) * ($value->DonGia);
							@endphp
						@endforeach
						
					<tr>
						<td class="font-weight-bold text-danger" colspan="5">Tổng tiền (đã bao gồm VAT)</td>
						<td class="font-weight-bold text-danger">{{number_format($tongTien)}} nghìn đồng</td>
					</tr>
					
				</tbody>
			</table>
			<button type="submit" class="btn btn-success">Cập nhật giỏ hàng</button>
			
		</form>
		<form action="{{url('dathang/them_xuly')}}" method="post">
			<button type="submit" class="btn btn-info">Thanh Toán</button>
			
		</form>
		@endif
	</div>
</div>

@stop
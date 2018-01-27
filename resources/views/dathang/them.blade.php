@extends('layouts.master')

@section('title','Đặt hàng')
@section('khoa')
	@if(!isset($_SESSION['ID']))
	
		<div class='card'>
			<h4 class='card-header'>Chưa đăng nhập</h4>
			<div class='card-body'>
				Vui lòng <a href="dangnhap">đăng nhập</a> để thanh toán. Nếu chưa có tào khoản, vui vui lòng <a href="dangky">đăng ký</a>
			</div>
		</div>
	
	@else
	
<div class="card">
	<h4 class="card-header">Thông tin giao hàng</h4>
	<div class="card-body">
		<form action="{{url ('dathang/them_xuly')}}" method="post">
			<div class="form-group">
				<label for="DiaChiGiaoHang">Địa chỉ giao hàng</label>
				<input type="text" class="form-control" id="DiaChiGiaoHang" name="DiaChiGiaoHang" placeholder="" required />
			</div>
			<div class="form-group">
				<label for="DienThoai">Điện thoại đặt hàng</label>
				<input type="text" class="form-control" id="DienThoai" name="DienThoai" placeholder="" required />
			</div>

			<button type="submit" class="btn btn-primary">Đặt hàng</button>
		</form>
	</div>
</div>

<div class="card mt-3">
	<h4 class="card-header">Sản phẩm đã đặt</h4>
	<div class="card-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th width="5%">#</th>
					<th width="10%">Ảnh bìa</th>
					<th width="50%">Tên Sản phẩm</th>
					<th width="10%">Số lượng</th>
					<th width="10%">Đơn giá</th>
					<th width="10%">Thành tiền</th>
				</tr>
			</thead>
			<tbody>
				
					@php $count = 1; @endphp
					@php $tongTien = 0; @endphp
					@foreach($sanpham as $value)
					
						<tr>
							<th>{{$count}}</th>
							<td class="text-center"><img class="rounded img-thumbnail" src="storage/images/{$value['HinhAnh']}" width='70' /></td>
							<td>{{$value->Tensanpham}}</td>
							<td> {{$_SESSION['GioHang'][$value->ID]}}</td>
							<td>{{number_format($value->DonGia)}}</td>
							<td>{{ number_format($_SESSION['GioHang'][$value->ID] * $value->DonGia)}}</td>
						</tr>

						$count++;
						$tongTien += $_SESSION['GioHang'][$value['ID']] * $value['DonGia'];
					
					@endforeach
				
				<tr>
					<td class="font-weight-bold text-danger" colspan="5">Tổng tiền (đã bao gồm VAT)</td>
					<td class="font-weight-bold text-danger"><{{number_format($tongTien)}} > đ</td>
				</tr>
				<tr>
					<td class="font-weight-bold text-primary" colspan="7">Bằng chữ: {{ ucfirst(number_to_word($tongTien)) }} đồng.</td>
				</tr>
			</tbody>
		</table>
		<a class="btn btn-info" href="{{url ('giohang')}}" role="button">Chỉnh sửa đơn hàng</a>
	</div>
</div>
	@endif
@stop
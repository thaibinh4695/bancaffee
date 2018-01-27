@extends('layouts.master')
@section('title','Chi tiet')
@section('khoa')
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
							<td class='text-center'><img class='rounded img-thumbnail' src='storage/images/{$value['HinhAnh']}' width='70' /></td>
							<td>{{$value->Tensanpham}}</td>
							<!-- <td> $_SESSION['GioHang'][$value['ID']]</td> -->
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
@stop

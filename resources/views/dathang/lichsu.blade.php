@extends('layouts.master')
@section('khoa')
@section('title','Danh sách')

	@foreach($dathang as $value)
	
		<p>Địa chỉ giao hàng: {{$value->DiaChiGiaoHang}}</p>
		<p>Điện thoại giao hàng: {{$value->DienThoai}}</p>

		<table class='table table-bordered'>
			<thead>
				<tr>
					<th width='5%'>#</th>
					<th width='65%'>Tên Sản phẩm</th>
					<th width='10%'>Số lượng</th>
					<th width='10%'>Đơn giá</th>
					<th width='10%'>Thành tiền</th>
				</tr>
			</thead>
			<tbody>
				@foreach($dathangchitiet as $valuect)
				
					@php $count = 1; @endphp
					@if($value->ID == $valuect->MaDatHang)
					
						<tr>
							<th>{{$count}}</th>
							<td>{{{$valuect->Tensanpham}}}</td>
							<td>{{$valuect->SoLuong}}</td>
							<td>{{$valuect->DonGiaBan}}</td>
							<td>{{$valuect->ThanhTien}}</td>
						</tr>

						$stt++;
					@endif
				
				@endforeach
			</tbody>
		</table>
	
	@endforeach
@stop

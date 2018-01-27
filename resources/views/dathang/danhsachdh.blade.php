
@extends('layouts.master')
@section('khoa')
@section('title','Danh sách')
<div class="card">
	<h4 class="card-header" style="color: red">Danh Sách Đặt Hàng</h4>
	<div class="card-body">
		
		<table class="table table-bordered">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="10%">Chi Tiết</th>
					<th width="20%">Tên Người dùng</th>
					<th width="20%">Địa chỉ giao hàng</th>
					<th width="20%">Điện thoại</th>
					<th width="10%">Ngày đặt hàng</th>
					<th width="10%">Xóa</th>
					<th width="5%">Tình trạng</th>
				</tr>
			</thead>
			<tbody>
				
					@foreach($dathang as $value)
					

						<tr>
							<td>{{$value->ID}}</td>
							<td><a href="{{url ('xemchitietdh&id={{$value->ID}}')}}">Xem Chi Tiết</a></td>
							<td>{{$value->MaNguoiDung}}</td>
							<td>{{$value->DiaChiGiaoHang}}</td>
							<td>{{$value->DienThoai}}</td>
							<td>{{$value->NgayDatHang}}</td>
							<td class='text-center'><a onclick='return confirm("Bạn có muốn xóa {{$value->MaNguoiDung}}")' href="{{url('dathang_xoa&id={{$value->ID}}')}}">Xóa</a></td>
							
							@if({{$value->TinhTrang == 1}})
						
								<td class='text-center'><a href="{{url ('duyet&id={{$value->ID}}')}}"><img src='storage/images/active.png'  class='d-inline-block align-top' alt='' /></a></td>
							
							@else
							
								<td class='text-center'><a href="{{url ('duyet&id={{$value->ID}}')}}"><img src='storage/images/ban.png'  class='d-inline-block align-top' alt='' /></a></td>
							
						</tr>
					
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop
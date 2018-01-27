@extends('layouts.master')
@section('title','list User')
@section('khoa')
<div class="card">
	<h4 class="card-header">Danh sách người dùng</h4>
	<div class="card-body">
		<p><a class="btn btn-primary" href="{{ url('/nguoidung/dangky')}}" role="button">Thêm người dùng</a></p>
		@if($errors->has('khoa'))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						{{$errors->first('khoa')}}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
					@endif
		<table class="table table-bordered">
			<thead>
				<tr>
					<th width="5%">#</th>
					<th width="25%">Họ và tên</th>
					<th width="20%">Tên đăng nhập</th>
					<th width="20%">Quyền hạn</th>
					<th width="10%">Khóa</th>
					<th width="5%">Sửa</th>
					<th width="5%">Xóa</th>
				</tr>
			</thead>
			<tbody>
				@php $count = 1; @endphp
					@foreach($nguoidung as $value)
					
						<tr>
							<td>{{ $value->ID }}</td>
							<td>{{$value->HoVaTen}}</td>
							<td>{{$value->TenDangNhap}}</td>
							<td>{{$value->QuyenHan}}</td>
							<td>{{$value->Khoa}}</td>
							<!-- if({{$value->Khoa}} == 0)
							{
								<td class='text-center'><a href='nguoidung_duyet&id={{$value->ID}}'><img src='storage/images/active.png'  class='d-inline-block align-top' alt='' /></a></td>
							
							}
							else
							{
								<td class='text-center'><a href='nguoidung_duyet&id={{$value->ID}}'><img src='storage/images/ban.png'  class='d-inline-block align-top' alt=''/></a></td>
							
							} -->
							<td class="text-center"><a href="{{ url('/nguoidung/sua/' . $value->ID) }}" class="btn btn-warning btn-sm" style="width:50px;">Sửa</a></td>
							<td class="text-center"><a onclick="return confirm('Bạn có muốn xóa nguoi dung {{ $value->HoVaTen }}?')" href="{{ url('/nguoidung/xoa/' . $value->ID) }}" class="btn btn-danger btn-sm" style="width:50px;">Xóa</a></td>
						</tr>
					@endforeach				
					
				
			</tbody>
		</table>
	</div>
</div>
@endsection
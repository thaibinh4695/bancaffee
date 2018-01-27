@extends('layouts.master')
@section('title','Edit User')
@section('khoa')

<div class="card">
	<h4 class="card-header">Cập nhật thành viên</h4>
	@if($errors->has('khoa'))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						{{$errors->first('khoa')}}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
			@endif
	<div class="card-body">
		<form action="{{url('/nguoidung/sua_xuly')}} "  method="post">
			<input type="hidden" class="form-control" id="ID" name="ID" value=" {{$nguoidung->ID}}" placeholder="" required />

			<div class="form-group">
				<label for="HoVaTen">Họ và tên</label>
				<input type="text" class="form-control" id="HoVaTen" name="HoVaTen" value=" {{$nguoidung->HoVaTen}}" placeholder="" required />
			</div>
			<div class="form-group">
				<label for="TenDangNhap">Tên đăng nhập</label>
				<input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" value="{{$nguoidung->TenDangNhap}}" placeholder="" required />
			</div>
			<div class="form-group">
				<label for="MatKhau">Mật khẩu</label>
				<input type="password" class="form-control" id="MatKhau" name="MatKhau" placeholder="" required />
			</div>
			<div class="form-group">
				<label for="XacNhanMatKhau">Xác nhận mật khẩu</label>
				<input type="password" class="form-control" id="XacNhanMatKhau" name="XacNhanMatKhau" placeholder="" required />
			</div>
			<button type="submit" class="btn btn-primary">Cap nhat</button>
		</form>
	</div>
</div>
@endsection
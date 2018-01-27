@extends('layouts.master')
 @section('title','Sign up')
@section('khoa')
<div class="card" >
	<h4 class="card-header" style="color: red;">Đăng ký thành viên</h4>
		@if($errors->has('khoa'))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						{{$errors->first('khoa')}}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
		@endif
	<div class="card-body">
		<form action="dangky_xuly" method="post">
			
				<div class="col-sm-3">
					<div class="form-group">
						<label for="HoVaTen">Họ và tên</label>
						<input type="text" class="form-control" id="HoVaTen" name="HoVaTen" placeholder="" required />
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label for="TenDangNhap">Tên đăng nhập</label>
						<input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" placeholder="" required />
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label for="MatKhau">Mật khẩu</label>
						<input type="password" class="form-control" id="MatKhau" name="MatKhau" placeholder="" required />
					</div>
					<div class="form-group">
						<label for="XacNhanMatKhau">Xác nhận mật khẩu</label>
						<input type="password" class="form-control" id="XacNhanMatKhau" name="XacNhanMatKhau" placeholder="" required />
					</div>
					

					<button type="submit" class="btn btn-primary">Đăng ký</button>
				</div>
			
		</form>
	</div>
</div>
@stop
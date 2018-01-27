@extends('layouts.master')
@section('title','Sign in')
@section('khoa')
<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-4"> 
				@if($errors->has('khoa'))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						{{$errors->first('khoa')}}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
					@endif
	</div>
</div>
<div class="row">
	<div class="col-lg-4">
		
	</div>
		<div class="card" >
			<h4 class="card-header" style="color: red;">Đăng nhập</h4>
			<div class="card-body">
				<form action="{{url('dangnhap_xuly')}}" method="post">
					<div class="form-group">
						<label for="TenDangNhap">Tên đăng nhập</label>
						<input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" placeholder="" required />
					</div>
					<div class="form-group">
						<label for="MatKhau">Mật khẩu</label>
						<input type="password" class="form-control" id="MatKhau" name="MatKhau" placeholder="" required />
					</div>
					
					<button type="submit" class="btn btn-primary">Đăng nhập</button>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
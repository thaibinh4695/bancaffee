 @extends('layouts.master')
 @section('title','Change Password')
 @section('khoa')
 <div class="card">
	<h4 class="card-header">Đổi Mật Khẩu</h4>
	@if($errors->has('khoa'))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						{{$errors->first('khoa')}}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
					@endif
	<div class="card-body">
		<form action="doimatkhau_xuly" method="post">
			
			<div class="form-group">
				<label for="MatKhau">Mật khẩu</label>
				<input type="password" class="form-control" id="MatKhau" name="MatKhau" placeholder="" />
				@if($errors->has('SaiMatKhau'))
					<div class="invalid-feedback"><strong>{{ $errors->first('SaiMatKhau') }}</strong></div>
				@endif
			</div>
			<div class="form-group">
				<label for="MatKhauMoi">Mật khẩu Mới</label>
				<input type="password" class="form-control" id="MatKhauMoi" name="MatKhauMoi" placeholder="" required />
			</div>
			<div class="form-group">
				<label for="XacNhanMatKhau">Xác nhận mật khẩu</label>
				<input type="password" class="form-control" id="XacNhanMatKhau" name="XacNhanMatKhau" placeholder="" />
			</div>
			<button type="submit" class="btn btn-primary">Cập nhật</button>
		</form>
	</div>
</div>
@stop
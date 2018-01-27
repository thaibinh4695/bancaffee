 @extends('layouts.master')
 @section('title','Update user')
 @section('khoa')
 <div class="card">
	<h4 class="card-header">Cập Nhật Hồ Sơ</h4>
	@if($errors->has('khoa'))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						{{$errors->first('khoa')}}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
					@endif
	<div class="card-body">
		<form action="capnhat_xuly" method="post">
			
			<div class="form-group">
				<label for="HoVaTen">Họ Và Tên</label>
				<input type="text" class="form-control" id="HoVaTen" name="HoVaTen" value="{{$nguoidung->HoVaTen}}" placeholder="" required />
			</div>
			
			<button type="submit" class="btn btn-primary">Cập nhật</button>
		</form>
	</div>
</div>
@endsection
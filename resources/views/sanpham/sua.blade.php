@extends('layouts.master')
@section('title','Product Edit')
@section('khoa')
<div class="card">
	<h4 class="card-header">Sửa Caffee</h4>
		@if($errors->has('khoa'))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						{{$errors->first('khoa')}}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
		@endif
	<div class="card-body">
		<form action="{{ url('/sanpham/sua_xuly') }}" method="post" >
		 <input type="hidden" name="id" value="{{ $sanpham->ID }}" />
					<div class="form-group">
				<label for="Tensanpham">Tên Caffee</label>
				<input type="text" class="form-control" id="Tensanpham" name="Tensanpham" placeholder="Tên điện thoại" value= "{{$sanpham->Tensanpham}}" required />
			</div>
			
			<div class="form-group">
				<label for="MaLoai"> Loại Caffee</label>
				<select class="form-control custom-select" id="MaLoai" name="MaLoai" required>
					<option value="">-- Chọn loại Caffee -- </option>
						@foreach($loaisanpham as $value)
							<option value="{{$value->ID}}" selected="selected">{{$value->TenLoai}}</option>
						@endforeach
				</select>
			</div>
			
			<div class="form-group">
				<label for="MaNhaSX">Nhà sản xuất </label>
				<select class="form-control custom-select" id="MaNhaSX" name="MaNhaSX" required>
					<option value="">-- Chọn nhà sản xuất-- </option>
						@foreach($nhasx as $value)
							<option value="{{$value->ID}}" selected="selected">{{$value->TenNhaSX}}</option>
						@endforeach
				</select>
			</div>
			
			<div class="form-group">
				<label for="MoTa">Mô tả</label>
				<input type="text" class="form-control" id="MoTa" name="MoTa" value= "{{$sanpham->MoTa}}" 
				placeholder="" required />
			</div>
			
			<div class="form-group">
				<label for="DonGia">Đơn giá</label>
				<input type="text" class="form-control" id="DonGia" name="DonGia" value= "{{$sanpham->DonGia}}" >
			</div>
			<div class="form-group">
				<label for="SoLuong">Số lượng</label>
				<input type="text" class="form-control" id="SoLuong" name="SoLuong" value= "{{$sanpham->SoLuong}}" >
			</div>
			<div class="form-group">
				<label for="HinhAnh">Ảnh bìa Caffee</label>
					<div class="input-group mb-2 mb-sm-0">
					<div class="input-group-addon"><a href="#" onclick="BrowseServer();">Hình ảnh</a> </div>
					<input type="text" class="form-control" id="HinhAnh" name="HinhAnh" value= "{{$sanpham->HinhAnh}}" placeholder="" required />
				</div>
			</div>
			@if($errors->has('KhongTheXoa'))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						{{$errors->first('KhongTheXoa')}}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
		@endif

			<button type="submit" class="btn btn-primary">Cập nhật</button>
		</form>
	</div>
</div>
@stop
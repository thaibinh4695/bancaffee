@extends('layouts.master')
@section('title','Product Add')
@section('khoa')
	<div class="card-header">Thêm Caffee
	<div class="row">
				@if($errors->has('khoa'))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						{{$errors->first('khoa')}}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
				@endif
	</div>
	<div class="card-body">
		<form action="{{ url('/sanpham/them_xuly') }}" method="post" >
					<div class="form-group">
				<label for="Tensanpham">Tên Caffee</label>
				<input type="text" class="form-control" id="Tensanpham" name="Tensanpham" placeholder="Tên điện thoại" required />
			</div>
			
			<div class="form-group">
				<label for="MaLoai"> Loại Caffee</label>
				<select class="form-control custom-select" id="MaLoai" name="MaLoai" required>
					<option value="">-- Chọn loại Caffee -- </option>
					@foreach($loaisanpham as $value)
						<option value="{{$value->ID}}" >{{$value->TenLoai}}</option>
					@endforeach
				</select>
			</div>
			
			 <div class="form-group">
				<label for="MaNhaSX">Mã hãng sản xuất </label>
				<select class="form-control custom-select" id="MaNhaSX" name="MaNhaSX" required>
					<option value="">-- Chọn hãng sản xuất -- </option>
					@foreach($nhasx as $value)
						<option value="{{$value->ID}}" >{{$value->TenNhaSX}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="MoTa">Mô Tả</label>
				<input type="text" class="form-control ckeditor" id="MoTa" name="MoTa"  
				required />
			</div>
			<div class="form-group">
				<label for="SoLuong">Số lượng</label>
				<input type="text" class="form-control" id="SoLuong" name="SoLuong"  required />
			</div>
			
			<div class="form-group">
				<label for="DonGia">Đơn giá</label>
				<input type="text" class="form-control" id="DonGia" name="DonGia"  required />
			</div>
			
			<div class="form-group">
				<label for="HinhAnh">Ảnh bìa Caffee</label>
					<div class="input-group mb-2 mb-sm-0">
					<div class="input-group-addon"><a href="#" onclick="BrowseServer();">Hình ảnh</a> </div>
					<input type="text" class="form-control" id="HinhAnh" name="HinhAnh"/>
				</div>
			</div>

			<button type="submit" class="btn btn-primary">Thêm vào CSDL</button>
		</form>
	</div>
	</div>

@stop
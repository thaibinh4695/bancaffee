@extends('layouts.master')
@section('title','Edit Product')
@section('khoa')
<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header">Sửa loại sản phẩm</div>
				<div class="card-body">
                    <form action="{{ url('/loaisanpham/sua_xuly') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $loaisanpham->ID }}" />
						<div class="form-group">
							<label for="TenLoai">Tên loại sản phẩm <span class="text-danger font-weight-bold">*</span></label>
							<input type="text" class="form-control{{ $errors->has('TenLoai') ? ' is-invalid' : '' }}" id="TenLoai" name="TenLoai" value="{{ $loaisanpham->TenLoai }}" placeholder="" required />
							@if($errors->has('TenLoai'))
								<div class="invalid-feedback"><strong>{{ $errors->first('TenLoai') }}</strong></div>
							@endif
						</div>
						
						<button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
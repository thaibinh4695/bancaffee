@extends('layouts.master')
@section('title','Add Producer')
@section('khoa')
	<div class="row">
	@if($errors->has('khoa'))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						{{$errors->first('khoa')}}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
				@endif
		<div class="col">
			<div class="card">
				<div class="card-body">
                    <form action="{{ url('/nhasanxuat/them_xuly') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
							<label for="TenNhaSX">Tên hãng sản xuất <span class="text-danger font-weight-bold">*</span></label>
							<input type="text" class="form-control{{ $errors->has('TenNhaSX') ? ' is-invalid' : '' }}" id="TenNhaSX" name="TenNhaSX" value="{{ old('TenNhaSX') }}" placeholder="" required />
							@if($errors->has('TenNhaSX'))
								<div class="invalid-feedback"><strong>{{ $errors->first('TenNhaSX') }}</strong></div>
							@endif
						</div>
						
						<button type="submit" class="btn btn-primary">Thêm vào CSDL</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
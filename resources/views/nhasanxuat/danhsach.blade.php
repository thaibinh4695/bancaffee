@extends('layouts.master')
@section('title','List Producer')
@section('khoa')
<div class="row">
		<div class="col">
			<div class="card">
			@if($errors->has('khoa'))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						{{$errors->first('khoa')}}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
				@endif
				<div class="card-body">
					<p><a class="btn btn-primary" href="{{ url('/nhasanxuat/them') }}" role="button">Thêm hãng sản xuất</a></p>
					<table class="table table-bordered table-hover table-sm table-responsive">
						<thead>
							<tr>
								<th width="5%">#</th>
								<th width="79%">Tên hãng sản xuất</th>
								<th width="8%">Sửa</th>
								<th width="8%">Xóa</th>
							</tr>
						</thead>
						<tbody>
							@php $count = 1; @endphp
							@foreach($nhasanxuat as $value)
								<tr>
									<td>{{ $count++ }}</td>
									<td>{{ $value->TenNhaSX }}</td>
									<td class="text-center"><a href="{{ url('/nhasanxuat/sua/' . $value->ID) }}" class="btn btn-warning btn-sm" style="width:50px;">Sửa</a></td>
									<td class="text-center"><a onclick="return confirm('Bạn có muốn xóa hãng sản xuất {{ $value->TenNhaSX }}?')" href="{{ url('/nhasanxuat/xoa/' . $value->ID) }}" class="btn btn-danger btn-sm" style="width:50px;">Xóa</a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
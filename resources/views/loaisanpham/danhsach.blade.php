@extends('layouts.master')
@section('title','List Product')
@section('khoa')
<div class="row">
		<div class="col">
		@if($errors->has('khoa'))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						{{$errors->first('khoa')}}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
		@endif
			<div class="card">
		
	
				<div class="card-body">
					<h3><a  href="{{ url('/loaisanpham/them') }}" role="button">+ Thêm loại Caffee</a></h3>
					<table class="table table-bordered table-hover table-sm table-responsive">
						<thead>
							<tr>
								<th width="5%">#</th>
								<th width="79%">Tên loại Caffee</th>
								<th width="8%">Sửa</th>
								<th width="8%">Xóa</th>
							</tr>
						</thead>
						<tbody>
							@php $count = 1; @endphp
							@foreach($loaisanpham as $value)
								<tr>
									<td>{{ $count++ }}</td>
									<td>{{ $value->TenLoai }}</td>
									<td class="text-center"><a href="{{ url('/loaisanpham/sua/' . $value->ID) }}" class="btn btn-warning btn-sm" style="width:50px;">Sửa</a></td>
									<td class="text-center"><a onclick="return confirm('Bạn có muốn xóa loại Caffee này {{ $value->TenLoai }}?')" href="{{ url('/loaisanpham/xoa/' . $value->ID) }}" class="btn btn-danger btn-sm" style="width:50px;">Xóa</a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
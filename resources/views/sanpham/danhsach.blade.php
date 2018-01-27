@extends('layouts.master')
@section('title','Product List')
@section('khoa')

			<div class="card">
				<div class="card-body">
					<p><a  href="{{ url('/sanpham/them') }}" role="button"><h2>+ Thêm sản phẩm Caffee</h2></a>
						@if($errors->has('khoa'))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						{{$errors->first('khoa')}}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
					@endif
					</p>
					<table class="table table-bordered table-hover table-sm table-responsive">
						<thead>
							<tr>
								<th width="5%">#</th>
								<th width="10%">Loại Caffee</th>
								<th width="29%">Tên Caffee</th>
								<th width="20%">Hình ảnh</th>
								<th width="10%">Số lượng</th>
								<th width="10%">Đơn giá</th>
								<th width="8%">Sửa</th>
								<th width="8%">Xóa</th>
							</tr>
						</thead>
						<tbody>
							@php $count = 1; @endphp
							@foreach($sanpham as $value)
								<tr>
									<td>{{ $count++ }}</td>
									<td>{{ $value->TenLoai }}</td>
									<td>{{ $value->Tensanpham }}</td>
									<td>{{$value->HinhAnh }}</td>
									<td>{{ $value->SoLuong }}</td>
									<td>{{ $value->DonGia }}</td>
									
									<td class="text-center"><a href="{{ url('/sanpham/sua/' . $value->ID) }}" class="btn btn-warning btn-sm" style="width:50px;">Sửa</a></td>
									<td class="text-center"><a onclick="return confirm('Bạn có muốn xóa Caffee {{ $value->Tensanpham }}?')" href="{{ url('/sanpham/xoa/' . $value->ID) }}" class="btn btn-danger btn-sm" style="width:50px;">Xóa</a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		

@endsection
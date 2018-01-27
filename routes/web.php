<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/','ControllerNguoiDung@getTrangChu');
Route::get('dangnhap','ControllerNguoiDung@getDangNhap');
Route::get('dangky','ControllerNguoiDung@getDangKy');
Route::post('dangnhap_xuly','ControllerNguoiDung@postDangNhap');
Route::post('dangky_xuly','ControllerNguoiDung@postDangKy');
Route::get('dangxuat','ControllerNguoiDung@getDangXuat');
Route::get('quanly','ControllerNguoiDung@getQuanLy');
Route::get('doimatkhau&id={id}','ControllerNguoiDung@getDoiMatKhau');
Route::post('doimatkhau_xuly','ControllerNguoiDung@postDoiMatKhau');
Route::get('capnhathoso&id={id}','ControllerNguoiDung@getCapNhat');
Route::post('capnhat_xuly','ControllerNguoiDung@postCapNhat');
//  Loại sản phẩm
Route::get('/loaisanpham', 'LoaiSanPhamController@getDanhSach');
Route::get('/loaisanpham/them', 'LoaiSanPhamController@getThem');
Route::post('/loaisanpham/them_xuly', 'LoaiSanPhamController@postThem');
Route::get('/loaisanpham/sua/{id}', 'LoaiSanPhamController@getSua');
Route::post('/loaisanpham/sua_xuly', 'LoaiSanPhamController@postSua');
Route::get('/loaisanpham/xoa/{id}', 'LoaiSanPhamController@getXoa');

// Sản phẩm
Route::get('/sanpham/them', 'SanPhamController@getThem');
Route::post('/sanpham/them_xuly', 'SanPhamController@postThem');
Route::get('/sanpham/sua/{id}', 'SanPhamController@getSua');
Route::post('/sanpham/sua_xuly', 'SanPhamController@postSua');
Route::get('/sanpham/nguoidung', 'SanPhamController@getDanhSach_NguoiDung');
Route::get('/sanpham', 'SanPhamController@getDanhSach_dienthoai');
Route::get('/sanpham/{id}/duyet/{trangthai}', 'SanPhamController@getDuyet');
Route::get('/sanpham/xoa/{id}', 'SanPhamController@getXoa');
Route::get('/','SanPhamController@getHome');
Route::get('/sanpham/chitiet={id}','SanPhamController@getChiTiet');
Route::post('/sanpham/timkiem', 'SanPhamController@postTimKiem');

//  Nhà sản xuất
Route::get('/nhasanxuat', 'NhaSanXuatController@getDanhSach');
Route::get('/nhasanxuat/them', 'NhaSanXuatController@getThem');
Route::post('/nhasanxuat/them_xuly', 'NhaSanXuatController@postThem');
Route::get('/nhasanxuat/sua/{id}', 'NhaSanXuatController@getSua');
Route::post('/nhasanxuat/sua_xuly', 'NhaSanXuatController@postSua');
Route::get('/nhasanxuat/xoa/{id}', 'NhaSanXuatController@getXoa');
Route::post('/nhasanxuat/xoa_xuly', 'NhaSanXuatController@postXoa');

// nguoi dung
Route::get('/nguoidung', 'ControllerNguoiDung@getDanhSach');
Route::get('/nguoidung/them', 'ControllerNguoiDung@getThem');
Route::post('/nguoidung/them_xuly', 'ControllerNguoiDung@postThem');
Route::get('/nguoidung/sua/{id}', 'ControllerNguoiDung@getSua');
Route::post('/nguoidung/sua_xuly', 'ControllerNguoiDung@postSua');
Route::get('/nguoidung/xoa/{id}', 'ControllerNguoiDung@getXoa');
Route::get('/nguoidung/dangky','ControllerNguoiDung@getDangKy');
Route::post('/nguoidung/dangky_xuly', 'ControllerNguoiDung@postDangKy');
Route::get('/nguoidung/duyet/{id}', 'ControllerNguoiDung@getDuyet');

Route::get('/gioithieu','ControllerNguoiDung@getGioithieu');
Route::get('/lienhe','ControllerNguoiDung@getlienhe');
Route::get('sanphambanchay','ControllerNguoiDung@getsanphambanchay');
Route::get('sanphammoinhat','ControllerNguoiDung@getsanphammoinhat');
Route::get('/giohang_them&id={id}','GoHangController@getThemGH');
Route::get('giohang','GoHangController@getDanhSach');
Route::get('giohang/danhsach','GoHangController@getDanhSach');
Route::post('giohang/capnhat','GoHangController@postCapNhat');
Route::get('giohang_xoa&id={id}','GoHangController@getXoa');


// dat hang
Route::post('/dathang/them_xuly', 'DatHangController@postThem');
Route::get('/dathang/them/{id}', 'DatHangController@getThem');//route nay k co id
Route::get('/dathang', 'DatHangController@getDanhSach');
#giohang_them&id=14
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelNguoiDung;
use App\User;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;
class NhaSanXuatController extends Controller
{
    
    public function getDanhSach()
    {
        session_start();
		$nhasanxuat = DB::table('tbl_nhasanxuat')->get();
        return view('nhasanxuat.danhsach', ['nhasanxuat' => $nhasanxuat]);
    }
    public function getThem()
    {
        session_start();
        return view('nhasanxuat.them');
    }

    public function postThem(Request $request)
    {
        // Kiểm tra

        session_start();
        $TenNhaSX = $request->input('TenNhaSX');
		
		DB::table('tbl_nhasanxuat')->insert([
			'TenNhaSX' => $TenNhaSX
		]);
		
		return redirect('/nhasanxuat')->withErrors(['khoa' => 'Thêm hãng sản xuất thành công!']);
    }

 
    public function getSua($id)
    {
        session_start();
        $nhasanxuat = DB::table('tbl_nhasanxuat')->where('ID', '=', $id)->first();
		return view('nhasanxuat.sua', ['nhasanxuat' => $nhasanxuat]);
    }

    public function postSua(Request $request)
    {
        session_start();
        $TenNhaSX = $request->input('TenNhaSX');
        $ID = $request->input('id');
  
        DB::table('tbl_nhasanxuat')->where('ID',$ID)->update([
            'TenNhaSX' => $TenNhaSX
        ]);
		return redirect('/nhasanxuat')->withErrors(['khoa' => 'Sửa hãng sản xuất thành công!']);
		// return redirect('nhasanxuat');
    }
    public function getXoa($id)
    {
        session_start();
        DB::table('tbl_nhasanxuat')->where('ID', '=', $id)->delete();
		return redirect('nhasanxuat')->withErrors(['khoa' => 'Xóa hãng sản xuất thành công!']);;
    }
}

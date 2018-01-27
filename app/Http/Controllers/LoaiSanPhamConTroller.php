<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelNguoiDung;
use App\User;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;
class LoaiSanPhamConTroller extends Controller
{
     
    public function getDanhSach()
    {
        session_start();
		$loaisanpham = DB::table('tbl_loaisanpham')->get();
        return view('loaisanpham.danhsach', ['loaisanpham' => $loaisanpham]);
    }

    public function getThem()
    {
        session_start();
        return view('loaisanpham/them');
    }
    public function postThem(Request $request)
    {
        // Kiểm tra
        session_start();
        $TenLoai = $request->input('TenLoai');
	
		$sql = array(
            'TenLoai' => $TenLoai
        );
		DB::table('tbl_loaisanpham')->insert($sql);

        return redirect('loaisanpham')->withErrors(['khoa' => 'Thêm loại Caffee thành công!']);

		
		// return redirect('loaisanpham');
    }

    public function getSua($id)
    {
        session_start();
        $loaisanpham = DB::table('tbl_loaisanpham')->where('ID', '=', $id)->first();
		return view('loaisanpham.sua', ['loaisanpham' => $loaisanpham]);
    }
   
    public function postSua(Request $request)
    {
        session_start();
        $TenLoai = $request->input('TenLoai');
        $ID = $request->input('id');
        
        $sql = array(
            'TenLoai' => $TenLoai
        );
		DB::table('tbl_loaisanpham')->where('ID', $ID)->update($sql);
		
		return redirect('loaisanpham')->withErrors(['khoa' => 'Cập nhật lọai Caffee thành công!']);
    }
    public function getXoa($id)
    {
        session_start();
        DB::table('tbl_loaisanpham')->where('ID', '=', $id)->delete();
		return redirect('loaisanpham')->withErrors(['khoa' => 'Xóa Caffee thành công!']);
    }
}

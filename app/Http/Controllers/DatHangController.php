<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelNguoiDung;
use App\ModelSanPham;
use App\User;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;
class DatHangController extends Controller
{
	public function getThem($id){
                
		// Lấy thông tin giỏ hàng
		//session_start();
        	if(!isset($_SESSION['GioHang'][$id])){
                        $_SESSION['GioHang'] = array();
                }
                $SoLuongSanPhamTrongGio = 0;
                
                session_start();
                if(isset($_SESSION['GioHang'][$id])){
                        $SoLuongSanPhamTrongGio = $_SESSION['GioHang'][$id] + 1;
                }
                else{
                        $SoLuongSanPhamTrongGio = 1;
                }
                $_SESSION['GioHang'][$id] = $SoLuongSanPhamTrongGio;
                return redirect('giohang');
        }

	public function postThem(Request $request)
	{
                session_start();
		dd($_SESSION['GioHang']);
		
	}
	public function getdanhsach(){
        	session_start();
        			
                $GioRong = true;

                $SanPhamTrongGio = array();
                if(isset($_SESSION['GioHang'])){
                        foreach($_SESSION['GioHang'] as $maSP => $soLuong){
                                if(isset($maSP)){
                                        $GioRong = false;
                                        $SanPhamTrongGio[] = $maSP;
                                }
                        }
                }
                if(!$GioRong){
                        $sanpham = DB::table('tbl_sanpham')->whereIn('ID',$SanPhamTrongGio)->get();
                        return view('dathang/danhsach')->with('GioRong',$GioRong)->with('sanpham',$sanpham);
                }
                return view('dathang/danhsach')->with('GioRong',$GioRong);

	}
}
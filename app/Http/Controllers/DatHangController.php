<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelNguoiDung;
use App\ModelSanPham;
use App\ModelDatHang;
use App\ModelDatHangCT;
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

	public function postThem(Request $request){

                session_start();
                //dd($_SESSION);
                #tạo đơn hàng
                $donhang = new ModelDatHang();
                $donhang->MaNguoiDung = $_SESSION["ID"];
                $donhang->DiaChiGiaoHang = '';
                $donhang->DienThoai = '0969345913';
                $donhang->save();
                #tạo chi tiết đơn hàng
                foreach($_SESSION['GioHang'] as $id => $soluong){
                        $ctdh = new ModelDatHangCT;
                        $ctdh->MaDatHang = $donhang->id;
                        $ctdh->Masanpham = $id;
                        $ctdh->SoLuong = $soluong;

                        #$cthd->DonGiaBan = // chỗ này e chỉnh lại thêm giá vào
                        $ctdh->save();
                        #echo $ctdh->id;
                }
                #xóa session GIOHANG để giỏ hàng trống
                unset($_SESSION['GioHang']);
                #nếu e đinh nghĩa route thì redirect route còn k thì return view
                return view('dathang.thanhcong');
		
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
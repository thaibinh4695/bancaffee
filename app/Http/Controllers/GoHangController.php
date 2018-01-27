<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelNguoiDung;
use App\User;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;
class GoHangController extends Controller
{
    
        
        
    public function getThemGH($id)
    { 
        
        if(!isset($_SESSION['GioHang'][$id]))
        {
        $_SESSION['GioHang'] = array();
        }
        $SoLuongSanPhamTrongGio = 0;
        session_start();
        if(isset($_SESSION['GioHang'][$id]))
        {
        $SoLuongSanPhamTrongGio = $_SESSION['GioHang'][$id] + 1;
        }
        else // Trong giỏ chưa có sản phẩm
        {
        $SoLuongSanPhamTrongGio = 1;
        }
        $_SESSION['GioHang'][$id] = $SoLuongSanPhamTrongGio;
        return redirect('giohang');
        }
        public function getDanhSach()
        {
        session_start();
        $GioRong = true;

        $SanPhamTrongGio = array();
        if(isset($_SESSION['GioHang']))
        {
        foreach($_SESSION['GioHang'] as $maSP => $soLuong)
        {
        if(isset($maSP))
        {
        $GioRong = false;
        $SanPhamTrongGio[] = $maSP;
        }
        }
        }
        if(!$GioRong)
        {
        $sanpham = DB::table('tbl_sanpham')->whereIn('ID',$SanPhamTrongGio)->get();
        return view('giohang/danhsach')->with('GioRong',$GioRong)->with('sanpham',$sanpham);
        }
        return view('giohang/danhsach')->with('GioRong',$GioRong);
        }

        public function postCapNhat(Request $request)
        {
            session_start();
            foreach($request->input('SoLuong') as $maSP => $soLuong)
            {
            $sanpham = DB::table('tbl_sanpham')->where('ID',$maSP)->first();
            if($soLuong <= 0)
            {
            unset($_SESSION['GioHang'][$maSP]);
            }
            elseif($soLuong > $sanpham->SoLuong)
            {
            return redirect()->back()->withErrors(['khoa' => 'Xin lỗi! số lượng Caffee hiện tại không đủ số lượng bạn yêu cầu! ']);
            }
            else
            {
            $_SESSION['GioHang'][$maSP] = $soLuong;
            }
            
            }
            return redirect('giohang');
        }

    public function getXoa($id)
    {
        session_start();
        unset($_SESSION['GioHang'][$id]);
        return redirect('giohang')->withErrors(['khoa' =>'xóa sản phẩm thành công!']);;
    }
}


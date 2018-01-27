<?php

namespace App\Http\Controllers;
use App\ModelNhaSanXuat;
use App\ModelLoaiSanPham;
use App\ModelSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Mail;
use Carbon\Carbon;
class SanPhamController extends Controller
{
    
     
    public function getDanhSach_dienthoai()
    {
        session_start();
		$sanpham = DB::table('tbl_sanpham as sp')
				->join('tbl_loaisanpham as l', 'sp.MaLoai', '=', 'l.ID')
				->join('tbl_nhasanxuat as nsx', 'sp.MaNhaSX', '=', 'nsx.ID')
				->select('sp.*', 'l.TenLoai', 'nsx.TenNhaSX')->get();
        return view('sanpham.danhsach', ['sanpham' => $sanpham]);
    }
	
    public function getDanhSach_NguoiDung()
    {
        session_start();
		$sanpham = DB::table('tbl_sanpham as sp')
				->join('tbl_loaisanpham as l', 'sp.MaLoai', '=', 'l.ID')
				->where('sp.ID', '=', Auth::nguoidung()->ID)
				->select('sp.*', 'l.TenLoai')->get();
        return view('sanpham.nguoidung', ['sanpham' => $sanpham]);
    }
	
	public function getDuyet($id, $trangthai)
	{
        session_start();
		DB::table('sanpham')->where('id', $id)->update([
			'kiem_duyet' => $trangthai
		]);
		
		if($trangthai == 1)
		{
			$nd_bv = DB::table('nguoidung as u')
					->join('sanpham as b', 'u.id', '=', 'b.id_user')
					->where('b.id', '=', $id)
					->select('b.tieu_de', 'u.email', 'u.HoVaTen')->first();
			
			// Gởi mail
			$data = [
				'HoVaTen' => $nd_bv->HoVaTen,
				'email' => $nd_bv->email,
				'Tensanpham' => $nd_bv->tieu_de
			];
			
			Mail::send('emails.duyetsanpham', $data, function($msg) use ($data){
				$msg->from('thaibinh341862652@gmail.com', 'Ban quản trị Shop Caffee');
				$msg->subject('Sản phẩm đã duyệt');
				$msg->to($data['email'], $data['HoVaTen']);
			});
		}
		
		return redirect('sanpham');
	}
    
    public function getThem()
    {
        $path = "http://127.0.0.1:8080/htdocs/myblog/storage/images/";
            $_SESSION['baseUrl'] = $path;

        session_start();
        $loaisanpham = DB::table('tbl_loaisanpham')->get();
        $nhasx = DB::table('tbl_nhasanxuat')->get();
        $sanpham = DB::table('tbl_sanpham')->get();
        
		return view('/sanpham/them')->with('loaisanpham' , $loaisanpham)->with('nhasx',$nhasx)->with('sanpham',$sanpham);

    }

    
    
    public function postThem(Request $request)
    {
        // Kiểm tra
       
		 session_start();
        $Tensanpham = $request->input('Tensanpham');
        $MaLoai = $request->input('MaLoai');
        $MaNhaSX = $request->input('MaNhaSX');
        $MoTa = $request->input('MoTa');
        $DonGia = $request->input('DonGia');
        $SoLuong = $request->input('SoLuong');
        $HinhAnh = $request->input('HinhAnh');

        DB::table('tbl_sanpham')->insert([
            'Tensanpham' => $Tensanpham,
            'MaLoai' => $MaLoai,
            'MaNhaSX'=>  $MaNhaSX,
            'MoTa'=> $MoTa,
            'DonGia'=> $DonGia,
            'SoLuong'=> $SoLuong,
            'HinhAnh'=> $HinhAnh

        ]);
        return redirect('/sanpham')->withErrors(['khoa' => 'Thêm Caffee thành công!']);
        // return redirect('/sanpham');
    }

      public function getSua($id)
    {
        session_start();
        $sanpham = DB::table('tbl_sanpham')->where('ID', $id)->first();
        $loaisanpham = DB::table('tbl_loaisanpham')->get();
        $nhasx = DB::table('tbl_nhasanxuat')->get();
		return view('sanpham.sua', ['sanpham' => $sanpham])->with('nhasx',$nhasx)->with('loaisanpham',$loaisanpham);
    }
    public function postSua(Request $request)
    {
        session_start(); 
        $Tensanpham = $request->input('Tensanpham');
        $MaLoai = $request->input('MaLoai');
        $MaNhaSX = $request->input('MaNhaSX');
        $MoTa = $request->input('MoTa');
        $DonGia = $request->input('DonGia');
        $SoLuong = $request->input('SoLuong');
        $HinhAnh = $request->input('HinhAnh');
        $ID = $request->input('id');
        
        DB::table('tbl_sanpham')->where('ID',$ID)->update([
            'Tensanpham' => $Tensanpham,
            'MaLoai' => $MaLoai,
            'MaNhaSX'=>  $MaNhaSX,
            'MoTa'=> $MoTa,
            'DonGia'=> $DonGia,
            'SoLuong'=> $SoLuong,
            'HinhAnh'=> $HinhAnh
        ]);
        $thongdiep=[
            'Tensanpham.required' =>'Tên sản phẩm không được bỏ trống',
            'MaLoai.required' => 'Mã loại không được bỏ trống',
            'MaNhaSX.required' =>'Mã nhà sản xuất không được bỏ trống',
            'MoTa.required' =>'Mô tả không được bỏ trống',
            'DonGia.required' =>'Đơn giá không được bỏ trống',
            'SoLuong.required' => 'Số lượng không được bỏ trống',
            'HinhAnh.required' => 'Hình ảnh không được bỏ trống',
        ];
        $validator = Validator::make($request->all(),$thongdiep);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $sql = array(
                'MaLoai'=>$MaLoai,
            
                'MaNhaSX'=>$MaNhaSX,
                'Tensanpham'=>$Tensanpham,
                'MoTa'=>$MoTa,
                'SoLuong'=>$SoLuong,
                'DonGia'=>$DonGia,
                'HinhAnh'=>$HinhAnh,
            );
            $objUser = new ModelSanPham();
            $objUser->where('ID' , $ID)->update($sql);

            return redirect('/sanpham')->withErrors(['khoa' => 'Cập nhật Caffee thành công!']);
        }
		
		return redirect('/sanpham');
    }
    public function getXoa($id)
    {
        session_start();
        $sanphamdb = new ModelSanPham();
        $sanphamdb->where('ID',$id)->delete();
		return redirect('/sanpham')->withErrors(['khoa' => 'Xóa Caffee thành công!']);;
    }
    public function getHome()
    {
        session_start();
        $sanpham = DB::table('tbl_sanpham')->get();
        return view('welcome')->with('sanpham',$sanpham);
    }
    public function getChiTiet($id)
    {
        session_start();
        $sanpham = DB::table('tbl_sanpham')->where('ID',$id)->get();

        return view('/sanpham/chitiet')->with('sanpham',$sanpham);
    }
    public function postTimKiem( Request $request )
    {
        session_start();
        $tk = $request->input('TimKiem');
        $sanpham = DB::table('tbl_sanpham')->where('Tensanpham','like','%'.$tk.'%')->get();
        return view('sanpham/sanphamtk')->with('sanpham',$sanpham);
    }
     
}

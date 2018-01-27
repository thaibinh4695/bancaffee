<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelNguoiDung;
use App\User;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;
class ControllerNguoiDung extends Controller
{
    //
    public function getDangNhap()
    {
        
    	return view('nguoidung/dangnhap');
    }

    public function postDangNhap(Request $request)
    {
        
    	$TenDangNhap = $request->input('TenDangNhap');
    	$MatKhau = $request->input('MatKhau');
    	$MatKhau = sha1($MatKhau);
    	$rules=[
    		'TenDangNhap'=>'required',
    		'MatKhau'=>'required',
    	];
    	$messages=[
    		'TenDangNhap.required'=>'Tên đăng nhập không được bỏ trống!',
    		'MatKhau.required'=>'Mật khẩu không được bỏ trống!',
    	];
    	$sql = [
    		'TenDangNhap'=>$TenDangNhap,
    		'MatKhau'=>$MatKhau
    	];

		$validator = Validator::make($request->all(),$rules,$messages);

    	$kt=DB::table('tbl_nguoidung')->where($sql)->first();
    	
    	if($validator->fails())
    	{
    		return redirect()->back()->withErrors($validator);
    	}
    	elseif ($kt) {
    		if($kt->Khoa==1)
    		{
    			return redirect()->back()->withErrors(['khoa' => 'Tài khoản bị khóa']);
    		}
            
              session_start();
    		  $_SESSION['ID'] = $kt->ID;
              $_SESSION['HoVaTen'] = $kt->HoVaTen;
              $_SESSION['QuyenHan'] = $kt->QuyenHan;

             
    		return redirect('/');
    	}
    	else
    		return redirect()->back()->withErrors(['khoa' => 'Tài khoản chưa chính xác!']);
    }
    
     public function getDangKy()
    {
        session_start();
    	return view('nguoidung/dangky');
    }
    public function postDangKy(Request $request)
    {
        session_start();
        $nguoidung=DB::table('tbl_nguoidung')->get();
    	$allRequest = $request->all();
    	$HoVaTen = $allRequest['HoVaTen'];
    	$TenDangNhap = $allRequest['TenDangNhap'];
    	$MatKhau = $allRequest['MatKhau'];
    	$XacNhanMatKhau = $allRequest['XacNhanMatKhau'];
    	
    	$rules=[
    		'HoVaTen'=>'required',
    		'TenDangNhap'=>'required|unique:tbl_nguoidung',
    		'MatKhau'=>'required',
    		'XacNhanMatKhau'=>'required'
    	];
    	$messages=[
    		'HoVaTen.required'=>'Họ và tên không được bỏ trống!',
    		'HoVaTen.HoVaTen'=>'Họ tên không đúng định dạng!',
    		'TenDangNhap.required'=>'Tên đăng nhập không được bỏ trống!',
    		'TenDangNhap.TenDangNhap'=>'Tên đăng nhập không đúng định dạng!',
    		'TenDangNhap.unique'=>'Tên đăng nhập đã tồn tại!',
    		'MatKhau.required'=>'Mật khẩu không được bỏ trống!',
    		'XacNhanMatKhau.required'=>'Xác nhận mật khẩu không được bỏ trống!'
    	];
    	$validator = Validator::make($request->all(),$rules,$messages);
    	if($validator->fails())
    	{
    		return redirect()->back()->withErrors($validator);
    	}
    	elseif($XacNhanMatKhau!=$MatKhau)
    	{
    		return redirect()->back()->withErrors(['khoa' => 'Mật khẩu xác nhận chưa chính xác!']);
    	}
    	else
    	{
	    	$MatKhau = sha1($MatKhau);
	    	$sql = array(
	    		'HoVaTen'=>$HoVaTen,
	    		'TenDangNhap'=>$TenDangNhap,
	    		'MatKhau'=>$MatKhau,
	    		'QuyenHan'=>2,
	    		'Khoa'=>0,
	    	);
	    	$objUser = new ModelNguoiDung();
	    	$objUser->insert($sql);

	    	return redirect('/nguoidung')->withErrors(['khoa' => 'Đăng ký thành công!'])->with('nguoidung',$nguoidung);
    	}
    }
   public function getDangXuat()
    {
        session_start();
        unset($_SESSION['ID']);
        unset($_SESSION['HoVaTen']);
        unset($_SESSION['QuyenHan']);
        return redirect('/');
    }
    public function getDanhSach()
    {
        session_start();
        $nguoidung = DB::table('tbl_nguoidung')->get();
        return view('nguoidung.danhsach', ['nguoidung' => $nguoidung]);
    }
      public function getTrangChu()
    {
        session_start();

        return view('welcome');
    }
    public function getQuanLy()
    {
        session_start();

        return view('nguoidung/quanly');
    }
    // sua nguoi dung
    public function getSua($id)
    {
        session_start();
        $nguoidung = DB::table('tbl_nguoidung')->where('ID','=',$id)->first();
        return view('nguoidung/sua')->with('nguoidung',$nguoidung);

    }

    public function postSua(Request $request)
    {
        session_start();
        $nguoidung=DB::table('tbl_nguoidung')->get();
        $allRequest = $request->all();
        $ID = $allRequest['ID'];
        $HoVaTen = $allRequest['HoVaTen'];
        $TenDangNhap = $allRequest['TenDangNhap'];
        $MatKhau = $allRequest['MatKhau'];
        $XacNhanMatKhau = $allRequest['XacNhanMatKhau'];
        
        $rules=[
            'HoVaTen'=>'required',
            'TenDangNhap'=>'required|unique:tbl_nguoidung',
            'MatKhau'=>'required',
            'XacNhanMatKhau'=>'required'
        ];
        $thongdiep=[
            'TenDangNhap.required' =>'Tên dang nhap không được bỏ trống',
            'HoVaTen.required' => 'Ho va ten không được bỏ trống',
            'MatKhau.required' => 'Mat khau không được bỏ trống ',
            'XacNhanMatKhau.required' => 'Xac Nhan Mat khau không được bỏ trống ',
            ];
        $validator = Validator::make($request->all(),$rules,$thongdiep);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $MatKhau = sha1($MatKhau);
            $sql = array(
                'HoVaTen' => $HoVaTen,
                'TenDangNhap' =>$TenDangNhap,
                'MatKhau' =>$MatKhau,
                'QuyenHan'=>2,
                'Khoa'=>0,
            );
            $objUser = new ModelNguoiDung();
            $objUser->where('ID' , $ID)->update($sql);
            return redirect('/nguoidung')->withErrors(['khoa' => 'Cập nhật người dùng thành công!']);
        }
        return redirect('/nguoidung');
        
    }
    public function getThem()
    {
        
        session_start();
        $nguoidung = DB::table('tbl_nguoidung')->get();        
        return view('nguoidung/them');
    }

    public function postThem(Request $request)
    {
        // Kiểm tra
        session_start();
        $nguoidung=DB::table('tbl_nguoidung')->get();
        $allRequest = $request->all();
        $HoVaTen = $allRequest['HoVaTen'];
        $TenDangNhap = $allRequest['TenDangNhap'];
        $MatKhau = $allRequest['MatKhau'];
        $XacNhanMatKhau = $allRequest['XacNhanMatKhau'];
        
        $rules=[
            'HoVaTen'=>'required',
            'TenDangNhap'=>'required|unique:tbl_nguoidung',
            'MatKhau'=>'required',
            'XacNhanMatKhau'=>'required'
        ];
        $messages=[
            'HoVaTen.required'=>'Họ và tên không được bỏ trống!',
            'HoVaTen.HoVaTen'=>'Họ tên không đúng định dạng!',
            'TenDangNhap.required'=>'Tên đăng nhập không được bỏ trống!',
            'TenDangNhap.TenDangNhap'=>'Tên đăng nhập không đúng định dạng!',
            'TenDangNhap.unique'=>'Tên đăng nhập đã tồn tại!',
            'MatKhau.required'=>'Mật khẩu không được bỏ trống!',
            'XacNhanMatKhau.required'=>'Xác nhận mật khẩu không được bỏ trống!'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        elseif($XacNhanMatKhau!=$MatKhau)
        {
            return redirect()->back()->withErrors(['khoa' => 'Mật khẩu xác nhận chưa chính xác!']);
        }
        else
        {
            $MatKhau = sha1($MatKhau);
            $sql = array(
                'HoVaTen'=>$HoVaTen,
                'TenDangNhap'=>$TenDangNhap,
                'MatKhau'=>$MatKhau,
                'QuyenHan'=>2,
                'Khoa'=>0,
            );
            $objUser = new ModelNguoiDung();
            $objUser->insert($sql);

            return redirect('/')->withErrors(['khoa' => 'Thêm người dùng thành công!'])->with('nguoidung',$nguoidung);
        }
        return redirect('nguoidung/danhsach')->with("success", "Thêm người dùng
         thành công!");
    }
    public function getXoa($id)
    {
        session_start();
        DB::table('tbl_nguoidung')->where('ID', '=', $id)->delete();
        return redirect('/nguoidung');
    }

    public function getDoiMatKhau($id)
    {
        session_start();
        $nguoidung = DB::table('tbl_nguoidung')->where('ID',$id)->first();
        return view('nguoidung/doimatkhau')->with('nguoidung',$nguoidung);
    }
    public function postDoiMatKhau(Request $request)
    {
        session_start();
        
        $MatKhau = $request->input('MatKhau');
        $MatKhauMoi = $request->input('MatKhauMoi');
        $XNMatKhau = $request->input('XacNhanMatKhau');
        $ID = $_SESSION['ID'];
        $MatKhauMoi = sha1($MatKhauMoi);
        $sql = [
            'MatKhau'=>$MatKhauMoi
        ];
        $sql1 = array(
                'MatKhau' => sha1($MatKhau)
            );
        $kt=DB::table('tbl_nguoidung')->where($sql1)->first();
        if(!$kt)
        {
            return redirect()->back()->withErrors(['khoa' => 'Mật khẩu sai!']);
        }
        elseif(sha1($XNMatKhau)!=$MatKhauMoi)
        {
            return redirect()->back()->withErrors(['khoa' => 'Mật khẩu xác nhận sai!']);
        }
        else
        {
            $objUser = new ModelNguoiDung();
            $objUser->where('ID',$ID)->update($sql);

        }
        return redirect('/');
     
    }
    public function getCapNhat($id)
    {
        session_start();
        $nguoidung = DB::table('tbl_nguoidung')->where('ID',$id)->first();
        return view('nguoidung/capnhat')->with('nguoidung',$nguoidung);
    }
    public function postCapNhat(Request $request)
    {
        session_start();
    
        //$MatKhau = $Allrequest['MatKhau'];
        $HoVaTen = $request->input('HoVaTen');
          $ID = $_SESSION['ID'];
        $sql = array(
                'HoVaTen' => $HoVaTen
                
            );
        $objUser = new ModelNguoiDung();
        $objUser->where('ID',$ID)->update($sql);
        unset($_SESSION['HoVaTen']);
        $_SESSION['HoVaTen'] = $HoVaTen;
        return redirect('/nguoidung')->withErrors(['khoa' => 'Cập nhật hồ sơ thành công!']);// return redirect()->back();
    }
    public function getGioithieu()
    {
        session_start();
        return view ('layouts/gioithieu');
    }
      public function getlienhe()
    {
        session_start();

        return view ('layouts/lienhe');
    }
     public function getsanphambanchay()
    {
        session_start();
        return view ('/layouts/sanphambanchay');
    }
    public function getsanphammoinhat()
    {
        session_start();
        return view ('/layouts/spmoinhat');
    }
}

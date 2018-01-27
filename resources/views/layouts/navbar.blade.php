<nav class="navbar navbar-expand-lg" style="background-image:url('{{url('storage/images/b75.jpg')}}');">
    <a class="navbar-brand">    
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
   <div class="col-sm-3">
        <marquee ><p class="text-white text-center  " style="margin-bottom:130px font-size:10px; ">Hân hạnh được phục vụ quý khách ! Welcome to the shop.</p></marquee>
    </div>
    <div class="col-sm-4"></div>
    <div class="col-sm-5">
      <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <ul class="navbar-nav ml-auto" style="margin-top: 80px">
          
            @if(!isset($_SESSION['ID']))
            
               <li class="nav-item"><a class="nav-link" href="dangnhap">Đăng nhập</a></li>
               <li class="nav-item"><a class="nav-link" href="dangky">Đăng ký</a></li>
          
            @else
            
              
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$_SESSION['HoVaTen']}}</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="doimatkhau&id={{$_SESSION['ID']}}">Đổi mật khẩu</a>
                  <a class="dropdown-item" href="capnhathoso&id={{$_SESSION['ID']}}">Cập nhật hồ sơ</a>
                </div>
                @if($_SESSION['QuyenHan'] == 1)
               
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Quản lý</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ url('/sanpham') }}">Quản lý Caffee</a>
                  <a class="dropdown-item" href="{{ url('/loaisanpham') }}">Quản lý loại Caffee</a>
                  <a class="dropdown-item" href="{{ url('/nhasanxuat') }}">Quản lý hãng sản xuất</a>
                  <a class="dropdown-item" href="{{ url('/nguoidung') }}">Quản lý người dùng</a>
                </div>
              </li>
              @endif
             <li class="nav-item"><a class="nav-link" href="dangxuat">Đăng xuất</a></li>
             <div class="text-right">
              <a href="{{ url('/giohang/danhsach')}}" class="btn btn-warning" >
               <i class="fa fa-cart-plus" aria-hidden="true"></i> Giỏ hàng
               </a>
          </div>
          @endif
          </ul>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark"  >
  <a class="navbar-brand" href="trangchu"><!-- <marquee ><p class="text-white text-center font-size:10" >Hân hạnh được phục vụ quý khách</p></marquee> -->
    </a>
    
  <a class="navbar-link" href="{{url('/')}}" style=""><button type="button" class="btn btn-primary">Trang chủ</button></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/gioithieu')}}"><button type="button" class="btn btn-primary">Giới thiệu</button>
          <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <div class="btn-group" style="margin-top: 8px;">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sản Phẩm</button>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
          <a class="dropdown-item" href="{{ url('/sanphambanchay')}}" style="color: red">Sản phẩm bán chạy</a>
          <a class="dropdown-item" href="#" style="color: red">Sản phẩm mới nhất</a>
         <!--  <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" style="color: red">Tất cả</a> -->
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="{{ url('/lienhe')}}"><button type="button" class="btn btn-primary">Liên hệ</button></a>
      </li>
     
    </ul>
      <form class="form-inline my-2 my-lg-0" action="{{url ('/sanpham/timkiem')}}" method="post">
        <input class="form-control mr-sm-2" type="search"  name="TimKiem" id="TimKiem" placeholder="Search" aria-label="Search">
       <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    
    
  </div>
  
</nav>


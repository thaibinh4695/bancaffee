<!doctype html>
<html lang="en">
<div class="container">
  <head>
    <title>Trang Chủ | @yield('title')</title>
    <!--  <base href="{{asset('')}}"> -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('public/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('public/css/bootstrap-custom.css')}}" />
    <link rel="stylesheet" href="{{url('public/font-awesome-4.7.0/css/font-awesome.css')}}" />
    <link rel="stylesheet" href="{{url('public/font-awesome-4.7.0/css/font-awesome.min.css')}}" />
  </head>
  <body>
    
    @include('layouts.navbar')
    @yield('khoa')
  </body>
  <footer>

    @include('layouts.footer')
    <script src="{{asset('public/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('public/js/popper.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/js/ckfinder/ckfinder.js')}}"></script>
    <script src="{{asset('public/js/ckeditor/ckeditor.js')}}"></script>
    
    <script type="text/javascript">

      function BrowseServer()
      {
        var finder = new CKFinder();
        finder.basePath = '../';
        finder.selectActionFunction = function(fileUrl) {
          document.getElementById('HinhAnh').value = fileUrl.substring(fileUrl.lastIndexOf('/') + 1);
        };
        finder.popup();
      }
    </script>

  </footer>

  </div>
</html>
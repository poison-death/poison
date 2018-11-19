<!DOCTYPE html>
<html lang="en">

<head>
  <script type="text/javascript" src="/jquery-1.8.3.js"></script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    无畏小青年
  </title>
  <!-- plugins:css -->
  <link rel="shortcut icon" href="/7.ico">
  <link rel="stylesheet" href="node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="node_modules/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="node_modules/flag-icon-css/css/flag-icon.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="node_modules/chartist/dist/chartist.min.css" />
  <link rel="stylesheet" href="node_modules/jvectormap/jquery-jvectormap.css" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/d/css/style.css">
  <link rel="stylesheet" href="/d/css/page_page.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/d/images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="/">
          <img src="/1.png" alt="">
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="/d/images/logo_mini.svg" alt="logo"></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav ml-lg-auto" style="width: 250px;">
          <li class="nav-item lang-dropdown d-none d-sm-block" style="width: 150px;">
            <p class="mb-0" style="width: 200px;">hi<a class="nav-link" href="/admin/login"  style="display: inline-block;">
              @if(session('user'))
                {{session('user')}}
              @else
                请登录
              @endif
            </a></p>
          </li>
          <li class="nav-item d-none d-sm-block profile-img">
            <a class="nav-link profile-image" href="#">
              <!-- <img src="/d/images/faces/face4.jpg" alt="profile-img"> -->
              @if(session('pic'))
                <img src="{{session('pic')}}" alt="profile-img">
              @else
                <img src="/d/images/faces/face4.jpg" alt="profile-img">
              @endif
              <span class="online-status online bg-success"></span>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center ml-auto" type="button" data-toggle="offcanvas">
          <span class="icon-menu icons"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <h3 class="nav-item nav-category">
              <span class="nav-link" style="padding-top: 20px;">用户管理</span>
            </h3>
            <li class="nav-item" style="display: none;">
              <a class="nav-link" href="/admin/users">
                <span class="menu-title">用户列表</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item" style="display: none;">
              <a class="nav-link" href="/admin/users/create">
                <span class="menu-title">用户添加</span>
                <i class="icon-wrench menu-icon"></i>
              </a>
            </li>

            <h3 class="nav-item nav-category">
              <span class="nav-link" style="padding-top: 30px;">分类管理</span>
            </h3>
            <li class="nav-item" style="display: none;">
              <a class="nav-link" href="/admin/cate">
                <span class="menu-title">分类列表</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item" style="display: none;">
              <a class="nav-link" href="/admin/cate/create">
                <span class="menu-title">分类添加</span>
                <i class="icon-wrench menu-icon"></i>
              </a>
            </li>

            <h3 class="nav-item nav-category">
              <span class="nav-link" style="padding-top: 30px;">文章管理</span>
            </h3>
            <li class="nav-item" style="display: none;">
              <a class="nav-link" href="/admin/article">
                <span class="menu-title">文章列表</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item" style="display: none;">
              <a class="nav-link" href="/admin/article/create">
                <span class="menu-title">文章添加</span>
                <i class="icon-wrench menu-icon"></i>
              </a>
            </li>

            <h3 class="nav-item nav-category">
              <span class="nav-link" style="padding-top: 30px;">公告管理</span>
            </h3>
            <li class="nav-item" style="display: none;">
              <a class="nav-link" href="/admin/notice">
                <span class="menu-title">公告列表</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item" style="display: none;">
              <a class="nav-link" href="/admin/notice/create">
                <span class="menu-title">公告添加</span>
                <i class="icon-wrench menu-icon"></i>
              </a>
            </li>

            <h3 class="nav-item nav-category">
              <span class="nav-link" style="padding-top: 30px;">评论管理</span>
            </h3>
            <li class="nav-item" style="display: none;">
              <a class="nav-link" href="/admin/evaluate">
                <span class="menu-title">评论列表</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item" style="display: none;">
              <!-- <a class="nav-link" href="/admin/evaluate/create">
                <span class="menu-title">评论添加</span>
                <i class="icon-wrench menu-icon"></i>
              </a> -->
            </li>

            <h3 class="nav-item nav-category">
              <span class="nav-link" style="padding-top: 30px;">网站管理</span>
            </h3>
            <li class="nav-item" style="display: none;">
              <a class="nav-link" href="/admin/wzsz/create">
                <span class="menu-title">网站设置</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item" style="display: none;">
              <a class="nav-link" href="/admin/wzsz">
                <span class="menu-title">设置列表</span>
                <i class="icon-wrench menu-icon"></i>
              </a>
            </li>
            
            <h3 class="nav-item nav-category">
              <span class="nav-link" style="padding-top: 30px;">轮播图管理</span>
            </h3>
            <li class="nav-item" style="display: none;">
              <a class="nav-link" href="/admin/broadcast">
                <span class="menu-title">轮播图列表</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item" style="display: none;">
              <a class="nav-link" href="/admin/broadcast/create">
                <span class="menu-title">轮播图添加</span>
                <i class="icon-wrench menu-icon"></i>
              </a>
            </li>

            <h3 class="nav-item nav-category">
              <span class="nav-link" style="padding-top: 30px;">回收站管理</span>
            </h3>
            <li class="nav-item" style="display: none;">
              <!-- <a class="nav-link" href="/admin/broadcast">
                <span class="menu-title">回收用户</span>
                <i class="icon-speedometer menu-icon"></i>
              </a> -->
            </li>
            <li class="nav-item" style="display: none;">
              <a class="nav-link" href="/admin/recovery">
                <span class="menu-title">回收文章</span>
                <i class="icon-wrench menu-icon"></i>
              </a>
            </li>

            <h3 class="nav-item nav-category">
              <span class="nav-link" style="padding-top: 30px;">友情链接管理</span>
            </h3>
            <li class="nav-item" style="display: none;">
              <a class="nav-link" href="/admin/link">
                <span class="menu-title">友情链接列表</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item" style="display: none;">
              <a class="nav-link" href="/admin/link/create">
                <span class="menu-title">友情链接添加</span>
                <i class="icon-wrench menu-icon"></i>
              </a>
            </li>
            

            <script type="text/javascript">
              $('h3').mouseover(function(){
                $(this).css('cursor','pointer');
              });
              $('h3').click(function(){
                // 让指定的ol执行动画
                $(this).next().slideToggle('slow');
                $(this).next().next().slideToggle('slow');
              })
            </script>
            <li class="nav-item">
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="content-wrapper">
          @if (session('success'))     
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif

          @if (session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
          @endif

          @section('text')

          @show

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        
        <!-- partial -->
      </div>
      <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="node_modules/flot/jquery.flot.js"></script>
  <script src="node_modules/flot/jquery.flot.resize.js"></script>
  <script src="node_modules/flot.curvedlines/curvedLines.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

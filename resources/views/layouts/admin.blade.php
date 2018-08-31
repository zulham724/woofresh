<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap Material Admin by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('adminlte/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('adminlte/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('adminlte/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/themes/fontawesome-stars-o.min.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <style type="text/css">
      .select2 span { display:block }
    </style>
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.html" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><span>Bootstrap </span><strong>Dashboard</strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Logout    -->
                <li class="nav-item">
                  <a href="#" onclick="logout()" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="{{ asset('storage/uploads/avatars/default.png') }}" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4">Maryya Sari</h1>
              <p>Web Designer</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
           <ul class="list-unstyled">

            <li {{ Request::is('home') ? 'class=active' : '' }}>
              <a href="{{ route('home') }}"> <i class="icon-home"></i>Dashboard </a>
            </li>

            <li  {{ Request::is('products') ? 'class=active' : '' }}><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Products </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ url('products') }}">All Products</a></li>
                <li><a href="{{ url('subcategories') }}">Categories</a></li>
                <li><a href="{{ url('suppliers') }}">Suppliers</a></li>
                <li><a href="{{ url('cities') }}">Cities</a></li>
              </ul>
            </li>
        
            <li {{ Request::is('users') ? 'class=active' : '' }}>
              <a href="{{ url('users') }}"> <i class="fa fa-bar-chart"></i> Users</a>
            </li>

            <li {{ Request::is('recipes') ? 'class=active' : '' }}>
              <a href="{{ route('recipes.index') }}"> <i class="fa fa-bar-chart"></i> Recipes</a>
            </li>

            <li {{ Request::is('ingredients') ? 'class=active' : '' }}>
              <a href="{{ route('ingredients.index') }}"> <i class="fa fa-bar-chart"></i> Ingredients</a>
            </li>

            <li {{ Request::is('transactions') ? 'class=active' : '' }}>
              <a href="{{ route('transactions.index') }}"> <i class="fa fa-bar-chart"></i> Transactions</a>
            </li>
                
        </ul><span class="heading">Settings</span>
        <ul class="list-unstyled">
          <li {{ Request::is('contents') ? 'class=active' : '' }}><a href="{{ url('contents') }}"> <i class="icon-padnote"></i>Content </a></li>
          <li {{ Request::is('languages') ? 'class=active' : '' }}> <a href="{{ url('/languages') }}"> <i class="icon-settings"></i>Language </a></li>
        </ul>
        </nav>
        <div class="content-inner" id="app">
          @yield('content')
          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>Your company &copy; 2017-2019</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a></p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('adminlte/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('adminlte/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('adminlte/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <!-- Main File-->
    <script src="{{ asset('adminlte/js/front.js') }}"></script>
    @yield('script')
    <script type="text/javascript">
      $(document).ready(function(){
        
        $('table').DataTable({
            dom: 'Bfrtip',
        
        });

        $('.select2').select2();

        $('.rating').barrating({
          theme: 'fontawesome-stars-o'
        });

      
      });

      const logout = ()=>{
        swal({
            type:"info",
            title: "Logout from here?",
            confirmButtonText: "<i class='fa fa-thumbs-up'></i> Yes, Log me out",
            showCancelButton:true,
            cancelButtonColor: '#d33',
            cancelButtonText: "<i class='fa fa-close'></i> Cancel"
        }).then(res=>{
          if(res.value){
              $("#logout-form").submit();
          }
        });
      }

    </script>
  </body>
</html>
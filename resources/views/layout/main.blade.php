<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <base href="{{url('./')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="manifest" href="{{url('assets/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{url('assets/favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{url('vendors/simplebar/css/simplebar.css')}}">
    <link rel="stylesheet" href="{{url('css/vendors/simplebar.css')}}">
    <!-- Main styles for this application-->
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    <script src="{{url('js/config.js')}}"></script>
    <script src="{{url('js/color-modes.js')}}"></script>
    <link href="{{url('vendors/@coreui/chartjs/css/coreui-chartjs.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <!-- Custom CSS -->
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #a8cdf5;
            color: white;
            overflow-y: auto;
            padding-top: 20px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #0056b3;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
        }

        .header {
            background-color: #a8cdf5;
            color: black;
            padding: 10px;
        }

        .container-fluid {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header border-bottom">
            <div class="sidebar-brand">
                <img class="sidebar-brand-full" src="{{url('assets/logo.png')}}" width="120" height="120" alt="Logo velgsecond">
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="nav-item"><a class="nav-link" href="{{url('dashboard')}}">
                <svg class="nav-icon">
                    <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-speedometer')}}"></use>
                </svg> Dashboard</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{url('barang')}}">
                <svg class="nav-icon">
                    <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-drop')}}"></use>
                </svg> Barang</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{url('pesanan')}}">
                <svg class="nav-icon">
                    <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-cart')}}"></use>
                </svg> Pesanan</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{url('pembayaran')}}">
                <svg class="nav-icon">
                    <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-bar-chart')}}"></use>
                </svg> Pembayaran</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{url('pembeli')}}">
                <svg class="nav-icon">
                    <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-smile')}}"></use>
                </svg> Pembeli</a>
            </li>
        </ul>
    </div>
    <div class="main-content">
        <header class="header header-sticky">
            <div class="container-fluid border-bottom">
                <ul class="header-nav">
                    <li class="nav-item">
                        <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                              onclick="event.preventDefault();
                                              this.closest('form').submit();" class="dropdown-item">
                              <svg class="icon me-2">
                                <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-account-logout')}}"></use>
                              </svg>{{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                </ul>
            </div>
        </header>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>

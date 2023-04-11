<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ECOM ADMIN</title>
    <link rel="stylesheet" href="{{asset('fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/adminlte.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/summernote.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <script src="{{asset('js/jquery.min.js')}}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400&display=swap" rel="stylesheet"> </head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
    <nav class="main-header navbar shadow-sm navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('/')}}" class="nav-link">HOME</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">CONTACT</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a href="#" data-toggle="modal" data-target="#CreateNotificationModal" class="dropdown-item ">Create New</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">Notification History</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user-circle"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a href="{{url('/OnLogOut')}}" class="dropdown-item ">Logout</a>
                    <div class="dropdown-divider"></div>
                    <a data-toggle="modal" data-target="#AddAdminModal"  class="dropdown-item">Add New Admin</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{url('/AdminListPage')}}" class="dropdown-item">Admin List</a>
                </div>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-danger elevation-1">
        <a href="/" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">ECOM</span>
        </a>
        <div class="sidebar ">
            <nav class="mt-2 pb-4">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{url('/')}}" class="nav-link"><i class="nav-icon fa fa-home"></i><p>Home</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('/VisitorListPage')}}" class="nav-link"><i class="nav-icon fa fa-chart-bar"></i><p>Visitor</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('/AdminListPage')}}" class="nav-link"><i class="nav-icon far fa-user-circle"></i><p>Admin</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('/NotificationListPage')}}" class="nav-link"><i class="nav-icon far fa-bell"></i><p>Notification</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('/OtpListPage')}}" class="nav-link"><i class="nav-icon far fa-envelope"></i><p>OTP History</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('/ContactListPage')}}" class="nav-link"><i class="nav-icon far fa-envelope"></i><p>Contact</p>
                        </a>
                    </li>


                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link"><i class="nav-icon fas fa-list-alt"></i>
                            <p>Site Info<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/AboutPage')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>About US</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('/AddressPage')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Address</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('/AboutCompanyPage')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>About Company</p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{url('/TermsPage')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Terms & Conditons</p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{url('/PolicyPage')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Privacy Policy</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('/PurchasePage')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>How To Purchase</p>
                                </a>
                            </li>
                            <li class="nav-item">
                            <a href="{{url('/MobileAppPage')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mobile App Link</p>
                            </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/SocialPage')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Social Link</p>
                                </a>
                            </li>
                        </ul>
                    </li>


{{--                    <li class="nav-item has-treeview">--}}
{{--                        <a href="#" class="nav-link"><i class="nav-icon fa fa-cog"></i>--}}
{{--                            <p>Site Settings<i class="right fas fa-angle-left"></i></p>--}}
{{--                        </a>--}}
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{url('/siteSEO')}}" class="nav-link">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>Site SEO</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link"><i class="fas fa-store nav-icon"></i>
                            <p>Shop Management<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/ShopPage')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Shop</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link"><i class="nav-icon fab fa-product-hunt"></i>
                            <p>Product Management<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/CategoryListPage')}}" class="nav-link">
                                    <i class="fa fa-list-alt nav-icon"></i>
                                    <p>Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/SubCategoryListPage')}}" class="nav-link">
                                    <i class="fas fa-list-alt nav-icon"></i>
                                    <p>Sub Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/BrandListPage')}}" class="nav-link">
                                    <i class="fas fa-list-alt nav-icon"></i>
                                    <p>Brand List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/ProductListPage')}}" class="nav-link">
                                    <i class="fas fa-list-alt nav-icon"></i>
                                    <p>Product List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/ProductDetailsPage')}}" class="nav-link">
                                    <i class="fas fa-list-alt nav-icon"></i>
                                    <p>Product Details</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/SliderListPage')}}" class="nav-link">
                                    <i class="fas fa-list-alt nav-icon"></i>
                                    <p>Slider</p>
                                </a>
                            </li>

                        </ul>
                    </li>

{{--                    <li class="nav-item">--}}
{{--                        <a href="{{url('/CustomOrderPage')}}" class="nav-link"><i class="nav-icon far fa-user-circle"></i><p>Custom Order</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a href="{{url('/ProductOrderPage')}}" class="nav-link"><i class="nav-icon far fa-user-circle"></i><p>Product Order</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/ProductReviewPage')}}" class="nav-link"><i class="nav-icon fas fa-comment-dots"></i><p>Product Review</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>
    <div class="content-wrapper">
        @yield('content')
    </div>

</div>
@include('Component.createNotification')
@include('Component.addAdmin')



<script src="{{asset('js/datatables.min.js')}}"></script>
<script src="{{asset('js/datatables-select.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/adminlte.min.js')}}"></script>
<script src="{{asset('js/dashboard2.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{asset('js/config.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script src="{{asset('js/axios.min.js')}}"></script>
<script src="{{asset('js/summernote.min.js')}}"></script>
@yield('script')
</body>
</html>


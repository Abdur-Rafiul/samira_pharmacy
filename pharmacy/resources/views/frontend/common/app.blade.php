<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- owl carousel slider CSS --}}
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    {{-- Material Design Bootstrap CDN --}}
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">


    {{-- Fontawesome icon CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>@yield('title')
    </title>


</head>

<body    style="background-image: url('{{ asset('/photo/body-bg.jpg')}}');">



<div class="container-fluid">



    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->

        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                        aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <li class="nav-item">

                    <a class="navbar-brand nav-link" href="/">
                        <img class="logo" src="{{asset('/photo')}}/medicine.png" alt=""><br>
                        <span class="text-danger d-flex">For better health</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ms-5 navbar-brand" href="#"><h4>Online Pharmacy</h4></a>
                    <span class="nav-link navbar-brand"><img class="delivery-logo" src="{{asset('/photo')}}/delivery.png" alt=""> Deliver to Bangladesh</span>
                </li>
                <!-- Search form -->
                <form class="d-none d-md-flex input-group w-auto my-auto search-btn">
                    <input autocomplete="off" type="search" class="form-control rounded medicine-search"
                           placeholder='Search Medicine' style="min-width:210%; padding: 20px" />
                    <span class="input-group-text border-0"><i class="fas fa-search fa-2x"></i></span>
                </form>

                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row">
                    <!-- Notification dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                           role="button" data-mdb-toggle="dropdown" aria-expanded="false">


                            @if (Route::has('login'))

                                @auth

                                    <h3> {{ Auth::user()->name }}</h3>

                                @else

                                    <img class="user-logo" src="{{asset('/photo')}}/user.png" alt="">



                                @endauth

                            @endif
                            {{--              <span class="badge rounded-pill badge-notification bg-danger">1</span>--}}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            @if (Route::has('login'))

                                @auth
                                    <li>
                                        <a href="{{ url('/dashboard-profile') }}" class="dropdown-item">Profile</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('login') }}" class="dropdown-item">Log in</a>
                                    </li>

                                    @if (Route::has('register'))
                                        <li>
                                            <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                                        </li>
                                    @endif
                                @endauth

                            @endif
                            <li>
                                <a class="dropdown-item" href="#">Some news</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Another news</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Icon -->
                    <li class="nav-item">
                        <a class="nav-link me-3 me-lg-0" href="#">
{{--                            <img class="cart-logo" src="{{asset('/photo')}}/cart.png" alt=""> <sup style="font-size: 20px" class="count text-danger"></sup>--}}
                        </a>
                    </li>





                </ul>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px;">
        <div class="container pt-4"></div>
    </main>
    <!--Main layout-->


    <div class="row">
      <div class="col-md-2">

          <nav  id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white navbar-control">
              <div class="position-sticky">
                  <div class="list-group list-group-flush mx-3 mt-4">
                      <div class="category_one">
                          <div class="category"  style="background-image: url('{{ asset('/photo/body-bg.jpg')}}');">

                          </div>
                      </div>


                  </div>
              </div>
          </nav>
      </div>
      <div class="col-md-1 col-lg-1">

      </div>
      <div class="col-md-8">
        @yield('content')
        @include('frontend.common.footer')
      </div>
      <div class="col-md-1 col-lg-1">

      </div>

    </div>
</div>



 {{-- jQuery CDN --}}
 <script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/axios.min.js')}}"></script>
 {{-- Material Design Bootstrap CDN --}}
<script src="{{asset('js/mdb.min.js')}}"></script>

 {{-- owl carousel slider js --}}
<script src="{{asset('js/owl.carousel.min.js')}}"></script>


<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{asset('js/zoomsl.js')}}"></script>


<script>
    $(document).ready(function (){
        $('#theImg').imagezoomsl({
            zoomrange: [3,3]
        });
    })
</script>

@yield("script")



    <script>

        //alert(1);
        axios.get('/category', {

        })
            .then(function (response) {
                const dataJSON = response.data;

                $.each(dataJSON, function (i, item) {

                    $('.category').append(
                        {{--src="{{asset('Website')}}/images/img_3.jpg"--}}
                    // href='/unit/" + dataJSON[i].floor_name + "'
                        "<a href='/categorymedicinedetails/"+dataJSON[i].category_name+"' class='list-group-item list-group-item-action py-2 ripple' aria-current='true'>"+
                         "<img class='sidebar-logo' class='me-3' src='{{asset('')}}/"+dataJSON[i].category_img+"' alt=''><span class='ms-2'>"
                          +dataJSON[i].category_name+
                        "</span></a>"

                    );
                });
            })
            .catch(function (error) {
                console.log(error);
            });

        //  alert(pharmacy);
        axios.get('/count', {



        })
            .then(function (response) {
                const data = response.data;

                $('.count').html(data);



            })
            .catch(function (error) {
                console.log(error);
            });

    </script>




</body>

</html>

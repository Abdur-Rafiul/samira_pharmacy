


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

                        <span> {{ Auth::user()->name }}</span>

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
                            <a href="{{ url('/dashboard') }}" class="dropdown-item">Profile</a>
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
                <img class="cart-logo" src="{{asset('/photo')}}/cart.png" alt="">
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

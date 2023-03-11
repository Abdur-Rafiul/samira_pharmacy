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

<body>



<div class="container-fluid">
    @include('frontend.common.header')

    <div class="row">
      <div class="col-md-2">

          <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white navbar-control">
              <div class="position-sticky">
                  <div class="list-group list-group-flush mx-3 mt-4">
                      <div class="category_one">
                          <div class="category">

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

    </script>




</body>

</html>

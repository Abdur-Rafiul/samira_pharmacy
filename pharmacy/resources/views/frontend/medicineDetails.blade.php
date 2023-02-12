@extends('frontend.common.app')


@section('content')
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
<div class="row mt-5">

    <div class="col-md-6 mt-5">
        <img id="medicine-img" src=""  alt="">
    </div>
    <div class="col-md-6">



                    <div class="row">
                        <h4 id="h4" class="medicineName">{{$mname}}</h4>
                        <h4 id="h4" class="categoryName">{{$cname}}</h4>
                        <div class="col-md-6">Conform order</div>
                        <div class="col-md-6">Add to Cart</div>
                    </div>





    </div>
</div>
            </div>




        </nav>
        <!-- Navbar -->


    </header>
@endsection


@push('script1')
    <script type="text/javascript">



            const medicineName =  $('.medicineName').html();
            const categoryName =  $('.categoryName').html();

            //alert(medicineName + categoryName);

            axios.post('/MedicineDetails',{
                medicineName:medicineName,
                categoryName:categoryName
            })
                .then(function (response) {
                    // handle success
                    // console.log(response.data);

                    if(response.status == 200){

                        const jsonData = response.data;

                        $("#medicine-img").attr("src",jsonData[1][0].medicine_img);




                    }else{


                    }




                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })

    </script>
@endpush


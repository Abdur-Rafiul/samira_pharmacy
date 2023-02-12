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
                        <h4 id="h4">Medicine Name</h4>
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

        $('.medicine_card').click(function (){

            const medicineName =  $(this).data('mname');
            const categoryName =  $(this).data('cname');

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


                        $('#medicine-img').src = jsonData[1][0].medicine_img;
                        $("h4").html(jsonData[1][0].medicine_name);
                        console.log((jsonData[1][0].medicine_img).toString());

                    }else{


                    }



                    window.location = '/getmedicineDetails';
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        })
    </script>
@endpush



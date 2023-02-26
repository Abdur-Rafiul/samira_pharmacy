@extends('frontend.common.app')


@section('content')
    <header class="mt-5 ml-5 medicine_div">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
<div class="row mt-5 ml-5">

    <div class="col-md-6 mt-5" id="theDivimg">



    </div>
    <div class="col-md-6 medicine_des">



                    <div class="row ml-5">
                        <h4 id="h4" class="medicineName mt-2">{{$mname}}</h4>
                        <h4 id="h4" class="categoryName d-none">{{$cname}}</h4>
                        <p class="discount1 text-danger" href=""></p>
                        <h6 id="h6" class="medicine_price1"><b>TK</b> <del class="medicine_price"></del></h6></b>


                        <b><h6 id="h6" class="medicine_special_price"></h6></b>

                        <h6 class="text-danger">**Do not buy any medicine without doctor's advice</h6>

                        <button class="col-md-6 btn-danger bg-danger text-white">Conform order</button>
                        <button class="col-md-6 btn-danger bg-danger text-white">Add to Cart</button>
                    </div>




    </div>

</div>
                <span>
</span>
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

                        var jsonData = response.data;

                        //$("#medicine-img").attr("src",jsonData[1][0].medicine_img);
                        //console.log(response.data);
                        let img_one = jsonData[1][0].medicine_img;
                        var source = window.location.protocol+"//"+window.location.hostname+':'+8000+'/'+img_one;

                        //console.log(source)
                        $('#theDivimg').prepend($('<img>',{id:'theImg',class:'w-100 img_one',src: source}));

                        $('.medicine_special_price').html('Special Price '+jsonData[1][0].medicine_special_price+' TK');


                        $('.discount1').html('Get '+jsonData[1][0].medicine_discount+' % off');
                        $('.medicine_price').html(+jsonData[1][0].medicine_price);
                    }else{


                    }




                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })

    </script>
@endpush


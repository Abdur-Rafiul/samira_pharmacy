@extends('frontend.common.app')


@section('content')
    <header class="mt-5 ml-5 medicine_div" style="background-image: url('{{ asset('photo/button_rainbow.png')}}');">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
<div class="row mt-5 ml-5">


    <div class="col-lg-2 col-md-2">


     <span class="img1"></span><br>
     <span class="img2"></span><br>
     <span class="img3"></span><br>



    </div>
    <div class="col-md-4 col-md-4 mt-5" id="theDivimg">



    </div>

    <div class="col-md-6 col-md-6 medicine_des">



                    <div class="row ml-5">
                        <h4 id="h4" class="medicineName mt-2">{{$mname}}</h4>
                        <h4 id="h4" class="categoryName d-none">{{$cname}}</h4>
                        <span id="h4" class="box_count d-none"></span>
                        <p class="text-danger" href="">Get <span class="discount1"></span> % OFF</p>

                        <div class="d-flex mb-2">
                            <div class="pis1">
                                <label class="text-primary" for="">Select Medicine Pis</label>
                            <select class="pis">
                                <option value="1">Select</option>

                            </select>
                            <span class="ms-2" style="font-weight: bolder; color: red">Pis</span>
                            </div>
                            <div class="box1">
                                <label class="ms-2 text-primary" for="">Select Medicine Box</label>
                            <select class="box ms-2">
                            </select>
                            <span class="ms-2" style="font-weight: bolder; color: red">Box</span>
                            </div>

                        </div>

                        <h6 id="h6" class="medicine_price1"><b>TK</b> <del class="medicine_price"></del></h6></b>


                        <b><h6 id="h6" class="medicine_special_price"></h6></b>

                        <h6 class="text-danger">**Do not buy any medicine without doctor's advice</h6>

                        <button class="col-md-6 btn-danger bg-danger text-white">Conform order</button>
                        <button class="col-md-6 btn-danger bg-danger text-white">Add to Cart</button>
                    </div>




    </div>

</div>



            </div>




        </nav>
        <!-- Navbar -->

        <div class="delivery">
            <h5 class="mt-3"><i class="fas fa-bicycle fa-2x text-danger"></i> সারা বাংলাদেশ থেকে অর্ডার করা যাবে।</h5>
            <h6><i class="fas fa-notes-medical"></i><span  class="pharmacy_name" style="color: #000000"></span></h6>
        </div>

          <div style="color: #000000" class="description1">
              <h5 class="mt-3">Drescription</h5>
              <div class="description">

              </div>



          </div>


    </header>
@endsection


@section('script')
    <script type="text/javascript">




        $('.pis').on('change', function() {

            $('.box option').prop("selected", true);

            let medicine_price =  $('.discount1').html();
            let medicine_discount = $('.medicine_price').html();

            let box_count = $('.box_count').html();

            let discount = 100 - medicine_discount;

            discount = discount * 0.01 ;

            discount = discount * medicine_price;
            let pis = $(".pis option:selected").val();

            let price = medicine_price - discount;

            let price1 = price / box_count;

            $('.medicine_special_price').html('Special Price '+pis * price1+' TK');

        });

        $('.box').on('change', function() {

            $('.pis option').prop("selected", false);

            let medicine_price =  $('.discount1').html();
            let medicine_discount = $('.medicine_price').html();

            let box_count = $('.box_count').html();

            let discount = 100 - medicine_discount;

            discount = discount * 0.01 ;

            discount = discount * medicine_price;
            let box = $(".box option:selected").val();

            let price = medicine_price - discount;



            $('.medicine_special_price').html('Special Price '+box * price+' TK');

        });

            $('.img1').click(function (){

                let img1 = $('.theImg1').attr('src');

                $('#theImg').attr('src',img1);

            });

            $('.img2').click(function (){

                let img2 = $('.theImg2').attr('src');

                $('#theImg').attr('src',img2);

            })
            $('.img3').click(function (){

                let img3 = $('.theImg3').attr('src');

                $('#theImg').attr('src',img3);

            })


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

                        console.log(jsonData.pharmacy_name);

                        //$("#medicine-img").attr("src",jsonData[1][0].medicine_img);
                        let img_one = jsonData.medicine_img;

                        let img1 = jsonData.img1;
                        let img2 = jsonData.img2;
                        let img3 = jsonData.img3;

                        //Maybe Delete port number when c panel
                        var source = window.location.protocol+"//"+window.location.hostname+':'+8000+'/'+img_one;


                        var source1 = window.location.protocol+"//"+window.location.hostname+':'+8000+'/'+img1;
                        var source2 = window.location.protocol+"//"+window.location.hostname+':'+8000+'/'+img2;
                        var source3 = window.location.protocol+"//"+window.location.hostname+':'+8000+'/'+img3;

                        //console.log(source)
                        $('#theDivimg').prepend($('<img>',{id:'theImg',class:'mn w-100',src: source}));

                        $('.img1').prepend($('<img>',{id:'theImg1',class:'w-100 img_one theImg1',src: source1}));
                        $('.img2').prepend($('<img>',{id:'theImg2',class:'w-100 img_one theImg2',src: source2}));
                        $('.img3').prepend($('<img>',{id:'theImg3',class:'w-100 img_one theImg3',src: source3}));




                        $('.discount1').html(+jsonData.medicine_discount);
                        $('.medicine_price').html(+jsonData.medicine_price);

                        let medicine_price = jsonData.medicine_price;
                        let medicine_discount = jsonData.medicine_discount;

                        let discount = 100 - medicine_discount;

                         discount = discount * 0.01 ;

                         discount = discount * medicine_price;

                         let price = medicine_price - discount;

                         let medicine_pis = parseInt(jsonData.medicine_pis);
                         let medicine_box = parseInt(jsonData.medicine_box);

                        // alert(medicine_pis);

                        if(medicine_pis >= 1){
                            for (i = 10; i <= medicine_pis; i = i + 5){


                                $('.pis').append(

                                    "<option value="+i+">"+i+ "</option>"

                                )
                            }



                        }else {
                            $(".pis1").addClass("d-none");
                        }

                        if(medicine_box >= 1){
                            for (i = 1; i <= medicine_box; i = i + 1){


                                $('.box').append(

                                    "<option value="+i+">"+i+ "</option>"

                                )
                            }

                            $('.box').append(

                                "<option value='Select'>Select</option>"

                            )

                        } else {
                            $(".box1").addClass("d-none");
                        }






                        $('.medicine_special_price').html('Special Price '+price+' TK');

                        $('.pharmacy_name').html(jsonData.pharmacy_name);
                        $('.description').html(jsonData.medicine_des);
                        $('.box_count').html(jsonData.box_count);
                    }else{


                    }




                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })



    </script>
@endsection


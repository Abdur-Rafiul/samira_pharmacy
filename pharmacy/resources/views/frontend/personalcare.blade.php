<h3 class="text-center mt-5">Personal Care</h3>
<h6 class="text-center text-danger">Someone Exclusive Medicine</h6>
<div class="owl-slider2 owl-carousel owl-theme mt-3" >

    @foreach ($common_medicine as $common_medicine)
        <div class="item">

            <div class="card  border border-info shadow-0 ">


                <div class="bg-image  card-img" >

                    <img src="{{ asset($common_medicine['medicine_img']) }}" class="img-fluid " />

                    <a class="medicine_card" href="/getmedicineDetails/{{ $common_medicine['medicine_name']}}/{{$common_medicine['category_name'] }}">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                    </a>
                </div>

                <div class="card-body" style="height: 120px">
                    <h5 class="card-title">{{ $common_medicine['medicine_name'] }}</h5>
                    <p>

                        <a class="discount btn-danger" href="">{{ $common_medicine['medicine_discount'] }}% off</a>
                        <span><b>TK</b> <del>{{ $common_medicine['medicine_price'] }}</del></span><br>
                        <span><b>TK {{ $common_medicine['medicine_special_price'] }}</b> </span><br>


                    </p>

                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-dark medicine1_card" type="button"><a  style="color: white;" href="#!" class="text-center">Add To Cart</a></button>

                </div>
            </div>

        </div>
    @endforeach



</div>

@section('script')
    <script>


    </script>
@endsection

@extends('frontend.common.app')
@section('content')


<div class="container">

<h3 class="text-center mt-5">All Medicine List</h3>
<h6 class="text-center text-danger">Someone Exclusive Medicine</h6>
<div class="row">

    @foreach ($medicine as $medicine)
        <div class="col-lg-3 col-md-3 col-sm-6">

            <div class="card  border border-info shadow-0 ">


                <div class="bg-image  card-img" >

                    <img src="{{ asset($medicine['medicine_img']) }}" class="img-fluid " />

                    <a class="medicine_card" href="/getmedicineDetails/{{ $medicine['medicine_name']}}/{{$medicine['category_name'] }}">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                    </a>
                </div>

                <div class="card-body" style="height: 120px">
                    <h5 class="card-title">{{ $medicine['medicine_name'] }}</h5>
                    <p>

                        <a class="discount btn-danger" href="">{{ $medicine['medicine_discount'] }}% off</a>
                        <span><b>TK</b> <del>{{ $medicine['medicine_price'] }}</del></span><br>
                        <span><b>TK {{ $medicine['medicine_special_price'] }}</b> </span><br>


                    </p>

                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-dark medicine1_card" type="button"><a  style="color: white;" href="#!" class="text-center">Add To Cart</a></button>

                </div>
            </div>

        </div>

    @endforeach



</div>
</div>

@endsection
@section('script')
    <script>


    </script>
@endsection

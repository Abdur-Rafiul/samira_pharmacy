@extends('frontend.common.app')

@section('content')

    <div class="row">


        <div class="col-md-12 col-lg-12 mt-5">
            <div class="card mt-5">
                <img src="https://patientengagementhit.com/images/site/article_headers/_normal/2017-01-11-prescriptions.gif" class="card-img-top w-25" alt="Fissure in Sandstone"/>
                <div class="card-body">
                    <h5 class="card-title">Username : {{ Auth::user()->name }}</h5>
                    <h5 class="card-title">Email : {{ Auth::user()->email }}</h5>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-3">
                       <span class="text-center"> Add To Cart List</span>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-3">
                        <span class="text-center">Add To Order List</span>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection

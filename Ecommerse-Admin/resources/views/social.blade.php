@extends('Layout.app')
@section('content')
    @include('Component.LoadingDiv')
    @include('Component.WentWrongDiv')
    @include('Component.linkChangeModal')
    <div id="MainDiv" class="container d-none">
        <div class="row ">
            <div class="col-md-3 text-center p-2 col-sm-6 col-6 col-lg-3">
                <div class="card">
                    <img  class="w-100" src="{{asset('images/facebook.png')}}">
                    <div class="card-body">
                        <h6>Facebook Link</h6>
                        <div id="FacebookLinkDiv">

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 text-center p-2 col-sm-6 col-6 col-lg-3">
                <div class="card">
                    <img  class="w-100" src="{{asset('images/twitter.png')}}">
                    <div class="card-body">
                        <h6>Twitter Link</h6>
                        <div id="TwitterLinkDiv">

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-3 text-center p-2 col-sm-6 col-6 col-lg-3">
                <div class="card">
                    <img  class="w-100" src="{{asset('images/instagram.png')}}">
                    <div class="card-body">
                        <h6>Instagram Link</h6>
                        <div id="InstagramLinkDiv">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


@section('script')

    <script>
        GetSiteInfo();
        function GetSiteInfo(){
            let URL="/GetSiteInfoDetails"
            axios.get(URL).then(function (response){
                if(response.status==200) {
                    $('#LoadingDiv').addClass('d-none');
                    $('#MainDiv').removeClass('d-none')

                    let facebook_link=(response.data)[0]['facebook_link'];
                    let twitter_link=(response.data)[0]['twitter_link'];
                    let instagram_link=(response.data)[0]['instagram_link'];


                    let FacebookChangeBtn= "<button data-link='"+facebook_link+"' id='FacebookLink'  class='btn btn-dark'><i class='fa fa-edit'></i>Change</button>";
                    let TwitterChangeBtn= "<button data-link='"+twitter_link+"' id='TwitterLink'  class='btn btn-dark'><i class='fa fa-edit'></i>Change</button>";
                    let InstagramChangeBtn= "<button data-link='"+instagram_link+"' id='InstagramLink'  class='btn btn-dark'><i class='fa fa-edit'></i>Change</button>";



                    $('#FacebookLinkDiv').empty();
                    $('#TwitterLinkDiv').empty();
                    $('#InstagramLinkDiv').empty();

                    $('#FacebookLinkDiv').append(FacebookChangeBtn);
                    $('#TwitterLinkDiv').append(TwitterChangeBtn);
                    $('#InstagramLinkDiv').append(InstagramChangeBtn);


                    $('#FacebookLink').on('click',function (event) {
                        let OldLink=$(this).data('link');
                        $('#LinkID').val(OldLink);
                        $('#LinkColumnID').val("facebook_link");
                        $('#LinkChangeModal').modal("show");
                        event.preventDefault();
                    })

                    $('#TwitterLink').on('click',function (event) {
                        let OldLink=$(this).data('link');
                        $('#LinkID').val(OldLink);
                        $('#LinkColumnID').val("twitter_link");
                        $('#LinkChangeModal').modal("show");
                        event.preventDefault();
                    })

                    $('#InstagramLink').on('click',function (event) {
                        let OldLink=$(this).data('link');
                        $('#LinkID').val(OldLink);
                        $('#LinkColumnID').val("instagram_link");
                        $('#LinkChangeModal').modal("show");
                        event.preventDefault();
                    })


                }
                else{
                    $('#LoadingDiv').addClass('d-none')
                    $('#WentWrongDiv').removeClass('d-none')
                }
            }).catch(function (error) {
                $('#LoadingDiv').addClass('d-none')
                $('#WentWrongDiv').removeClass('d-none')
            });
        }




    </script>

@endsection








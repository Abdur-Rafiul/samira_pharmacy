@extends('Layout.app')
@section('content')
    @include('Component.LoadingDiv')
    @include('Component.WentWrongDiv')
    @include('Component.linkChangeModal')
    <div id="MainDiv" class="container d-none">
        <div class="row ">
            <div class="col-md-3 text-center p-2 col-sm-6 col-6 col-lg-3">
                <div class="card">
                    <img  class="w-100" src="{{asset('images/playstore.png')}}">
                    <div class="card-body">
                        <h6>Android App Link</h6>
                        <div id="AndroidLinkDiv">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center p-2 col-sm-6 col-6 col-lg-3">
                <div class="card">
                    <img  class="w-100" src="{{asset('images/iosstore.png')}}">
                    <div class="card-body">
                        <h6>IOS App Link</h6>
                        <div id="IOSLinkDiv">

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

                    let android_app_link=(response.data)[0]['android_app_link'];
                    let ios_app_link=(response.data)[0]['ios_app_link'];

                    let AndroidChangeBtn= "<button data-link='"+android_app_link+"' id='AndroidLink'  class='btn btn-dark'><i class='fa fa-edit'></i>Change</button>";
                    let IOSChangeBtn= "<button data-link='"+ios_app_link+"' id='IOSLink'  class='btn btn-dark'><i class='fa fa-edit'></i>Change</button>";

                    $('#AndroidLinkDiv').empty();
                    $('#IOSLinkDiv').empty();
                    $('#AndroidLinkDiv').append(AndroidChangeBtn);
                    $('#IOSLinkDiv').append(IOSChangeBtn);

                    $('#AndroidLink').click(function (event) {
                        let OldLink=$('#AndroidLink').data('link');
                        $('#LinkID').val(OldLink);
                        $('#LinkColumnID').val("android_app_link");
                        $('#LinkChangeModal').modal("show");
                        event.preventDefault();
                    })

                    $('#IOSLink').click(function (event) {
                        let OldLink=$('#IOSLink').data('link');
                        $('#LinkID').val(OldLink);
                        $('#LinkColumnID').val("ios_app_link");
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





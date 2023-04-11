@extends('Layout.app')
@section('content')
    @include('Component.LoadingDiv')
    @include('Component.WentWrongDiv')



    <div id="MainDiv" class="container d-none">
        <div class="row">
            <div class="col-md-12 data-table-card col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div  class="container bg-white ">
                            <div class="row pb-3">
                                <div class="col-md-6  col-lg-6 col-sm-12 col-12">
                                    <div class="card-body">
                                        <h6 class="text-black">Site Title:</h6>
                                        <p id="SiteTitle"></p>
                                        <h6 class="text-black">Site Description:</h6>
                                        <p id="SiteDes"></p>
                                        <h6 class="text-black">Keywords:</h6>
                                        <p id="SiteKey"></p>
                                        <h6 class="text-black">Open Graph Title:</h6>
                                        <p id="OgTitle"></p>
                                        <h6 class="text-black">Open Graph Description:</h6>
                                        <p id="OgDes"></p>
                                        <h6 class="text-black">Open Graph Site Name:</h6>
                                        <p id="OgSiteName"></p>
                                    </div>
                                </div>
                                <div class="col-md-6  col-lg-6 col-sm-12 col-12">
                                    <div class="card-body">
                                        <h6 class="text-black">Open Graph URL:</h6>
                                        <p id="OgUrl"></p>
                                        <h6 class="text-black">Open Graph Preview Image (1200 X 627):</h6>
                                        <img data-id="" id="OgImg" class="w-100" src=''>


                                        <button data-toggle="modal" data-target="#seoUpdateModal" class="btn mt-3 mx-1 float-right btn-dark">Change Data</button>
                                        <button data-toggle="modal" data-target="#seoImageUpdateModal" class="btn mt-3 float-right btn-dark">Change Image</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="seoUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Update Seo Properties</h6>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <input id="SeoContentID" type="text" class=" d-none form-control">
                                <label class="form-label">Site Title:*</label>
                                <input id="SiteTitleInput" type="text" class="form-control">
                                <label class="form-label">Keywords:*</label>
                                <input id="SiteKeyInput" type="text" class="form-control">
                                <label class="form-label">Open Graph Title:*</label>
                                <input  id="OgTitleInput" type="text" class="form-control">
                                <label class="form-label">Open Graph Site Name:*</label>
                                <input id="OgSiteNameInput" type="text" class="form-control">
                                <label class="form-label">Open Graph URL:*</label>
                                <input id="OgUrlInput" type="text" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Site Description:*</label>
                                <textarea id="SiteDesInput" rows="4" class="form-control"></textarea>
                                <label class="form-label">Open Graph  Description:*</label>
                                <textarea id="OgDesInput" rows="4"  class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button id="SaveChangeData" type="button" class="btn btn-dark">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="seoImageUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Open Graph Preview Image</h6>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body   m-0 p-0">
                    <img id="SeoImgInputPreview" class="w-100"  src="{{asset('/assets/images/admin/default-thumbnail.jpg')}}" alt=""/>
                    <input id="SeoImgInput" class="form-control" type="file">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button id="SaveImage" type="button" class="btn btn-dark">Save changes</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>

        GetSEODetails();
        function GetSEODetails(){
            let URL="/GetSEODetails";
            axios.get(URL).then(function (response) {
                if (response.status == 200) {
                    $('#MainDiv').removeClass('d-none');
                    $('#LoadingDiv').addClass('d-none');
                    var jsonData = response.data;
                    $('#SiteTitle').html(jsonData[0]['title'])
                    $('#SiteDes').html(jsonData[0]['des'])
                    $('#SiteKey').html(jsonData[0]['keywords'])
                    $('#OgTitle').html(jsonData[0]['og_title'])
                    $('#OgDes').html(jsonData[0]['og_des'])
                    $('#OgSiteName').html(jsonData[0]['og_sitename'])
                    $('#OgUrl').html(jsonData[0]['og_url'])

                    $('#OgImg').attr('src',jsonData[0]['og_img'])
                    $('#OgImg').attr('data-id',jsonData[0]['id'])

                    $('#SiteTitleInput').val(jsonData[0]['title'])
                    $('#SiteDesInput').val(jsonData[0]['des'])
                    $('#SiteKeyInput').val(jsonData[0]['keywords'])
                    $('#OgTitleInput').val(jsonData[0]['og_title'])
                    $('#OgDesInput').val(jsonData[0]['og_des'])
                    $('#OgSiteNameInput').val(jsonData[0]['og_sitename'])
                    $('#OgUrlInput').val(jsonData[0]['og_url'])
                    $('#SeoContentID').val(jsonData[0]['id'])

                }
                else {
                    $('#LoadingDiv').addClass('d-none');
                    $('#WentWrongDiv').removeClass('d-none');
                }
            }).catch(function (error){
                $('#LoadingDiv').addClass('d-none');
                $('#WentWrongDiv').removeClass('d-none');
            })
        }

        $("#SeoImgInput").change(function() {
            let img=$('#SeoImgInputPreview');
            ImagePreview(this,img);
        });
        $('#SaveImage').on('click',function () {
            let ImageFiles=$("#SeoImgInput").prop('files');
            let ImageValid= SEOImageValidation(ImageFiles);
            if(ImageValid){
                $('#SaveImage').html(BtnSpinner).prop("disabled", true);
               let URL="/ChangeSEOIMG";
               let OldURL=$('#OgImg').prop('src')
               let id=$('#OgImg').data('id')
               let MyFormData=new FormData;
               MyFormData.append('photo',ImageFiles[0])
               MyFormData.append('OldPhotoURL',OldURL);
               MyFormData.append('id',id);
               axios.post(URL,MyFormData).then(function (response) {
                   $('#SaveImage').html("Save changes").prop("disabled", false);
                   if(response.status=200 && response.data=="1"){
                       SuccessToast("Request Success");
                       GetSEODetails();
                       $('#seoImageUpdateModal').modal('hide')
                   }
                   else{
                       ErrorToast("Request Fail ! Try Again")
                   }
               }).catch(function () {
                   $('#SaveImage').html("Save changes").prop("disabled", false);
                   ErrorToast("Request Fail ! Try Again")
               })
           }
        })


        $('#SaveChangeData').on('click',function () {
            let SiteTitleInput= $('#SiteTitleInput').val().trim()
            let SiteDesInput=  $('#SiteDesInput').val().trim()
            let SiteKeyInput=  $('#SiteKeyInput').val().trim()
            let OgTitleInput=  $('#OgTitleInput').val().trim()
            let OgDesInput=  $('#OgDesInput').val().trim()
            let OgSiteNameInput=  $('#OgSiteNameInput').val().trim()
            let OgUrlInput=  $('#OgUrlInput').val().trim()
            let SeoContentID=  $('#SeoContentID').val().trim()

            if(SiteTitleInput.length==0){
                ErrorToast("Site Title Required")
            }
            else if(SiteDesInput.length==0){
                ErrorToast("Site Description Required")
            }
            else if(SiteKeyInput.length==0){
                ErrorToast("Keywords Required")
            }
            else if(OgTitleInput.length==0){
                ErrorToast("Open Graph Title Required")
            }
            else if(OgDesInput.length==0){
                ErrorToast("Open Graph Description Required")
            }
            else if(OgSiteNameInput.length==0){
                ErrorToast("Open Graph Site Name Required")
            }
            else if(OgUrlInput.length==0){
                ErrorToast("Open Graph URL Required")
            }
            else{
                $('#SaveChangeData').html(BtnSpinner).prop("disabled", true)
                let URL="/UpdateSEODetails"
                let MyFormData=new FormData();
                MyFormData.append('SiteTitle',SiteTitleInput)
                MyFormData.append('SiteDes',SiteDesInput)
                MyFormData.append('SiteKey',SiteKeyInput)
                MyFormData.append('OgTitle',OgTitleInput)
                MyFormData.append('OgDes',OgDesInput)
                MyFormData.append('OgSiteName',OgSiteNameInput)
                MyFormData.append('OgUrl',OgUrlInput)
                MyFormData.append('id',SeoContentID)
                axios.post(URL,MyFormData).then(function (response) {
                    $('#SaveChangeData').html("Save Change").prop("disabled", false)
                    if(response.status==200 && response.data==1){
                        SuccessToast("Request Success");
                        $('#seoUpdateModal').modal('hide');
                        GetSEODetails();
                    }
                    else {
                        ErrorToast("Request Fail ! Try Again")
                        $('#seoUpdateModal').modal('hide');
                    }
                }).catch(function (error) {
                    $('#SaveChangeData').html("Save Change").prop("disabled", false)
                    ErrorToast("Request Fail ! Try Again")
                    $('#seoUpdateModal').modal('hide');
                })
            }
        })




        var SeoImgModal = document.getElementById("seoImageUpdateModal");
        SeoImgModal.addEventListener('hidden.bs.modal', function (e) {
            $('#SeoImgInput').val("")
        })



    </script>
@endsection

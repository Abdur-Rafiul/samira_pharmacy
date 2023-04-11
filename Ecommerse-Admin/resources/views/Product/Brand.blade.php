@extends('Layout.app')
@section('content')
    @include('Component.LoadingDiv')
    @include('Component.WentWrongDiv')



    <div id="MainDiv" class="container d-none">
        @include('Component.addNewBtn')
        <div class="row">
            <div class="col-md-12 data-table-card col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table id="SiteDataTable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Brand Image</th>
                                <th>Brand Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="SiteDataTableBody">
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="AddNewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel">Add New Brand</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Brand Name</label>
                                <input id="brand_name" class="form-control" type="text">
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Brand Image</label>
                                <input id="image" class="form-control" type="file">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="ModalCloseBtn" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button id="AddBrandBtn" type="button" class="btn btn-dark">Add</button>
                </div>
            </div>
        </div>
    </div>
    @include('Component.DeleteModal')
    @include('Component.ChangeImageModal')


@endsection

@section('script')
    <script>
        var  ActionSpinnerBtn="<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing..";

        DataList()
        function DataList(){
            let URL="/BrandListData";
            axios.get(URL).then(function (response) {
                if(response.status==200){
                    $('#LoadingDiv').addClass('d-none');
                    $('#MainDiv').removeClass('d-none')
                    $('#SiteDataTable').DataTable().destroy();
                    $('#SiteDataTableBody').empty();
                    $.each(response.data,function (i,item){
                        let tableRow="<tr>" +
                            "<td>"+i+"</td>" +
                            "<td><img style='height: 50px;width: 50px;' src='"+item['brand_image']+"'></td>" +
                            "<td>"+item['brand_name']+"</td>" +
                            "<td>" +
                            "<div class='dropdown'>" +
                            "<button class='btn btn-sm btn-dark  dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Dropdown button</button>" +
                            "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>" +
                            "<a class='dropdown-item deleteItem' data-id="+item['id']+" data-img="+item['brand_image']+" href='#'>Delete</a>"+
                            "<a class='dropdown-item changeImage' data-id="+item['id']+" data-img="+item['brand_image']+" href='#'>Change Image</a>"+
                            "</div>" +
                            "</div>" +
                            "</td>" +
                            "</tr>";
                        $('#SiteDataTableBody').append(tableRow);
                    });


                    $('.deleteItem').on('click',function () {
                        let id=$(this).data('id');
                        let img=$(this).data('img');
                        $('#DeleteID').html(id);
                        $('#imageURL').html(img);
                        $('#DeleteModal').modal('show');
                    })
                    $('.changeImage').on('click',function () {
                        let id=$(this).data('id');
                        let image=$(this).data('img');
                        $('#ImageID').html(id);
                        $('#imageChangeURL').attr('src',image);
                        $('#ChangeImageModal').modal('show');
                    })

                    $('#SiteDataTable').DataTable({
                        "order":false,
                        "lengthMenu": [5, 10, 20, 50]
                    });
                    $('.dataTables_length').addClass('bs-select');

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



        $('#AddBrandBtn').on('click',function (){
            let brand_name= $('#brand_name').val();
            let image=$('#image').prop('files');
            if(brand_name.length===0){
                ErrorToast("Brand Name Required");
            }
            else if(image.length===0){
                ErrorToast("Brand Image/Logo Required!");
            }
            else{
                $('#AddBrandBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('brand_name',brand_name);
                UploadFormData.append('image',image[0]);
                let URL="/BrandAdd";
                let AxiosHeaderConfig = {
                    headers: { 'Content-Type': 'multipart/form-data' },
                    onUploadProgress:function (progressEvent) {
                        let UpPer= ((progressEvent.loaded*100)/progressEvent.total).toFixed(2) +" %";
                        ConfirmBtn.html(UpPer +"Please Wait..");
                    }
                };
                axios.post(URL,UploadFormData,AxiosHeaderConfig).then(function (response){

                    ConfirmBtn.html("CONFIRM & SAVE");
                    ConfirmBtn.prop("disabled", false);

                    if(response.status==200){
                        SuccessToast("Request Success");
                        $('#brand_name').val("");
                        $('#image').val("");
                        $('#AddNewModal').modal('hide');
                        DataList();

                    }
                    else{
                        ErrorToast("Failed ! Please Try Again");
                    }

                }).catch(function (error){
                    ErrorToast("Something went wrong !");
                });
            }
        })

        $('#DeleteConfirm').click(function (event) {
            let id= $('#DeleteID').html();
            let imageURL= $('#imageURL').html();

            let DeleteBtn=$('#DeleteConfirm');
            BrandDelete(id,imageURL,DeleteBtn);
        });

        function BrandDelete(deleteID,imageURL,DeleteBtn){

            DeleteBtn.html(ActionSpinnerBtn);

            let URL="/BrandDelete";
            let AxiosConfig = { headers: { 'Content-Type': 'application/json' } };
            let blankData=" ";
            axios.post(URL,{id:deleteID,imageURL:imageURL},AxiosConfig).then(function (response) {

                DeleteBtn.html("Yes");

                if (response.data===1) {
                    $('#DeleteConfirm').attr('data-id',blankData);
                    $('#DeleteModal').modal('hide');
                    toastr.success("Deleted !");
                    DataList();
                }
                else {
                    $('#DeleteModal').modal('hide');
                    toastr.error("Failed ! Please Try Again");
                }

            }).catch(function (error) {
                DeleteBtn.html("Yes");
                $('#DeleteModal').modal('hide');
                toastr.error("Something Went Wrong");
            });
        }

        $('#ChangeImageBtn').on('click',function (){
            let ImageID=$('#ImageID').html();
            let oldImage= $('#imageChangeURL').attr('src');
            let newImage=$('#newImage').prop('files');

            if(newImage.length===0){
                ErrorToast("New Image Required");
            }
            else{
                $('#ChangeImageBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('ImageID',ImageID);
                UploadFormData.append('oldImage',oldImage);
                UploadFormData.append('newImage',newImage[0]);
                let URL="/ChangeBrandImage";
                let AxiosHeaderConfig = {
                    headers: { 'Content-Type': 'multipart/form-data' },
                    onUploadProgress:function (progressEvent) {
                        let UpPer= ((progressEvent.loaded*100)/progressEvent.total).toFixed(2) +" %";
                        ConfirmBtn.html(UpPer +"Please Wait..");
                    }
                };
                axios.post(URL,UploadFormData,AxiosHeaderConfig).then(function (response){

                    ConfirmBtn.html("CONFIRM & SAVE");
                    ConfirmBtn.prop("disabled", false);

                    if(response.status==200){
                        SuccessToast("Request Success");

                        $('#newImage').val("");
                        $('#ChangeImageModal').modal('hide');
                        DataList();

                    }
                    else{
                        $('#ChangeImageModal').modal('hide');
                        ErrorToast("Failed ! Please Try Again");
                    }

                }).catch(function (error){
                    $('#ChangeImageModal').modal('hide');
                    ErrorToast("Something went wrong !");
                });
            }
        })




    </script>
@endsection

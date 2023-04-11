@extends('Layout.app')
@section('content')
    @include('Component.LoadingDiv')
    @include('Component.WentWrongDiv')



    <div id="MainDiv" class="container-fluid d-none">
        @include('Component.addNewBtn')
        <div class="row">
            <div class="col-md-12 data-table-card col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table id="SiteDataTable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Shop Logo</th>
                                <th>Shop Code</th>
                                <th>Shop Name</th>
                                <th>Shop Address</th>
                                <th>Shop Owner</th>
                                <th>Shop Category</th>
                                <th>Shop Username</th>
                                <th>Shop Mobile</th>
                                <th>Shop Email</th>
                                <th>Shop Password</th>
                                <th>Shop Status</th>
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
        <div class="modal-dialog modal-lg">
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
                            <div class="col-md-6 col-sm-12 col-12">
                                <label>Shop Code</label>
                                <input id="shop_code" class="form-control" type="text">
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <label>Shop Name</label>
                                <input id="shop_name" class="form-control" type="text">
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <label>Shop Address</label>
                                <input id="shop_address" class="form-control" type="text">
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <label>Shop Owner</label>
                                <input id="shop_owner" class="form-control" type="text">
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <label>Shop Category</label>
                                <select id="shop_category" class="form-control">

                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <label>Shop User_Name</label>
                                <input id="shop_username" class="form-control" type="text">
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <label>Shop Mobile</label>
                                <input id="shop_mobile" class="form-control" type="text">
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <label>Shop Email</label>
                                <input id="shop_email" class="form-control" type="text">
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <label>Shop Password</label>
                                <input id="shop_password" class="form-control" type="text">
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <label>Shop Status</label>
                                <input id="shop_status" class="form-control" type="text">
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <label>Shop Logo</label>
                                <input id="shop_logo" class="form-control" type="file">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="ModalCloseBtn" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button id="AddShopBtn" type="button" class="btn btn-dark">Add</button>
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

        DataList();
        GetCategory();
        function DataList(){
            let URL="/ShopData";
            axios.get(URL).then(function (response) {
                if(response.status==200){
                    $('#LoadingDiv').addClass('d-none');
                    $('#MainDiv').removeClass('d-none');
                    $('#SiteDataTable').DataTable().destroy();
                    $('#SiteDataTableBody').empty();
                    $.each(response.data,function (i,item){
                        let tableRow="<tr>" +
                            "<td>"+i+"</td>" +
                            "<td><img style='height: 50px;width: 50px;' src='"+item['shop_logo']+"'></td>" +
                            "<td>"+item['shop_code']+"</td>" +
                            "<td>"+item['shop_name']+"</td>" +
                            "<td>"+item['shop_address']+"</td>" +
                            "<td>"+item['shop_owner']+"</td>" +
                            "<td>"+item['shop_category']+"</td>" +
                            "<td>"+item['shop_username']+"</td>" +
                            "<td>"+item['shop_mobile']+"</td>" +
                            "<td>"+item['shop_email']+"</td>" +
                            "<td>"+item['shop_password']+"</td>" +
                            "<td>"+item['shop_status']+"</td>" +
                            "<td>" +
                            "<div class='dropdown'>" +
                            "<button class='btn btn-sm btn-dark  dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Dropdown button</button>" +
                            "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>" +
                            "<a class='dropdown-item deleteItem' data-id="+item['id']+" data-img="+item['shop_logo']+" href='#'>Delete</a>"+
                            "<a class='dropdown-item changeImage' data-id="+item['id']+" data-img="+item['shop_logo']+" href='#'>Change Logo</a>"+
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

        function GetCategory(){
            $("#shop_category").empty();
            let URL="/CategoryListData";
            let AxiosConfig = { headers: { 'Content-Type': 'application/json' } };
            axios.get(URL,AxiosConfig).then(function (response){
                if(response.status===200){

                    let JSONData=response.data;
                    let sub_cat_status='';

                    $.each(JSONData,function(i,item){
                        $('<option>').html(
                            JSONData[i].cat1_name
                        ).appendTo('#shop_category');
                    });

                }
                else{
                    ErrorToast("No Categories Added yet!");

                }
            }).catch(function (error){
                ErrorToast("Something Went wrong");

            });
        }



        $('#AddShopBtn').on('click',function (){
            let shop_code= $('#shop_code').val();
            let shop_name= $('#shop_name').val();
            let shop_address= $('#shop_address').val();
            let shop_owner= $('#shop_owner').val();
            let shop_category= $('#shop_category').val();
            let shop_username= $('#shop_username').val();
            let shop_mobile= $('#shop_mobile').val();
            let shop_email= $('#shop_email').val();
            let shop_password= $('#shop_password').val();
            let shop_status= $('#shop_status').val();
            let shop_logo=$('#shop_logo').prop('files');
            if(shop_code.length===0){
                ErrorToast("Shop Code Required");
            }
            else if(shop_name.length===0){
                ErrorToast("Shop Name Required!");
            }
            else if(shop_name.length===0){
                ErrorToast("Shop Name Required!");
            }
            else if(shop_address.length===0){
                ErrorToast("Shop Adress Required!");
            }
            else if(shop_name.length===0){
                ErrorToast("Shop Name Required!");
            }
            else if(shop_category.length===0){
                ErrorToast("Shop Category Required!");
            }
            else if(shop_username.length===0){
                ErrorToast("Shop Username Required!");
            }
            else if(shop_mobile.length===0){
                ErrorToast("Shop Username Required!");
            }
            else if(shop_username.length===0){
                ErrorToast("Shop Mobile Required!");
            }
            else if(shop_email.length===0){
                ErrorToast("Shop Email Required!");
            }
            else if(shop_password.length===0){
                ErrorToast("Shop Username Required!");
            }
            else if(shop_status.length===0){
                ErrorToast("Shop Status Required!");
            }
            else if(shop_logo.length===0){
                ErrorToast("Shop logo Required!");
            }
            else{
                $('#AddShopBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('shop_code',shop_code);
                UploadFormData.append('shop_name',shop_name);
                UploadFormData.append('shop_address',shop_address);
                UploadFormData.append('shop_owner',shop_owner);
                UploadFormData.append('shop_category',shop_category);
                UploadFormData.append('shop_username',shop_username);
                UploadFormData.append('shop_mobile',shop_mobile);
                UploadFormData.append('shop_email',shop_email);
                UploadFormData.append('shop_password',shop_password);
                UploadFormData.append('shop_status',shop_status);
                UploadFormData.append('shop_logo',shop_logo[0]);
                let URL="/ShopAdd";
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
                        $('#shop_name').val("");
                        $('#shop_code').val("");
                        $('#shop_logo').val("");
                        $('#shop_address').val("");
                        $('#shop_owner').val("");
                        $('#shop_category').val("");
                        $('#shop_mobile').val("");
                        $('#shop_email').val("");
                        $('#shop_password').val("");
                        $('#shop_status').val("");
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
            ShopDelete(id,imageURL,DeleteBtn);
        });

        function ShopDelete(deleteID,imageURL,DeleteBtn){

            DeleteBtn.html(ActionSpinnerBtn);

            let URL="/ShopDelete";
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
                let URL="/ChangeShopLogo";
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

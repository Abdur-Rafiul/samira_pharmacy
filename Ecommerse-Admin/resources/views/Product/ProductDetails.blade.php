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
                                <th>Product Code</th>
                                <th>Short Desc </th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Product Details</th>
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
                    <p class="modal-title" id="exampleModalLabel">Add Product Details</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Product Code</label>
                                    <select style="width: 100%;" id="product_code"  class="js-example-basic-single form-control" name="state">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Short Desc</label>
                                    <div  id="quick_overview">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Product Details</label>
                                    <div  id="product_details">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Color (Use Comma for multiple color)</label>
                                    <input id="color" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Size (Use Comma for multiple size)</label>
                                    <input id="size" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Product Image-1</label>
                                    <input id="product_image_1" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Product Image-2</label>
                                    <input id="product_image_2" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Product Image-3</label>
                                    <input id="product_image_3" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Product Image-4</label>
                                    <input id="product_image_4" type="file" class="form-control">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button id="ModalCloseBtn" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button id="AddProductDetailsBtn" type="button" class="btn btn-dark">Add</button>
                </div>
            </div>
        </div>
    </div>

{{--    edit data modal--}}

    <div class="modal fade" id="DataEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel">Edit Product Details Data</p>
                    <span class="d-none" id="EditID"></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Product Code</label>
                                    <input readonly id="product_code_edit" class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Short Desc </label>
                                    <div  id="quick_overview_edit">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Product Details</label>
                                    <div  id="product_details_edit">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Color (Use Comma for multiple color)</label>
                                    <input id="color_edit" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Size (Use Comma for multiple size)</label>
                                    <input id="size_edit" type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button id="" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button id="EditProductDataBtn" type="button" class="btn btn-dark">Add</button>
                </div>
            </div>
        </div>
    </div>

{{--    Image Change Modal--}}

    <!-- Modal -->
    <div class="modal fade" id="ChangeImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel">Change Image</p>
                    <span class="d-none" id="imageChangeID"></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <div>
                                    <h4>Image-01</h4>
                                    <img id="imageChangeOne" class="w-100" src="">
                                </div>
                                <div class="form-group">
                                    <label>Change Image</label>
                                    <input id="imageChangeOneData" class="form-control" type="file">
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <button id="imageChangeOneBtn" class="btn btn-success">Change(Image-01)</button>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div>
                                    <h4>Image-02</h4>
                                    <img id="imageChangeTwo" class="w-100" src="">
                                </div>
                                <div class="form-group">
                                    <label>Change Image</label>
                                    <input id="imageChangeTwoData" class="form-control" type="file">
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <button id="imageChangeTwoBtn" class="btn btn-success">Change(Image-02)</button>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div>
                                    <h4>Image-03</h4>
                                    <img id="imageChangeThree" class="w-100" src="">
                                </div>
                                <div class="form-group">
                                    <label>Change Image</label>
                                    <input id="imageChangeThreeData" class="form-control" type="file">
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <button id="imageChangeThreeBtn" class="btn btn-success">Change(Image-03)</button>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div>
                                    <h4>Image-04</h4>
                                    <img id="imageChangeFour" class="w-100" src="">
                                </div>
                                <div class="form-group">
                                    <label>Change Image</label>
                                    <input id="imageChangeFourData" class="form-control" type="file">
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <button id="imageChangeFourBtn" class="btn btn-success">Change(Image-04)</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="" type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    @include('Component.DeleteModal')


@endsection

@section('script')
    <script>

        DataList();
        GetProductCode();


        var  ActionSpinnerBtn="<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing..";

        $(function () {
            $('#quick_overview').summernote(  {
                height: 300,
                focus: true
            })
        })

        $(function () {
            $('#product_details').summernote(  {
                height: 300,
                focus: true
            })
        })

        $(function () {
            $('#quick_overview_edit').summernote(  {
                height: 300,
                focus: true
            })
        })

        $(function () {
            $('#product_details_edit').summernote(  {
                height: 300,
                focus: true
            })
        })

        function DataList(){
            let URL="/ProductDetailsData";
            axios.get(URL).then(function (response) {
                if(response.status==200){
                    $('#LoadingDiv').addClass('d-none');
                    $('#MainDiv').removeClass('d-none')
                    $('#SiteDataTable').DataTable().destroy();
                    $('#SiteDataTableBody').empty();
                    $.each(response.data,function (i,item){
                        let tableRow="<tr>" +
                            "<td>"+(i+1)+"</td>" +
                            "<td>"+item['product_code']+"</td>" +
                            "<td>"+item['des']+"</td>" +
                            "<td>"+item['color']+"</td>" +
                            "<td>"+item['size']+"</td>" +
                            "<td>"+item['details']+"</td>" +
                            "<td>" +
                            "<div class='dropdown'>" +
                            "<button class='btn btn-sm btn-dark  dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Dropdown button</button>" +
                            "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>" +
                            "<a class='dropdown-item deleteItem' data-id="+item['id']+" data-imgOne="+item['img1']+" data-imgTwo="+item['img2']+" data-imgThree="+item['img3']+" data-imgFour="+item['img4']+" href='#'>Delete</a>"+
                            "<a class='dropdown-item editItem' data-eid="+item['id']+" href='#'>Edit Data</a>"+
                            "<a class='dropdown-item changeImage' data-id="+item['id']+" href='#'>Change Image</a>"+
                            "</div>" +
                            "</div>" +
                            "</td>" +
                            "</tr>";
                        $('#SiteDataTableBody').append(tableRow);
                    });



                    $('.deleteItem').on('click',function () {
                        let id=$(this).data('id');
                        let imgOne=$(this).data('imgOne');
                        let imgTwo=$(this).data('imgTwo');
                        let imgThree=$(this).data('imgThree');
                        let imgFour=$(this).data('imgFour');
                        $('#DeleteID').html(id);
                        $('#imageURL').html(imgOne);
                        $('#image2URL').html(imgTwo);
                        $('#image3URL').html(imgThree);
                        $('#image4URL').html(imgFour);
                        $('#DeleteModal').modal('show');
                    })
                    $('.editItem').on('click',function () {
                        let idEdit=$(this).data('eid');
                        $('#EditID').html(idEdit);
                        GetProductDetailsEditData(idEdit);
                        $('#DataEditModal').modal('show');
                    })
                    $('.changeImage').on('click',function () {
                        let id=$(this).data('id');
                        $('#imageChangeID').html(id);
                        GetProductImageEditData(id);
                    })

                    $('#SiteDataTable').DataTable({
                        "order":false,
                        "lengthMenu": [5, 10, 20, 50]
                    });
                    $('.dataTables_length').addClass('bs-select');

                }
                else{
                    $('#LoadingDiv').addClass('d-none')
                    // $('#WentWrongDiv').removeClass('d-none')
                }

            }).catch(function (error) {
                $('#LoadingDiv').addClass('d-none')
                // $('#WentWrongDiv').removeClass('d-none')
            });
        }

        function GetProductCode(){
            $("#product_code").empty();
            let ChooseOption="<option value=''>Select Product Code</option>";
            $("#product_code").append(ChooseOption);
            let URL="/GetProductCode";
            let AxiosConfig = { headers: { 'Content-Type': 'application/json' } };
            axios.get(URL,AxiosConfig).then(function (response){
                if(response.status===200){

                    let JSONData=response.data;
                    $.each(JSONData, function (key, value) {
                        let OneData="<option value='"+value['product_code']+"'>"+value['product_code']+'('+value['title']+')'+"</option>";                        $("#product_code").append(OneData);
                    });

                }
                else{
                    toastr.error("No data found in category");

                }
            }).catch(function (error){
                toastr.error("Something went wrong!");

            });
        }

        $('#AddProductDetailsBtn').on('click',function (){
            let product_code= $('#product_code').val();
            let color= $('#color').val();
            let size= $('#size').val();
            let quick_overview= $('#quick_overview').summernote('code');
            let product_details= $('#product_details').summernote('code');
            let product_image_1= $('#product_image_1').prop('files');
            let product_image_2= $('#product_image_2').prop('files');
            let product_image_3= $('#product_image_3').prop('files');
            let product_image_4= $('#product_image_4').prop('files');

            if(product_code.length===0){
                ErrorToast("product_code Required");
            }
            else if(quick_overview.length===0){
                ErrorToast("quick_overview Required!");
            }
            else if(color.length===0){
                ErrorToast("Color Required!");
            }
            else if(size.length===0){
                ErrorToast("Size Required!");
            }
            else if(product_details.length===0){
                ErrorToast("product_details Required!");
            }
            else if(product_image_1.length===0){
                ErrorToast("Al Least One Image Required!");
            }
            else if(product_image_1.length!=0 && product_image_2.length===0 && product_image_3.length===0 && product_image_4.length===0){
                $('#AddProductDetailsBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('product_code',product_code);
                UploadFormData.append('quick_overview',quick_overview);
                UploadFormData.append('product_details',product_details);
                UploadFormData.append('color',color);
                UploadFormData.append('size',size);
                UploadFormData.append('product_image_1',product_image_1[0]);

                let URL="/ProductDetailsWithOneImg";
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
                        $('#product_code').val("");
                        $('#quick_overview').summernote('');
                        $('#product_details').summernote('');
                        $('#product_image_1').val("");
                        $('#product_image_2').val("");
                        $('#product_image_3').val("");
                        $('#product_image_4').val("");
                        $('#AddNewModal').modal('hide');
                        DataList();


                    }
                    else{
                        $('#AddNewModal').modal('hide');
                        ErrorToast("Failed ! Please Try Again");
                    }

                }).catch(function (error){
                    $('#AddNewModal').modal('hide');
                    $('#AddProductDetailsBtn').html("Confirm").prop("disabled", false);
                    ErrorToast("Something went wrong !");
                });
            }
            else if(product_image_1.length!=0 && product_image_2.length!=0 && product_image_3.length===0 && product_image_4.length===0){
                $('#AddProductDetailsBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('product_code',product_code);
                UploadFormData.append('quick_overview',quick_overview);
                UploadFormData.append('product_details',product_details);
                UploadFormData.append('color',color);
                UploadFormData.append('size',size);
                UploadFormData.append('product_image_1',product_image_1[0]);
                UploadFormData.append('product_image_2',product_image_2[0]);

                let URL="/ProductDetailsWithTwoImg";
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
                        $('#product_code').val("");
                        $('#quick_overview').summernote('');
                        $('#product_details').summernote('');
                        $('#product_image_1').val("");
                        $('#product_image_2').val("");
                        $('#product_image_3').val("");
                        $('#product_image_4').val("");
                        $('#AddNewModal').modal('hide');
                        DataList();


                    }
                    else{
                        $('#AddNewModal').modal('hide');
                        ErrorToast("Failed ! Please Try Again");
                    }

                }).catch(function (error){
                    $('#AddNewModal').modal('hide');
                    $('#AddProductDetailsBtn').html("Confirm").prop("disabled", false);
                    ErrorToast("Something went wrong !");
                });
            }
            else if(product_image_1.length!=0 && product_image_2.length!=0 && product_image_3.length!=0 && product_image_4.length===0){
                $('#AddProductDetailsBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('product_code',product_code);
                UploadFormData.append('quick_overview',quick_overview);
                UploadFormData.append('product_details',product_details);
                UploadFormData.append('color',color);
                UploadFormData.append('size',size);
                UploadFormData.append('product_image_1',product_image_1[0]);
                UploadFormData.append('product_image_2',product_image_2[0]);
                UploadFormData.append('product_image_3',product_image_3[0]);

                let URL="/ProductDetailsWithThreeImg";
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
                        $('#product_code').val("");
                        $('#quick_overview').summernote('');
                        $('#product_details').summernote('');
                        $('#product_image_1').val("");
                        $('#product_image_2').val("");
                        $('#product_image_3').val("");
                        $('#product_image_4').val("");
                        $('#AddNewModal').modal('hide');
                        DataList();


                    }
                    else{
                        $('#AddNewModal').modal('hide');
                        ErrorToast("Failed ! Please Try Again");
                    }

                }).catch(function (error){
                    $('#AddNewModal').modal('hide');
                    $('#AddProductDetailsBtn').html("Confirm").prop("disabled", false);
                    ErrorToast("Something went wrong !");
                });
            }

            else{
                $('#AddProductDetailsBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('product_code',product_code);
                UploadFormData.append('quick_overview',quick_overview);
                UploadFormData.append('product_details',product_details);
                UploadFormData.append('color',color);
                UploadFormData.append('size',size);
                UploadFormData.append('product_image_1',product_image_1[0]);
                UploadFormData.append('product_image_2',product_image_2[0]);
                UploadFormData.append('product_image_3',product_image_3[0]);
                UploadFormData.append('product_image_4',product_image_4[0]);

                let URL="/ProductDetailsAdd";
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
                        $('#product_code').val("");
                        $('#quick_overview').summernote('');
                        $('#product_details').summernote('');
                        $('#product_image_1').val("");
                        $('#product_image_2').val("");
                        $('#product_image_3').val("");
                        $('#product_image_4').val("");
                        $('#AddNewModal').modal('hide');
                        DataList();


                    }
                    else{
                        $('#AddNewModal').modal('hide');
                        ErrorToast("Failed ! Please Try Again");
                    }

                }).catch(function (error){
                    $('#AddNewModal').modal('hide');
                    $('#AddProductDetailsBtn').html("Confirm").prop("disabled", false);
                    ErrorToast("Something went wrong !");
                });
            }
        })

        //delete
        $('#DeleteConfirm').click(function (event) {
            let id= $('#DeleteID').html();
            let imageURL= $('#imageURL').html();
            let image2URL= $('#image2URL').html();
            let image3URL= $('#image3URL').html();
            let image4URL= $('#image4URL').html();

            let DeleteBtn=$('#DeleteConfirm');
            ProductListDelete(id,imageURL,image2URL,image3URL,image4URL,DeleteBtn);
        });

        function ProductListDelete(deleteID,imageURL,image2URL,image3URL,image4URL,DeleteBtn){

            DeleteBtn.html(ActionSpinnerBtn);

            let URL="/ProductDetailsDelete";
            let AxiosConfig = { headers: { 'Content-Type': 'application/json' } };
            let blankData=" ";
            axios.post(URL,{id:deleteID,imageURL:imageURL,image2URL:image2URL,image3URL:image3URL,image4URL:image4URL},AxiosConfig).then(function (response) {

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

        //edit data code

        function GetProductDetailsEditData(idDetails){

            let URL="/ProductDetailsEditData";
            let AxiosConfig = { headers: { 'Content-Type': 'application/json' } };
            axios.post(URL,{id:idDetails},AxiosConfig).then(function (response) {

                if (response.status===200) {
                    $('#DataEditModal').modal('show');
                    let EditData=response.data;

                    $('#product_code_edit').val(EditData[0]['product_code']);
                    $('#quick_overview_edit').summernote("code", EditData[0]['des']);
                    $('#product_details_edit').summernote("code", EditData[0]['details']);
                    $('#color_edit').val(EditData[0]['color']);
                    $('#size_edit').val(EditData[0]['size']);
                }
                else {
                    $('#DataEditModal').modal('hide');
                    ErrorToast("Something went wrong !");
                }

            }).catch(function (error) {
                $('#DataEditModal').modal('hide');
                ErrorToast("Something went wrong !");
            });
        }

        $('#EditProductDataBtn').on('click',function (){
            let editID= $('#EditID').html();
            let quick_overview= $('#quick_overview_edit').summernote('code');
            let product_details= $('#product_details_edit').summernote('code');
            let color= $('#color_edit').val();
            let size= $('#size_edit').val();

            if(quick_overview.length===0){
                ErrorToast("Product Title Required");
            }
            else if(product_details.length===0){
                ErrorToast("Price Required!");
            }

            else{
                $('#EditProductDataBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('editID',editID);
                UploadFormData.append('quick_overview',quick_overview);
                UploadFormData.append('product_details',product_details);
                UploadFormData.append('color',color);
                UploadFormData.append('size',size);

                let URL="/ProductDetailsDataEdit";
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

                        $('#DataEditModal').modal('hide');
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

        //Image Chage code
        function GetProductImageEditData(id){

            let URL="/ProductImageEditData";
            let AxiosConfig = { headers: { 'Content-Type': 'application/json' } };
            axios.post(URL,{id:id},AxiosConfig).then(function (response) {

                if (response.status===200) {
                    $('#ChangeImageModal').modal('show');
                    let EditData=response.data;

                    $('#imageChangeOne').attr('src',EditData[0]['img1']);
                    $('#imageChangeTwo').attr('src',EditData[0]['img2']);
                    $('#imageChangeThree').attr('src',EditData[0]['img3']);
                    $('#imageChangeFour').attr('src',EditData[0]['img4']);

                }
                else {
                    $('#ChangeImageModal').modal('hide');
                    ErrorToast("Image Load Failed!");
                }

            }).catch(function (error) {
                $('#ChangeImageModal').modal('hide');
                ErrorToast("Something went wrong !");
            });
        }

        $('#imageChangeOneBtn').on('click',function (){
            let editID= $('#imageChangeID').html();
            let OldImageName=$('#imageChangeOne').attr('src');
            let NewImageName= $('#imageChangeOneData').prop('files');

            if(NewImageName.length===0){
                ErrorToast("Please Select New Image First !");
            }

            else{
                $('#imageChangeOneBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('editID',editID);
                UploadFormData.append('OldImageName',OldImageName);
                UploadFormData.append('NewImageName',NewImageName[0]);

                let URL="/ChangeProductImageOne";
                let AxiosHeaderConfig = {
                    headers: { 'Content-Type': 'multipart/form-data' },
                    onUploadProgress:function (progressEvent) {
                        let UpPer= ((progressEvent.loaded*100)/progressEvent.total).toFixed(2) +" %";
                        ConfirmBtn.html(UpPer +"Please Wait..");
                    }
                };
                axios.post(URL,UploadFormData,AxiosHeaderConfig).then(function (response){

                    ConfirmBtn.html("Change(Image-01)");
                    ConfirmBtn.prop("disabled", false);

                    if(response.status==200){
                        SuccessToast("Request Success");

                        $('#ChangeImageModal').modal('hide');
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

        $('#imageChangeTwoBtn').on('click',function (){
            let editID= $('#imageChangeID').html();
            let OldImageName=$('#imageChangeTwo').attr('src');
            let NewImageName= $('#imageChangeTwoData').prop('files');

            if(NewImageName.length===0){
                ErrorToast("Please Select New Image First !");
            }

            else{
                $('#imageChangeTwoBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('editID',editID);
                UploadFormData.append('OldImageName',OldImageName);
                UploadFormData.append('NewImageName',NewImageName[0]);

                let URL="/ChangeProductImageTwo";
                let AxiosHeaderConfig = {
                    headers: { 'Content-Type': 'multipart/form-data' },
                    onUploadProgress:function (progressEvent) {
                        let UpPer= ((progressEvent.loaded*100)/progressEvent.total).toFixed(2) +" %";
                        ConfirmBtn.html(UpPer +"Please Wait..");
                    }
                };
                axios.post(URL,UploadFormData,AxiosHeaderConfig).then(function (response){

                    ConfirmBtn.html("Change(Image-02)");
                    ConfirmBtn.prop("disabled", false);

                    if(response.status==200){
                        SuccessToast("Request Success");

                        $('#ChangeImageModal').modal('hide');
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

        $('#imageChangeThreeBtn').on('click',function (){
            let editID= $('#imageChangeID').html();
            let OldImageName=$('#imageChangeThree').attr('src');
            let NewImageName= $('#imageChangeThreeData').prop('files');

            if(NewImageName.length===0){
                ErrorToast("Please Select New Image First !");
            }

            else{
                $('#imageChangeThreeBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('editID',editID);
                UploadFormData.append('OldImageName',OldImageName);
                UploadFormData.append('NewImageName',NewImageName[0]);

                let URL="/ChangeProductImageThree";
                let AxiosHeaderConfig = {
                    headers: { 'Content-Type': 'multipart/form-data' },
                    onUploadProgress:function (progressEvent) {
                        let UpPer= ((progressEvent.loaded*100)/progressEvent.total).toFixed(2) +" %";
                        ConfirmBtn.html(UpPer +"Please Wait..");
                    }
                };
                axios.post(URL,UploadFormData,AxiosHeaderConfig).then(function (response){

                    ConfirmBtn.html("Change(Image-03)");
                    ConfirmBtn.prop("disabled", false);

                    if(response.status==200){
                        SuccessToast("Request Success");

                        $('#ChangeImageModal').modal('hide');
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

        $('#imageChangeFourBtn').on('click',function (){
            let editID= $('#imageChangeID').html();
            let OldImageName=$('#imageChangeFour').attr('src');
            let NewImageName= $('#imageChangeFourData').prop('files');

            if(NewImageName.length===0){
                ErrorToast("Please Select New Image First !");
            }

            else{
                $('#imageChangeFourBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('editID',editID);
                UploadFormData.append('OldImageName',OldImageName);
                UploadFormData.append('NewImageName',NewImageName[0]);

                let URL="/ChangeProductImageFour";
                let AxiosHeaderConfig = {
                    headers: { 'Content-Type': 'multipart/form-data' },
                    onUploadProgress:function (progressEvent) {
                        let UpPer= ((progressEvent.loaded*100)/progressEvent.total).toFixed(2) +" %";
                        ConfirmBtn.html(UpPer +"Please Wait..");
                    }
                };
                axios.post(URL,UploadFormData,AxiosHeaderConfig).then(function (response){

                    ConfirmBtn.html("Change(Image-04)");
                    ConfirmBtn.prop("disabled", false);

                    if(response.status==200){
                        SuccessToast("Request Success");

                        $('#ChangeImageModal').modal('hide');
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



    </script>
@endsection

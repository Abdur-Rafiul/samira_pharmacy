@extends('Layout.app')
@section('content')
    @include('Component.LoadingDiv')
    @include('Component.WentWrongDiv')



    <div id="MainDiv" class="container-fluid d-none">
        @include('Component.addNewBtn')
        <div class="row">
            <div class="col-md-12 data-table-card col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table id="SiteDataTable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Product Code</th>
                                <th>Text Color</th>
                                <th>BG Color</th>
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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel">Add New Slider</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Title</label>
                                <input id="title" class="form-control" type="text">
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Sub Title</label>
                                <input id="sub_title" class="form-control" type="text">
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Product Code</label>
                                <select id="product_code" class="form-control">
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Text Color</label>
                                <input id="text_color" class="form-control" type="color">
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Background Color</label>
                                <input id="bg_color" class="form-control" type="color">
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Slider Image</label>
                                <input id="image" class="form-control" type="file">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="ModalCloseBtn" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button id="AddSliderBtn" type="button" class="btn btn-dark">Add</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel">Slider Data Edit</p>
                    <span id="DataID"></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Title</label>
                                <input id="title_edit" class="form-control" type="text">
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Sub Title</label>
                                <input id="sub_title_edit" class="form-control" type="text">
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Product Code</label>
                                <input readonly id="product_code_edit" class="form-control" type="text">
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Text Color</label>
                                <input id="text_color_edit" class="form-control" type="color">
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Background Color</label>
                                <input id="bg_color_edit" class="form-control" type="color">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button id="DataEditBtn" type="button" class="btn btn-dark">Edit</button>
                </div>
            </div>
        </div>
    </div>

    @include('Component.DeleteModal')
    @include('Component.ChangeImageModal')


@endsection

@section('script')
    <script>

        DataList();
        GetProductCode();


        var  ActionSpinnerBtn="<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing..";

        function DataList(){
            let URL="/SliderListData";
            axios.get(URL).then(function (response) {
                if(response.status==200){
                    $('#LoadingDiv').addClass('d-none');
                    $('#MainDiv').removeClass('d-none');
                    $('#SiteDataTable').DataTable().destroy();
                    $('#SiteDataTableBody').empty();
                    $.each(response.data,function (i,item){
                        let tableRow="<tr>" +
                            "<td>"+i+"</td>" +
                            "<td><img style='height: 50px;width: 50px;' src='"+item['image']+"'></td>" +
                            "<td>"+item['title']+"</td>" +
                            "<td>"+item['sub_title']+"</td>" +
                            "<td>"+item['product_code']+"</td>" +
                            "<td>"+item['text_color']+"</td>" +
                            "<td>"+item['bg_color']+"</td>" +
                            "<td>" +
                            "<div class='dropdown'>" +
                            "<button class='btn btn-sm btn-dark  dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Dropdown button</button>" +
                            "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>" +
                            "<a class='dropdown-item deleteItem' data-id="+item['id']+" data-img="+item['image']+" href='#'>Delete</a>"+
                            "<a class='dropdown-item changeImage' data-id="+item['id']+" data-img="+item['image']+" href='#'>Change Image</a>"+
                            "<a class='dropdown-item changedata' data-id="+item['id']+" href='#'>Edit Data</a>"+
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
                    $('.changedata').on('click',function () {
                        let id=$(this).data('id');
                        $('#DataID').html(id);
                        GetSliderEditData(id);
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
                        let OneData="<option value='"+value['product_code']+'('+value['title']+')'+"'>"+value['product_code']+'('+value['title']+')'+"</option>";                        $("#product_code").append(OneData);
                    });

                }
                else{
                    toastr.error("No data found in category");

                }
            }).catch(function (error){
                toastr.error("Something went wrong!");

            });
        }


        $('#AddSliderBtn').on('click',function (){
            let title= $('#title').val();
            let sub_title= $('#sub_title').val();
            let product_code= $('#product_code').val();
            let text_color= $('#text_color').val();
            let bg_color= $('#bg_color').val();
            let image=$('#image').prop('files');
            if(title.length===0){
                ErrorToast("Title Required");
            }
            else if(sub_title.length===0){
                ErrorToast("Sub Title Required!");
            }
            else if(product_code.length===0){
                ErrorToast("Product Code Required!");
            }
            else if(text_color.length===0){
                ErrorToast("Text Color Required!");
            }
            else if(bg_color.length===0){
                ErrorToast("Background Color Required!");
            }
            else if(image.length===0){
                ErrorToast("Slider Image Required!");
            }
            else{
                $('#AddSliderBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('text_color',text_color);
                UploadFormData.append('bg_color',bg_color);
                UploadFormData.append('title',title);
                UploadFormData.append('sub_title',sub_title);
                UploadFormData.append('product_code',product_code);
                UploadFormData.append('image',image[0]);
                let URL="/SliderAdd";
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
                        $('#text_color').val("");
                        $('#bg_color').val("");
                        $('#image').val("");
                        $('#title').val("");
                        $('#sub_title').val("");
                        $('#product_code').val("");
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
            SliderDelete(id,imageURL,DeleteBtn);
        });

        function SliderDelete(deleteID,imageURL,DeleteBtn){

            DeleteBtn.html(ActionSpinnerBtn);

            let URL="/SliderDelete";
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
                let URL="/ChangeSliderImage";
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

        //edit code
        function GetSliderEditData(id){

            let URL="/SliderListEditData";
            let AxiosConfig = { headers: { 'Content-Type': 'application/json' } };
            axios.post(URL,{id:id},AxiosConfig).then(function (response) {

                if (response.status===200) {
                    $('#EditModal').modal('show');
                    let EditData=response.data;

                    $('#title_edit').val(EditData[0]['title']);
                    $('#sub_title_edit').val(EditData[0]['sub_title']);
                    $('#product_code_edit').val(EditData[0]['product_code']);
                    $('#text_color_edit').val(EditData[0]['text_color']);
                    $('#bg_color_edit').val(EditData[0]['bg_color']);
                }
                else {
                    $('#EditModal').modal('hide');
                    ErrorToast("Something went wrong !");
                }

            }).catch(function (error) {
                $('#EditModal').modal('hide');
                ErrorToast("Something went wrong !");
            });
        }

        $('#DataEditBtn').on('click',function (){
            let id= $('#DataID').html();
            let title_edit= $('#title_edit').val();
            let sub_title_edit= $('#sub_title_edit').val();
            let product_code_edit= $('#product_code_edit').val();
            let text_color_edit= $('#text_color_edit').val();
            let bg_color_edit= $('#bg_color_edit').val();
            if(title_edit.length===0){
                ErrorToast("Title Required");
            }
            else if(sub_title_edit.length===0){
                ErrorToast("Sub Title Required!");
            }
            else if(product_code_edit.length===0){
                ErrorToast("Product Code Required!");
            }
            else if(text_color_edit.length===0){
                ErrorToast("Text Color Required!");
            }
            else if(bg_color_edit.length===0){
                ErrorToast("Background Color Required!");
            }
            else{
                $('#DataEditBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('id',id);
                UploadFormData.append('title',title_edit);
                UploadFormData.append('sub_title',sub_title_edit);
                UploadFormData.append('product_code',product_code_edit);
                UploadFormData.append('text_color',text_color_edit);
                UploadFormData.append('bg_color',bg_color_edit);
                let URL="/SliderDataEdit";
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
                        $('#EditModal').modal('hide');
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

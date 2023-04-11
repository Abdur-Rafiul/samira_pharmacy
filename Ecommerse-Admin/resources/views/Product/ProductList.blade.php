@extends('Layout.app')
@section('content')
    @include('Component.LoadingDiv')
    @include('Component.WentWrongDiv')



    <div id="MainDiv" class="container-fluid d-none">
        @include('Component.addNewBtn')
        <div class="row">
            <div class="col-md-12 data-table-card col-lg-12 col-sm-12">
                <div class="card table-responsive">
                    <div class="card-body">
                        <table id="SiteDataTable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Product Code</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Special Price</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Remarks</th>
                                <th>Brand</th>
                                <th>Shop</th>
                                <th>Rating</th>
                                <th>Stock</th>
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
                    <p class="modal-title" id="exampleModalLabel">Add New product</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Product Code</label>
                                <input id="product_code" class="form-control" type="text">
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Product Title</label>
                                <input id="title" class="form-control" type="text">
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Product Price</label>
                                <input id="price" class="form-control" type="text">
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Special Price</label>
                                <input id="special_price" class="form-control" type="text">
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Category</label>
                                <select id="category" class="form-control">

                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Sub Category</label>
                                <select id="subcategory" class="form-control">

                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Remarks</label>
                                <select id="remark" class="form-control">
                                    <option value="NEW">NEW</option>
                                    <option value="TOP">TOP</option>
                                    <option value="COLLECTION">COLLECTION</option>
                                    <option value="FEATURED">FEATURED</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Brand</label>
                                <select id="brand" class="form-control">

                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Shop</label>
                                <select id="shop" class="form-control">

                                </select>
                            </div>

                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Rating/Star</label>
                                <input id="star" class="form-control" type="number">
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Stock</label>
                                <select id="stock" class="form-control">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Product Image</label>
                                <input id="image" class="form-control" type="file">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="ModalCloseBtn" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button id="AddProductBtn" type="button" class="btn btn-dark">Add</button>
                </div>
            </div>
        </div>
    </div>

{{--    edit modal--}}
    <!-- Modal -->
    <div class="modal fade" id="DataEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel">Add New product</p>
                    <span class="d-none" id="EditID"></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Product Code</label>
                                <input readonly id="product_code_edit" class="form-control" type="text">
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Product Title</label>
                                <input id="title_edit" class="form-control" type="text">
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Product Price</label>
                                <input id="price_edit" class="form-control" type="text">
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Special Price</label>
                                <input id="special_price_edit" class="form-control" type="text">
                            </div>
{{--                            <div class="col-md-4 col-sm-12 col-12">--}}
{{--                                <label>Category</label>--}}
{{--                                <input readonly id="category_edit" class="form-control" type="text">--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4 col-sm-12 col-12">--}}
{{--                                <label>Sub Category</label>--}}
{{--                                <input readonly id="subcategory_edit" class="form-control" type="text">--}}
{{--                            </div>--}}
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Remarks</label>
                                <select id="remark_edit" class="form-control">
                                    <option value="NEW">NEW</option>
                                    <option value="TOP">TOP</option>
                                    <option value="COLLECTION">COLLECTION</option>
                                    <option value="FEATURED">FEATURED</option>
                                </select>
                            </div>
{{--                            <div class="col-md-4 col-sm-12 col-12">--}}
{{--                                <label>Brand</label>--}}
{{--                                <select id="brand_edit" class="form-control">--}}

{{--                                </select>--}}
{{--                            </div>--}}
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Rating/Star</label>
                                <input id="star_edit" class="form-control" type="number">
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label>Stock</label>
                                <select id="stock_edit" class="form-control">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
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
    @include('Component.DeleteModal')
    @include('Component.ChangeImageModal')


@endsection

@section('script')
    <script>

        DataList();
        GetCategory();
        GetBrands();
        GetShops();


        var  ActionSpinnerBtn="<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing..";

        function DataList(){
            let URL="/ProductListData";
            axios.get(URL).then(function (response) {
                if(response.status==200){
                    $('#LoadingDiv').addClass('d-none');
                    $('#MainDiv').removeClass('d-none')
                    $('#SiteDataTable').DataTable().destroy();
                    $('#SiteDataTableBody').empty();
                    $.each(response.data,function (i,item){
                        let tableRow="<tr>" +
                            "<td>"+i+"</td>" +
                            "<td><img style='height: 50px;width: 50px;' src='"+item['image']+"'></td>" +
                            "<td>"+item['product_code']+"</td>" +
                            "<td>"+item['title']+"</td>" +
                            "<td>"+item['price']+"</td>" +
                            "<td>"+item['special_price']+"</td>" +
                            "<td>"+item['category']+"</td>" +
                            "<td>"+item['subcategory']+"</td>" +
                            "<td>"+item['remark']+"</td>" +
                            "<td>"+item['brand']+"</td>" +
                            "<td>"+item['shop_name']+"</td>" +
                            "<td>"+item['star']+"</td>" +
                            "<td>"+item['stock']+"</td>" +
                            "<td>" +
                            "<div class='dropdown'>" +
                            "<button class='btn btn-sm btn-dark  dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Dropdown button</button>" +
                            "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>" +
                            "<a class='dropdown-item deleteItem' data-id="+item['id']+" data-img="+item['image']+" href='#'>Delete</a>"+
                            "<a class='dropdown-item changeImage' data-id="+item['id']+" data-img="+item['image']+" href='#'>Change Image</a>"+
                            "<a class='dropdown-item editItem' data-eid="+item['id']+" href='#'>Edit Data</a>"+
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

                    $('.editItem').on('click',function () {
                        let idEdit=$(this).data('eid');
                        $('#EditID').html(idEdit);
                        GetProductListEditData(idEdit);
                        $('#DataEditModal').modal('show');
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
            $("#category").empty();
            let ChooseOption="<option value=''>Select Category</option>";
            $("#category").append(ChooseOption);
            let URL="/GetCategoryList";
            let AxiosConfig = { headers: { 'Content-Type': 'application/json' } };
            axios.get(URL,AxiosConfig).then(function (response){
                if(response.status===200){

                    let JSONData=response.data;
                    console.log(JSONData);
                    $.each(JSONData, function (key, value) {
                        let OneData="<option value='"+value['cat1_name']+"'>"+value['cat1_name']+"</option>";
                        $("#category").append(OneData);
                    });

                }
                else{
                    toastr.error("No data found in category");

                }
            }).catch(function (error){
                toastr.error("Something went wrong!");

            });
        }

        $('#category').on('change',function (){
            $("#subcategory").empty();
            let category_name= $(this).val();
            let URL="/GetSubCategoryAsCategory";
            let AxiosConfig = { headers: { 'Content-Type': 'application/json' } };
            axios.post(URL,{category_name:category_name},AxiosConfig).then(function (response){
                if(response.status===200){
                    let JSONData=response.data;
                    console.log(JSONData);
                    $.each(JSONData, function (key, value) {
                        let OneData="<option value='"+value['cat2_name']+"'>"+value['cat2_name']+"</option>";
                        $("#subcategory").append(OneData);
                    });
                }
                else{
                    toastr.error("Subcategory Load Failed");

                }
            }).catch(function (error){
                toastr.error("Something Went Wrong");

            });
        });

        function GetBrands(){
            $("#brand").empty();
            let ChooseOption="<option value=''>Select Brand</option>";
            $("#brand").append(ChooseOption);
            let URL="/BrandListData";
            let AxiosConfig = { headers: { 'Content-Type': 'application/json' } };
            axios.get(URL,AxiosConfig).then(function (response){
                if(response.status===200){

                    let JSONData=response.data;
                    console.log(JSONData);
                    $.each(JSONData, function (key, value) {
                        let OneData="<option value='"+value['brand_name']+"'>"+value['brand_name']+"</option>";
                        $("#brand").append(OneData);
                    });

                }
                else{
                    toastr.error("No data found in category");

                }
            }).catch(function (error){
                toastr.error("Something went wrong!");

            });
        }

        function GetShops(){
            $("#shop").empty();
            let ChooseOption="<option value=''>Select Product Code</option>";
            $("#shop").append(ChooseOption);
            let URL="/ShopData";
            let AxiosConfig = { headers: { 'Content-Type': 'application/json' } };
            axios.get(URL,AxiosConfig).then(function (response){
                if(response.status===200){

                    let JSONData=response.data;
                    $.each(JSONData, function (key, value) {
                        let OneData="<option value='"+value['shop_code']+'('+value['shop_name']+')'+"'>"+value['shop_code']+'('+value['shop_name']+')'+"</option>";
                        $("#shop").append(OneData);
                    });

                }
                else{
                    toastr.error("No data found in category");

                }
            }).catch(function (error){
                toastr.error("Something went wrong!");

            });
        }



        $('#AddProductBtn').on('click',function (){
            let numberRegx=/^[+-]?\d+(\.\d+)?$/;
            let title= $('#title').val();
            let price= $('#price').val();
            let special_price= $('#special_price').val();
            let category= $('#category').val();
            let subcategory= $('#subcategory').val();
            let remark= $('#remark').val();
            let brand= $('#brand').val();
            let shop= $('#shop').val();
            let star= $('#star').val();
            let stock= $('#stock').val();
            let product_code= $('#product_code').val();
            let image=$('#image').prop('files');
            if(title.length===0){
                ErrorToast("Product Title Required");
            }
            else if(product_code.length===0){
                ErrorToast("Product Code Required!");
            }
            else if(price.length===0){
                ErrorToast("Price Required!");
            }
            else if(!numberRegx.test(price)){
                toastr.error("Price should be a number");
            }

            else if(category.length===0){
                ErrorToast("Category Required!");
            }
            else if(subcategory.length===0){
                ErrorToast("Subcategory Required!");
            }
            else if(remark.length===0){
                ErrorToast("Remarks Required!");
            }
            else if(brand.length===0){
                ErrorToast("Brand Required!");
            }
            else if(star.length===0){
                ErrorToast("Rating/Star Required!");
            }
            else if(image.length===0){
                ErrorToast("Product Image Required!");
            }
            else{
                $('#AddProductBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('title',title);
                UploadFormData.append('price',price);
                UploadFormData.append('special_price',special_price);
                UploadFormData.append('category',category);
                UploadFormData.append('subcategory',subcategory);
                UploadFormData.append('remark',remark);
                UploadFormData.append('brand',brand);
                UploadFormData.append('shop',shop);
                UploadFormData.append('star',star);
                UploadFormData.append('product_code',product_code);
                UploadFormData.append('stock',stock);
                UploadFormData.append('image',image[0]);
                let URL="/ProductListAdd";
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
                        $('#title').val("");
                        $('#price').val("");
                        $('#special_price').val("");
                        $('#image').val("");
                        $('#category').val("");
                        $('#subcategory').val("");
                        $('#remark').val("");
                        $('#brand').val("");
                        $('#star').val("");
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
            ProductListDelete(id,imageURL,DeleteBtn);
        });

        function ProductListDelete(deleteID,imageURL,DeleteBtn){

            DeleteBtn.html(ActionSpinnerBtn);

            let URL="/ProductListDelete";
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
                let URL="/ChangeProductListImage";
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

        //edit data code

        function GetProductListEditData(idDetails){

            let URL="/ProductListEditData";
            let AxiosConfig = { headers: { 'Content-Type': 'application/json' } };
            axios.post(URL,{id:idDetails},AxiosConfig).then(function (response) {

                if (response.status===200) {
                    $('#DataEditModal').modal('show');
                    let EditData=response.data;

                    $('#product_code_edit').val(EditData[0]['product_code']);
                    $('#title_edit').val(EditData[0]['title']);
                    $('#price_edit').val(EditData[0]['price']);
                    $('#special_price_edit').val(EditData[0]['special_price']);
                    // $('#category_edit').val(EditData[0]['category']);
                    // $('#subcategory_edit').val(EditData[0]['subcategory']);
                    $('#remark_edit').val(EditData[0]['remark']);
                    // $('#brand_edit').val(EditData[0]['brand']);
                    $('#star_edit').val(EditData[0]['star']);
                    $('#stock_edit').val(EditData[0]['stock']);
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
            let numberRegx=/^[+-]?\d+(\.\d+)?$/;
            let editID= $('#EditID').html();
            let title= $('#title_edit').val();
            let price= $('#price_edit').val();
            let special_price= $('#special_price_edit').val();
            let remark= $('#remark_edit').val();
            let star= $('#star_edit').val();
            let stock= $('#stock_edit').val();

            if(title.length===0){
                ErrorToast("Product Title Required");
            }
            else if(price.length===0){
                ErrorToast("Price Required!");
            }
            else if(!numberRegx.test(price)){
                toastr.error("Price should be a number");
            }

            else if(remark.length===0){
                ErrorToast("Remarks Required!");
            }

            else if(star.length===0){
                ErrorToast("Rating/Star Required!");
            }

            else{
                $('#EditProductDataBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('editID',editID);
                UploadFormData.append('title',title);
                UploadFormData.append('price',price);
                UploadFormData.append('special_price',special_price);
                UploadFormData.append('remark',remark);
                UploadFormData.append('star',star);
                UploadFormData.append('stock',stock);

                let URL="/ProductListDataEdit";
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






    </script>
@endsection

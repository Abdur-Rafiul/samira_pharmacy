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
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
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
                    <p class="modal-title" id="exampleModalLabel">Add New Sub-Category</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Category</label>
                                <select id="Category" class="form-control">

                                </select>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Sub Category Name</label>
                                <input id="SubCatID" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="ModalCloseBtn" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="AddSubCategoryBtn" type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="CatEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel">Edit Category</p>
                    <span class="d-none" id="CatID"></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12 d-none">
                                <label>Old Category Name</label>
                                <input readonly id="sobuj" class="form-control" type="text">
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Category Name</label>
                                <input id="new_cat_name" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button id="EditCategoryBtn" type="button" class="btn btn-dark">Add</button>
                </div>
            </div>
        </div>
    </div>

    @include('Component.DeleteModal')



@endsection

@section('script')
    <script>
        var  ActionSpinnerBtn="<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing..";

        DataList();
        GetCategory();
        function DataList(){
            let URL="/SubCategoryListData";
            axios.get(URL).then(function (response) {
                if(response.status==200){
                    $('#LoadingDiv').addClass('d-none');
                    $('#MainDiv').removeClass('d-none')
                    $('#SiteDataTable').DataTable().destroy();
                    $('#SiteDataTableBody').empty();
                    $.each(response.data,function (i,item){
                        let tableRow="<tr>" +
                            "<td>"+i+"</td>" +
                            "<td>"+item['cat1_name']+"</td>" +
                            "<td>"+item['cat2_name']+"</td>" +
                            "<td>" +
                            "<div class='dropdown'>" +
                            "<button class='btn btn-sm btn-dark  dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Dropdown button</button>" +
                            "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>" +
                            "<a class='dropdown-item deleteItem' data-id="+item['id']+" href='#'>Delete</a>"+
                            "<a class='dropdown-item editCategory' data-id="+item['id']+" href='#'>Edit Category</a>"+
                            "</div>" +
                            "</div>" +
                            "</td>" +
                            "</tr>";
                        $('#SiteDataTableBody').append(tableRow);
                    });



                    $('.deleteItem').on('click',function () {
                        let id=$(this).data('id');
                        $('#DeleteID').html(id);
                        $('#DeleteModal').modal('show');
                    })

                    $('.editCategory').on('click',function () {
                        let idEdit=$(this).data('id');
                        $('#CatID').html(idEdit);
                        GetCategoryNameEditData(idEdit);
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
            $("#Category").empty();
            let URL="/CategoryListData";
            let AxiosConfig = { headers: { 'Content-Type': 'application/json' } };
            axios.get(URL,AxiosConfig).then(function (response){
                if(response.status===200){

                    let JSONData=response.data;
                    let sub_cat_status='';

                    $.each(JSONData,function(i,item){
                        $('<option>').html(
                            JSONData[i].cat1_name
                        ).appendTo('#Category');
                    });

                }
                else{
                    ErrorToast("No Categories Added yet!");

                }
            }).catch(function (error){
                ErrorToast("Something Went wrong");

            });
        }


        $('#AddSubCategoryBtn').on('click',function (){
            let Category= $('#Category').val();
            let SubCatID= $('#SubCatID').val();
            if(SubCatID.length===0){
                ErrorToast("Sub Category Name Required");
            }
            else{
                $('#AddSubCategoryBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('cat_name',Category);
                UploadFormData.append('sub_cat_name',SubCatID);
                let URL="/SubCategoryAdd";
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
                        SuccessToast("Sub Category Added Successfully");
                        $('#Category').val("");
                        $('#SubCatID').val("");
                        $('#AddNewModal').modal('hide');
                        DataList();

                    }
                    else{
                        ErrorToast("Failed ! Please try again");
                    }

                }).catch(function (error){
                    ErrorToast("Something Went Wrong");
                });
            }
        });

        $('#DeleteConfirm').click(function (event) {
            let id= $('#DeleteID').html();

            let DeleteBtn=$('#DeleteConfirm');
            SubCategoryDelete(id,DeleteBtn);
        });

        function SubCategoryDelete(deleteID,DeleteBtn){

            DeleteBtn.html(ActionSpinnerBtn);

            let URL="/SubCategoryDelete";
            let AxiosConfig = { headers: { 'Content-Type': 'application/json' } };
            let blankData=" ";
            axios.post(URL,{id:deleteID},AxiosConfig).then(function (response) {

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

        //edit data
        function GetCategoryNameEditData(idDetails){

            let URL="/GetSubCategoryEditData";
            let AxiosConfig = { headers: { 'Content-Type': 'application/json' } };
            axios.post(URL,{id:idDetails},AxiosConfig).then(function (response) {

                if (response.status===200) {
                    $('#CatEditModal').modal('show');
                    let EditData=response.data;

                    $('#sobuj').val(EditData[0]['cat2_name']);
                    $('#new_cat_name').val(EditData[0]['cat2_name']);
                }
                else {
                    $('#CatEditModal').modal('hide');
                    ErrorToast("Something went wrong !");
                }

            }).catch(function (error) {
                $('#CatEditModal').modal('hide');
                ErrorToast("Something went wrong !");
            });
        }

        $('#EditCategoryBtn').on('click',function (){
            let CatID= $('#CatID').html();
            let sobuj= $('#sobuj').val();
            let new_cat_name= $('#new_cat_name').val();
            if(new_cat_name.length===0){
                ErrorToast("SubCategory Name Required");
            }
            else{
                $('#EditCategoryBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('cat_id',CatID);
                UploadFormData.append('sobuj',sobuj);
                UploadFormData.append('new_cat_name',new_cat_name);
                let URL="/SubCategoryNameEdit";
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
                        $('#CatEditModal').modal('hide');
                        DataList();

                    }
                    else{
                        $('#CatEditModal').modal('hide');
                        ErrorToast("Failed ! Please Try Again");
                    }

                }).catch(function (error){
                    ErrorToast("Something went wrong !");
                });
            }
        })



    </script>
@endsection

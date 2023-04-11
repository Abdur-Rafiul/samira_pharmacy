@extends('Layout.app')
@section('content')
    @include('Component.LoadingDiv')
    @include('Component.WentWrongDiv')

    <div id="MainDiv" class="container-fluid d-none">
        <div class="row">
            <div class="col-md-12 data-table-card col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table id="SiteDataTable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Product Name</th>
                                <th>Product Quantity</th>
                                <th>Product Info</th>
                                <th>Delivery Address</th>
                                <th>Exp. Delivery Date</th>
                                <th>Req. Date</th>
                                <th>Req. Time</th>
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
    @include('Component.DeleteModal')
@endsection

@section('script')


    <script>

        DataList()

        var  ActionSpinnerBtn="<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing..";
        function DataList(){
            let URL="/CustomOrderData";
            axios.get(URL).then(function (response) {
                if(response.status==200){
                    $('#LoadingDiv').addClass('d-none');
                    $('#MainDiv').removeClass('d-none')
                    $('#SiteDataTable').DataTable().destroy();
                    $('#SiteDataTableBody').empty();
                    $.each(response.data,function (i,item){
                        let tableRow="<tr>" +
                            "<td>"+item['id']+"</td>" +
                            "<td>"+item['name']+"</td>" +
                            "<td>"+item['mobile']+"</td>" +
                            "<td>"+item['email']+"</td>" +
                            "<td>"+item['product_name']+"</td>" +
                            "<td>"+item['product_quantity']+"</td>" +
                            "<td>"+item['product_info']+"</td>" +
                            "<td>"+item['delivery_address']+"</td>" +
                            "<td>"+item['expected_delivery_date']+"</td>" +
                            "<td>"+item['request_date']+"</td>" +
                            "<td>"+item['request_time']+"</td>" +
                            "<td>" +
                            "<div class='dropdown'>" +
                            "<button class='btn btn-sm btn-dark dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Dropdown button</button>" +
                            "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>" +
                            "<a class='dropdown-item deleteItem' data-id="+item['id']+" href='#'>Delete</a>"+
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

        $('#DeleteConfirm').click(function (event) {
            let id= $('#DeleteID').html();

            let DeleteBtn=$('#DeleteConfirm');
            ContactListDelete(id,DeleteBtn);
        });

        function ContactListDelete(deleteID,DeleteBtn){

            DeleteBtn.html(ActionSpinnerBtn);

            let URL="/CustomOrderDelete";
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



    </script>

@endsection



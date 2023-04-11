@extends('Layout.app')
@section('content')
    @include('Component.LoadingDiv')
    @include('Component.WentWrongDiv')

    <div id="MainDiv" class="container-fluid d-none">
        <div class="row">
            <div class="col-md-12 data-table-card col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table id="SiteDataTable" class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Order Date</th>
                                <th>Order Time</th>
                                <th>Invoice No</th>
                                <th>Product Item</th>
                                <th>Total Price</th>
                                <th>Mobile No</th>
                                <th>Customer Name</th>
                                <th>Payment Method</th>
                                <th>Pay. No</th>
                                <th>trxn ID</th>
                                <th>Delivery Address</th>
                                <th>Status</th>
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

    <!-- View Details Modal -->
    <!-- Modal -->
    <div class="modal animate__animated animate__zoomIn" id="orderListModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel">Product Order Item</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Shop</th>
                                        <th>Product Info</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                    </tr>
                                    </thead>
                                    <tbody id="orderItemTable">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ChangeStatusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel">Change Order Status</p>
                    <span class="" id="statusID"></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Change Status</label>
                                <select id="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                    <option value="Accepted By Courier">Accepted By Courier</option>
                                    <option value="Delivered">Delivered</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button id="ChangeStatusBtn" type="button" class="btn btn-dark">Add</button>
                </div>
            </div>
        </div>
    </div>
    @include('Component.DeleteModal')
    @include('Order.Invoice')
@endsection

@section('script')


    <script>

        DataList()

        var  ActionSpinnerBtn="<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing..";
        function DataList(){
            let URL="/ProductOrderData";
            axios.get(URL).then(function (response) {
                if(response.status==200){
                    $('#LoadingDiv').addClass('d-none');
                    $('#MainDiv').removeClass('d-none')
                    $('#SiteDataTable').DataTable().destroy();
                    $('#SiteDataTableBody').empty();
                    $.each(response.data,function (i,item){
                        let tableRow="<tr>" +
                            "<td>"+(i+1)+"</td>" +
                            "<td>"+item['order_date']+"</td>" +
                            "<td>"+item['order_time']+"</td>" +
                            "<td>"+item['invoice_no']+"</td>" +
                            "<td> " + "<span  data-reference="+item['invoice_no']+" style='font-size:25px;'  class='VewDetailsBtn text-dark'><i class='fas fa-eye'></i></span> " + "</td>"+
                            "<td>"+item['total_price']+"</td>" +
                            "<td>"+item['mobile']+"</td>" +
                            "<td>"+item['name']+"</td>" +
                            "<td>"+item['payment_method']+"</td>" +
                            "<td>"+item['payment_number']+"</td>" +
                            "<td>"+item['trx']+"</td>" +
                            "<td>"+item['delivery_address']+"</td>" +
                            "<td>"+item['order_status']+"</td>" +
                            "<td>" +
                            "<div class='dropdown'>" +
                            "<button class='btn btn-sm btn-dark dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Dropdown button</button>" +
                            "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>" +
                            "<a class='dropdown-item deleteItem' data-id="+item['invoice_no']+" href='#'>Delete</a>"+
                            "<a class='dropdown-item statusChange' data-id="+item['invoice_no']+" href='#'>Change Status</a>"+
                            "<a class='dropdown-item invoice' data-id="+item['invoice_no']+" href='#'>Print Invoice</a>"+
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

                    $('.statusChange').on('click',function () {
                        let id=$(this).data('id');
                        $('#statusID').html(id);
                        $('#ChangeStatusModal').modal('show');
                    })

                    $('.VewDetailsBtn').click(function(event){
                        let referenceNo=$(this).data('reference');
                        let VewDetailsBtn=$(this);
                        DetailsData(referenceNo,VewDetailsBtn);
                    });

                    $('.invoice').on('click',function () {
                        let id=$(this).data('id');
                        $('#statusID').html(id);
                        GetInvoiceData(id);
                        $('#InvoiceModal').modal('show');
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

        function DetailsData(referenceNo,VewDetailsBtn){
            let BtnSpinner="<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>";
            VewDetailsBtn.html(BtnSpinner);

            let URL="/ProductOrderDetailsData";
            let AxiosConfig = { headers: { 'Content-Type': 'application/json' } };
            axios.post(URL,{invoice_no:referenceNo},AxiosConfig).then(function (response) {

                VewDetailsBtn.html("<i class='fas fa-eye'></i>");
                if (response.status===200) {
                    $('#orderListModal').modal('show');
                    let TableData=response.data;
                    $('#orderItemTable').empty();
                    $.each(response.data,function (i,item){
                        let tableRow="<tr>" +
                            "<td>"+(i+1)+"</td>" +
                            "<td>"+item['product_name']+"</td>" +
                            "<td>"+item['product_code']+"</td>" +
                            "<td>"+item['shop_name']+'('+item['shop_code']+')'+"</td>" +
                            "<td>"+item['product_info']+"</td>" +
                            "<td>"+item['product_quantity']+" </td>" +
                            "<td>"+item['unit_price']+" </td>" +
                            "</tr>";
                        $('#orderItemTable').append(tableRow);
                    });


                }
                else {
                    $('#orderListModal').modal('hide');
                    toastr.error("No Data Found! Please Try Again");
                }

            }).catch(function (error) {
                $('#orderListModal').modal('hide');
                toastr.error("Something Went Wrong");
            });
        }

        $('#DeleteConfirm').click(function (event) {
            let id= $('#DeleteID').html();

            let DeleteBtn=$('#DeleteConfirm');
            ProductOrderDelete(id,DeleteBtn);
        });

        function ProductOrderDelete(deleteID,DeleteBtn){

            DeleteBtn.html(ActionSpinnerBtn);

            let URL="/ProductOrderDelete";
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

        $('#ChangeStatusBtn').on('click',function (){
            let statusID= $('#statusID').html();
            let status= $('#status').val();

            if(status.length===0){
                toastr.error("Please Select a status first !");
            }
            else{
                $('#EditCustomerBtn').html(ActionSpinnerBtn);
                let ConfirmBtn=$(this);
                ConfirmBtn.prop("disabled", true);

                let UploadFormData=new FormData();
                UploadFormData.append('statusID',statusID);
                UploadFormData.append('status',status);

                let URL="/ProductOrderStatusEdit";
                let AxiosHeaderConfig = { headers: { 'Content-Type': 'application/json' },
                    onUploadProgress:function (progressEvent) {
                        let UpPer= ((progressEvent.loaded*100)/progressEvent.total).toFixed(2) +" %";
                        ConfirmBtn.html(UpPer +"Please Wait..");
                    }
                };
                axios.post(URL,UploadFormData).then(function (response){

                    $('#ChangeStatusBtn').html("Confirm").prop("disabled", false);

                    if(response.status==200){
                        toastr.success("Request Success");
                        $('#ChangeStatusModal').modal('hide');
                        DataList();
                    }
                    else{
                        toastr.error("Failed ! Please Try Again");
                    }

                }).catch(function (error){
                    $('#ChangeStatusBtn').html("Confirm").prop("disabled", false);
                    toastr.error("Something went wrong in server side !");
                });

            }
        });

        function GetInvoiceData(id){

            let URL="/ProductOrderInvoiceData";
            let AxiosConfig = { headers: { 'Content-Type': 'application/json' } };
            axios.post(URL,{id:id},AxiosConfig).then(function (response) {

                if (response.status===200) {
                    $('#InvoiceModal').modal('show');
                    let JSON=response.data;
                    let InvoiceData=JSON['order_data'];
                    let Subtotal=JSON['sub_total'];

                    $('#invoice_date').html(InvoiceData[0]['order_date']);
                    $('#invoice_number').html(InvoiceData[0]['invoice_no']);
                    $('#invoice_customer').html(InvoiceData[0]['name']);
                    $('#invoice_cust_address').html(InvoiceData[0]['delivery_address']);
                    // $('#delivery_charge').html(InvoiceData[0]['delivery_charge']);
                    let total_price_tk=InvoiceData[0]['total_price'];
                    let splitData= total_price_tk.split(" ");
                    let deliveryChargeTk=InvoiceData[0]['delivery_charge'];
                    let deliveryChargeSplit= deliveryChargeTk.split(" ");
                    let deliveryCharge=deliveryChargeSplit[0];
                    // let totalPrice= parseFloat(Subtotal)+parseFloat(deliveryCharge);

                    $('#invoice_subtotal').html(Subtotal+' TK');
                    // $('#total_price').html(totalPrice+' TK');
                    //sobuj
                    $('#invoiceItemTable').empty();
                    $.each(InvoiceData,function (i,item){
                        let unitPriceTk=item['unit_price'];
                        let unit_price_split= unitPriceTk.split(" ");
                        let quantity=item['product_quantity'];
                        let total_unit_price=unit_price_split[0]*quantity;
                        let tableRow="<tr>" +
                            "<td>"+(i+1)+"</td>" +
                            "<td>"+item['product_name']+"</td>" +
                            "<td>"+item['product_info']+"</td>" +
                            "<td>"+item['unit_price']+"</td>" +
                            "<td>"+item['product_quantity']+" </td>" +
                            "<td>"+item['total_price']+"</td>" +
                            "</tr>";
                        $('#invoiceItemTable').append(tableRow);
                    });
                    //sobuj

                }
                else {
                    $('#InvoiceModal').modal('hide');
                    ErrorToast("Something went wrong !");
                }

            }).catch(function (error) {
                $('#InvoiceModal').modal('hide');
                ErrorToast("Something went wrong in sever !");
            });
        }

        $('#printBtnID').on('click',function (){
            var printContents = $('#printDiv').html();
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
        })



    </script>

@endsection



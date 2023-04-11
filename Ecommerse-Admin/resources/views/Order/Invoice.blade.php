<!-- Modal -->
<div class="modal fade" id="InvoiceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel">Order Invoice</p>
                <span class="" id="statusID"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="printDiv" class="container">
                    <div class="row">
                        <div class="col-6 d-flex flex-row">
                            <img style="height: 50px;" src="{{ asset('images/navlogo.svg') }}">
                        </div>
                        <div class="col-6 d-flex flex-row-reverse">
                            <h3>Invoice</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 d-flex flex-row">
                            <p><strong>Date:</strong> <span id="invoice_date"></span></p>
                        </div>
                        <div class="col-6 d-flex flex-row-reverse">
                            <p><strong>Invoice No:</strong> <span id="invoice_number"></span></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 d-flex flex-row">
                            <p>
                                <strong>Invoiced Form:</strong>  <br>
                                Uttoron e Bazar <br>
                                Tahaz Rezia Monjil, 2nd Floor, Kalabagan, Rajshahi
                            </p>
                        </div>
                        <div class="col-6 d-flex flex-row-reverse">
                            <p>
                                <strong>Invoiced To:</strong>  <br>
                                <span id="invoice_customer"></span> <br>
                                <span id="invoice_cust_address"></span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 m-3">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Product Details</th>
                                    <th>Unit Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody id="invoiceItemTable">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex flex-row-reverse">
                            <p><strong>Subtotal:</strong> <span id="invoice_subtotal"></span> <br></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex flex-row-reverse">
                            <p><strong>Delivery Charge:</strong> <span id="delivery_charge">_______</span> <br></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex flex-row-reverse">
                            <p><strong>Total:</strong> <span id="total_price">_______</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                <button id="printBtnID" type="button" class="btn btn-dark">PRINT</button>
            </div>
        </div>
    </div>
</div>

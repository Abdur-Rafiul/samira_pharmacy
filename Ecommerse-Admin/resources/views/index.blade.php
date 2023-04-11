@extends('Layout.app')
@section('content')
    <div class="container ">
        <div class="row ">

            <div class="col-md-3 p-1 col-sm-6 col-6 col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-light"><i class="fa fa-chart-bar"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Visitor</span>
                        <span id="SummaryVisitorTotal" class="info-box-number">10<small>%</small></span>
                    </div>
                </div>
            </div>


            <div class="col-md-3 p-1 col-sm-6 col-6 col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-light"><i class="fa fa-bell"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Notification Delivered</span>
                        <span id="SummaryNotificationTotal"  class="info-box-number">10<small>%</small></span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 p-1 col-sm-6 col-6 col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-light"><i class="fa fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Contact Request</span>
                        <span id="SummaryContactTotal" class="info-box-number">10<small>%</small></span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 p-1 col-sm-6 col-6 col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-light"><i class="fa fa-user-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Admin</span>
                        <span id="SummaryAdminTotal" class="info-box-number">10<small>%</small></span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 p-1 col-sm-6 col-6 col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-light"><i class="fa fa-user-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Pending Order</span>
                        <span id="SummaryPendingOrder" class="info-box-number text-danger">00<small>%</small></span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 p-1 col-sm-6 col-6 col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-light"><i class="fa fa-user-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Order</span>
                        <span id="SummaryTotalOrder" class="info-box-number">10<small>%</small></span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 p-1 col-sm-6 col-6 col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-light"><i class="fa fa-user-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Custom Order</span>
                        <span id="SummaryTotalCustomOrder" class="info-box-number">10<small>%</small></span>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')


    <script type="text/javascript">
        getHomeSummary();
        function getHomeSummary() {
            let  SummaryVisitorTotal= $('#SummaryVisitorTotal');
            let  SummaryContactTotal= $('#SummaryContactTotal');
            let  SummaryNotificationTotal=$('#SummaryNotificationTotal');
            let  SummaryAdminTotal= $('#SummaryAdminTotal');
            let  SummaryPendingOrder= $('#SummaryPendingOrder');
            let  SummaryTotalOrder= $('#SummaryTotalOrder');
            let  SummaryTotalCustomOrder= $('#SummaryTotalCustomOrder');

            SummaryVisitorTotal.html(BtnSpinner);
            SummaryContactTotal.html(BtnSpinner);
            SummaryNotificationTotal.html(BtnSpinner);
            SummaryAdminTotal.html(BtnSpinner);

            let URL="/HomeSummary";
            axios.get(URL).then(function (response) {

                if(response.status==200){
                    SummaryVisitorTotal.html((response.data)['TotalVisitor']);
                    SummaryContactTotal.html((response.data)['TotalContact']);
                    SummaryNotificationTotal.html((response.data)['TotalNotification']);
                    SummaryAdminTotal.html((response.data)['TotalAdmin']);
                    SummaryPendingOrder.html((response.data)['TotalPendingOrder']);
                    SummaryTotalOrder.html((response.data)['TotalOrder']);
                    SummaryTotalCustomOrder.html((response.data)['TotalCustomOrder']);
                }
                else{
                    SummaryVisitorTotal.html("....");
                    SummaryContactTotal.html("....");
                    SummaryNotificationTotal.html("....");
                    SummaryAdminTotal.html("....");
                    SummaryPendingOrder.html("....");
                    SummaryTotalOrder.html("....");
                    SummaryTotalCustomOrder.html("....");
                }
            }).catch(function (error) {
                SummaryVisitorTotal.html("....");
                SummaryContactTotal.html("....");
                SummaryNotificationTotal.html("....");
                SummaryAdminTotal.html("....");
                SummaryPendingOrder.html("....");
                SummaryTotalOrder.html("....");
                SummaryTotalCustomOrder.html("....");
            })
        }
    </script>
@endsection

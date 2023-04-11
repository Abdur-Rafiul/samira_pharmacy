@extends('Layout.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button class="your-button-class" id="sslczPayBtn"
                        token="ghgjhghjgj"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="An URL where backend code will initiate the payment to SSLCOMMERZ"> Pay Now
                </button>
            </div>
        </div>
    </div>






@endsection

@section('script')

    <script>

        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>
@endsection

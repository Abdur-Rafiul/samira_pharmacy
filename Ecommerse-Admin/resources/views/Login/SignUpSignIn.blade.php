<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('login-page-asset/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/toastr.min.css')}}">
</head>
<body>
<section class="ftco-section">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                        <div class="text w-100">
                            <h2>Welcome to ECOM ADMIN</h2>
                        </div>
                    </div>
                    <div class="login-wrap p-4 p-lg-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign In</h3>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="label" for="name">Email</label>
                            <input id="SignInEmail" type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="password">Password</label>
                            <input id="SignInPass" type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button id="SignInBtn" type="button" class="form-control btn btn-primary submit px-3">Sign In</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{asset('login-page-asset/script.js')}}"></script>
<script src="{{asset('login-page-asset/js/jquery.min.js')}}"></script>
<script src="{{asset('login-page-asset/js/popper.js')}}"></script>
<script src="{{asset('login-page-asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('login-page-asset/js/main.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script src="{{asset('js/axios.min.js')}}"></script>


<script>



    $('#SignInBtn').on('click',function (){
        let SignInEmail= $('#SignInEmail').val();
        let SignInPass=$('#SignInPass').val();
        let EmailRegx=/\S+@\S+\.\S+/;
        if(SignInEmail.length===0){
            toastr.error("Email Required !");
        }
        else if(!EmailRegx.test(SignInEmail)){
            toastr.error("Invalid email address !");
        }
        else if(SignInPass.length===0){
            toastr.error("Password Required !");
        }

        else{

            $('#SignInBtn').html("Signing in...")
            let MyFormData=new FormData();
            MyFormData.append('email',SignInEmail);
            MyFormData.append('password',SignInPass);
            let URL="/OnSignIn";
            var AxiosConfig = { headers: { 'Content-Type': 'application/json' } };
            axios.post(URL,MyFormData,AxiosConfig).then(function (response){
                $('#SignInBtn').html("Signing In Now");
                if(response.status==200){
                    if(response.status==200 && response.data==1){
                        window.location.href="/";
                        toastr.success("Sign In Success");
                        $('#SignInEmail').val("");
                        $('#SignInPass').val("");
                    }
                    else {
                        toastr.error("Incorrect User Email or Password!");
                    }
                }
                else{
                    toastr.error("Something Went Wrong");
                }

            }).catch(function (error){
                $('#SignUpBtn').html("Sign In Now")
                toastr.error("Something Went Wrong");
            });

        }
    })


</script>


</body>
</html>

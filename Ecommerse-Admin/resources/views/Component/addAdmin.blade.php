<div class="modal animat animate__fadeIn" id="AddAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Add New Admin</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input id="AdminNameID" placeholder="Name" type="text" class="form-control">
                <input id="AdminEmailID" placeholder="Email" type="text" class="form-control mt-2">
                <input id="AdminMobileID" placeholder="Mobile" type="text" class="form-control mt-2">
                <input id="AdminUserNameID" placeholder="User Name" type="text" class="form-control mt-2">
                <input id="AdminPass1ID" placeholder="Password" type="password" class="form-control mt-2">
                <input id="AdminPass2ID" placeholder="Confirm Password" type="password" class="form-control mt-2">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                <button id="AddAdminBtn" type="button" class="btn btn-dark">Confirm</button>
            </div>
        </div>
    </div>
</div>

<script>

    $('#AddAdminBtn').on('click',function () {


        let AdminName= $('#AdminNameID').val();
        let AdminEmail= $('#AdminEmailID').val();
        let AdminMobile=  $('#AdminMobileID').val();
        let AdminUserName=  $('#AdminUserNameID').val();
        let AdminPass1=  $('#AdminPass1ID').val();
        let AdminPass2=   $('#AdminPass2ID').val();

        if(AdminName.length==0){
            ErrorToast("Name Required");
        }
        else if(!NameRegx.test(AdminName)){
            ErrorToast("Invalid Name");
        }
        else if(AdminEmail.length==0){
            ErrorToast("Email Required");
        }
        else if(!EmailRegx.test(AdminEmail)){
            ErrorToast("Invalid Email");
        }
        else if(AdminMobile.length==0){
            ErrorToast("Mobile Required");
        }
        else if(!MobileRegx.test(AdminMobile)){
            ErrorToast("Invalid Mobile No");
        }

        else if(AdminUserName.length==0){
            ErrorToast("User Name Required");
        }

        else if(AdminUserName.length<6){
            ErrorToast("User Name Should More Than 6 Character");
        }

        else if(AdminPass1.length==0){
            ErrorToast("Password Required");
        }

        else if(AdminPass1.length<8){
            ErrorToast("Password Should More Than 8 Character");
        }

        else if(AdminPass2.length==0){
            ErrorToast("Confirm Password Required");
        }
        else if(AdminPass1!=AdminPass2){
            ErrorToast("Password And Confirm Password Should Be Same");
        }
        else {

            let URL="/AdminAdd";
            let MyFormData=new FormData();
            MyFormData.append('AdminName',AdminName);
            MyFormData.append('AdminEmail',AdminEmail)
            MyFormData.append('AdminMobile',AdminMobile)
            MyFormData.append('AdminUserName',AdminUserName)
            MyFormData.append('AdminPass1',AdminPass1)

            $('#AddAdminBtn').html(BtnSpinner).prop("disabled", true);
            axios.post(URL,MyFormData).then(function (response) {
                $('#AddAdminBtn').html("Confirm").prop("disabled", false);
                if(response.status==200 && response.data==1){
                    SuccessToast("Request Success");
                    $('#AddAdminModal').modal('hide');
                }
                else{
                    ErrorToast("Request Fail ! Try Again");
                }

            }).catch(function (error) {
                $('#AddAdminBtn').html("Confirm").prop("disabled", false);
                ErrorToast("Request Fail ! Try Again");
            });
        }
    })


</script>


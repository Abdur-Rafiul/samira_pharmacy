<div class="modal animat animate__fadeIn" id="LinkChangeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Update Link</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="LinkColumnID" value="" placeholder="Link Address" type="text" class="form-control">
                <input id="LinkID" value="" placeholder="Link Address" type="text" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                <button id="LinkChangeConfirmBtn" type="button" class="btn btn-dark">Confirm</button>
            </div>
        </div>
    </div>
</div>

<script>


    $('#LinkChangeConfirmBtn').on('click',function () {
        let LinkColumnID= $('#LinkColumnID').val().trim();
        let LinkID = $('#LinkID').val().trim();

        if(LinkID.length==0){
            ErrorToast("Link Required !")
        }
        else {
            let URL="/UpdateSiteInfo";

            let MyFormData=new FormData();
            MyFormData.append('infoData',LinkID);
            MyFormData.append('infoColumn',LinkColumnID);

            $('#LinkChangeConfirmBtn').html(BtnSpinner).prop("disabled", true);

            axios.post(URL,MyFormData).then(function (response) {
                $('#LinkChangeConfirmBtn').html("Confirm").prop("disabled", false);
                if(response.status==200 && response.data==1){

                   $('#LinkColumnID').val("");
                   $('#LinkID').val("");

                    SuccessToast("Request Success");
                    $('#LinkChangeModal').modal('hide');
                    GetSiteInfo();
                }
                else{
                    $('#LinkColumnID').val("");
                    $('#LinkID').val("");
                    $('#LinkChangeModal').modal('hide');
                    ErrorToast("Request Fail ! Try Again");
                }

            }).catch(function (error) {
                $('#LinkColumnID').val("");
                $('#LinkID').val("");
                $('#LinkChangeModal').modal('hide');
                $('#LinkChangeConfirmBtn').html("Confirm").prop("disabled", false);
                ErrorToast("Request Fail ! Try Again");
            });
        }

    });



</script>

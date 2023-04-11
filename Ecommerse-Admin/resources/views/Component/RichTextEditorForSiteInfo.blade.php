<div class="modal animat animate__fadeIn" id="SiteInfoUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Update</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="siteInfoCloumnName" type="text" placeholder="">
                <div  id="SummerNoteArea">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                <button id="SiteInfoUpdateConfirmBtn" type="button" class="btn btn-dark">Confirm</button>
            </div>
        </div>
    </div>
</div>

<script>


    $(function () {
        $('#SummerNoteArea').summernote(  {
            height: 300,
            focus: true
        })
    })


    $("#SiteInfoUpdateConfirmBtn").on('click',function () {
        let infoData=  $('#SummerNoteArea').summernote('code');
        let infoColumn=$('#siteInfoCloumnName').val().trim();

        if(infoData.length==0){
            ErrorToast("Content Required")
        }
        else{

            let URL="/UpdateSiteInfo";
            let MyFormData=new FormData();
            MyFormData.append('infoData',infoData);
            MyFormData.append('infoColumn',infoColumn);

            $('#SiteInfoUpdateConfirmBtn').html(BtnSpinner).prop("disabled", true);

            axios.post(URL,MyFormData).then(function (response) {
                $('#SiteInfoUpdateConfirmBtn').html("Confirm").prop("disabled", false);
                if(response.status==200 && response.data==1){
                    SuccessToast("Request Success");
                    $('#SiteInfoUpdateModal').modal('hide');
                    GetSiteInfo();
                }
                else{
                    $('#SiteInfoUpdateModal').modal('hide');
                    ErrorToast("Request Fail ! Try Again");
                }

            }).catch(function (error) {
                $('#SiteInfoUpdateModal').modal('hide');
                $('#SiteInfoUpdateConfirmBtn').html("Confirm").prop("disabled", false);
                ErrorToast("Request Fail ! Try Again");
            });
        }
    })


</script>

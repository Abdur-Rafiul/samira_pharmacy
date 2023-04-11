<div class="modal animat animate__fadeIn" id="CreateNotificationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Send Notification</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="NotificationSubject" placeholder="Notification Subject" type="text" class="form-control">
                <textarea id="NotificationMsg"  placeholder="Notification Message" rows="5" class="form-control mt-2"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                <button id="SendNotificationBtn" type="button" class="btn btn-dark">Confirm</button>
            </div>
        </div>
    </div>
</div>


<script>
    $('#SendNotificationBtn').on('click',function () {

       let NotificationSubject= $('#NotificationSubject').val();
       let NotificationMsg= $('#NotificationMsg').val();

       if(NotificationSubject.length==0){
                ErrorToast("Subject Required");
       }
       else if(NotificationMsg.length==0){
           ErrorToast("Message Required");
       }

       else{

           let URL="/CreateNotification";
           let MyFormData=new FormData();
           MyFormData.append('subject',NotificationSubject);
           MyFormData.append('msg',NotificationMsg);


           $('#SendNotificationBtn').html(BtnSpinner).prop("disabled", true);

           axios.post(URL,MyFormData).then(function (response) {
               $('#SendNotificationBtn').html("Confirm").prop("disabled", false);

               if(response.status==200 && response.data==1){
                   SuccessToast("Request Success");
                   $('#CreateNotificationModal').modal('hide');
               }
               else{
                   ErrorToast("Request Fail ! Try Again");
               }

           }).catch(function (error) {
               $('#SendNotificationBtn').html("Confirm").prop("disabled", false);
               ErrorToast("Request Fail ! Try Again");
           });
       }
    })
</script>

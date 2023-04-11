<!-- Modal -->
<div class="modal fade" id="ChangeImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel">Change Image</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <img id="imageChangeURL" class="w-50" src="">
                            <span class="d-none" id="ImageID"></span>
                        </div>
                        <div class="col-md-12 col-sm-12 col-12">
                            <label>Change Image</label>
                            <input id="newImage" class="form-control" type="file">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="ModalCloseBtn" type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                <button id="ChangeImageBtn" type="button" class="btn btn-dark">Change</button>
            </div>
        </div>
    </div>
</div>

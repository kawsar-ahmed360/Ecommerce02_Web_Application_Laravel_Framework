
<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 9999999">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Admin Image Change</h4>
            </div>
            <div class="modal-body">


                <form action="{{ route('AdminImageChange') }}" method="POST" id="ImageUpload" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf


                         <div class="row" style="padding: 8px">

                          <div class="row col-md">
                                <label class="row col-sm-4">Old Image</label>
                                
                                <img src="{{ $user->image?url('public/backend/profile/'.$user->image):url('public/backend/envato.png') }}" width="100px" alt="">
                          </div>
                    </div>

                    <div class="row" style="padding: 8px">

                          <div class="row col-md">
                                <label class="row col-sm-4">Image Upload</label>
                                <div class="row col-sm">
                                    <input type="file" class="form-control" name="image" id="image" placeholder="Enter your current_password...........">
                                </div>
                          </div>
                    </div>

                    



                    <input type="hidden" name="UsId" value="{{ $user->id }}" id="UsId">



            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Save changes</button>
            </div>
                </form>


            </div>
        </div>
    </div>
</div>
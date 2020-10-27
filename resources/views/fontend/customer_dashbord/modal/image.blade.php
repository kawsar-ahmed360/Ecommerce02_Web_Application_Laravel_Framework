
<div class="modal fade" id="imageupload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 9999999">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Image Upload</h4>
            </div>
            <div class="modal-body">


                <form action="{{ route('UpdateImage') }}" method="POST" id="ImageUpload" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf


                     <div class="row" style="padding: 8px">

                          <div class="row col-md">
                                <label class="row col-sm-4">Old Image</label>
                                
                                <img src="{{ @Auth::user()->image?url('public/fontend/profile/'.@Auth::user()->image):url('public/fontend/envato.png') }}" width="100px" alt="">
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



                    <input type="hidden" name="UsId" value="{{ @Auth::user()->id }}" id="UsId">



            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Save changes</button>
            </div>
                </form>


            </div>
        </div>
    </div>
</div>
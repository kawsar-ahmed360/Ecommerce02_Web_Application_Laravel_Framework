
<div class="modal fade" id="paswordChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 9999999">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Admin Password Change</h4>
            </div>
            <div class="modal-body">


                <form action="{{ route('AdminpasswordChange') }}" method="POST" id="password_change" accept-charset="utf-8">
                    @csrf

                    <div class="row" style="padding: 8px">

                          <div class="row col-md">
                                <label class="row col-sm-4">Current Password</label>
                                <div class="row col-sm">
                                    <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Enter your current_password...........">
                                </div>
                          </div>
                    </div>

                       <div class="row" style="padding: 8px">

                          <div class="row col-md">
                                <label class="row col-sm-4">New Password</label>
                                <div class="row col-sm">
                                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter your new_password...........">
                                </div>
                          </div>
                    </div>


                       <div class="row" style="padding: 8px">

                          <div class="row col-md">
                                <label class="row col-sm-4">re_type</label>
                                <div class="row col-sm">
                                    <input type="password" class="form-control" name="re_type" id="re_type" placeholder="Enter re_type...........">
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

<div class="modal fade" id="passwordChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 9999999">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Password Change</h4>
            </div>
            <div class="modal-body">


                <form action="{{ route('passwordChange') }}" method="POST" id="passchnage" accept-charset="utf-8">
                    @csrf

                    <div class="row" style="padding: 8px">

                          <div class="row col-md">
                                <label class="row col-sm-4">Current Passwords</label>
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
                                <label class="row col-sm-4">Retype Password</label>
                                <div class="row col-sm">
                                    <input type="password" class="form-control" name="re_password" id="re_password" placeholder="Enter your re_password...........">
                                </div>
                          </div>
                    </div> 

                  


                





                    <input type="hidden" name="UsId" id="UsId">



            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Save changes</button>
            </div>
                </form>


            </div>
        </div>
    </div>
</div>
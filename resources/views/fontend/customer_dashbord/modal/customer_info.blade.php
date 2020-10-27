
<div class="modal fade" id="AddCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 9999999">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Customer Info Edit</h4>
            </div>
            <div class="modal-body">


                <form action="{{ route('CustomerEdite') }}" method="POST" id="customerinfo" accept-charset="utf-8">
                    @csrf

                    <div class="row" style="padding: 8px">

                          <div class="row col-md">
                                <label class="row col-sm-4">Name</label>
                                <div class="row col-sm">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Unit Name...........">
                                </div>
                          </div>
                    </div>

                       <div class="row" style="padding: 8px">

                          <div class="row col-md">
                                <label class="row col-sm-4">Email</label>
                                <div class="row col-sm">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your Unit Name...........">
                                </div>
                          </div>
                    </div>


                       <div class="row" style="padding: 8px">

                          <div class="row col-md">
                                <label class="row col-sm-4">Mobile</label>
                                <div class="row col-sm">
                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter your Unit Name...........">
                                </div>
                          </div>
                    </div> 

                    <div class="row" style="padding: 8px">

                          <div class="row col-md">
                                <label class="row col-sm-4">Address</label>
                                <div class="row col-sm">
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter your Unit Name...........">
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
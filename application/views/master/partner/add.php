<div class="col-md-6 grid-margin stretch-card">
	<div class="card shadow">
	  <div class="card-header border border-light">
	    New
	  </div>
	  <div class="card-body">
      <div id="message"></div>
	      <form class="forms-sample" id="myForm">
            <div class="form-group row">
              <label for="partnercode" class="col-sm-3 col-form-label">Partner Code</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="partnercode" name="partnercode" placeholder="Input Partner Code...">
              </div>
            </div>
            <div class="form-group row">
              <label for="partnername" class="col-sm-3 col-form-label">Partner Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="partnername" name="partnername" placeholder="Input Partner Name...">
              </div>
            </div>
            <div class="form-group row">
              <label for="partneraddress" class="col-sm-3 col-form-label">Address</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="partneraddress" name="partneraddress" rows="3"></textarea>
              </div>
            </div>
        </form>
	  </div>
	  <div class="card-footer">
	  	<button type="button" class="btn btn-sm btn-success mr-2" onclick="handle_save()"><i class="fa fa-send"></i> Submit</button>
      <button type="reset" class="btn btn-info btn-success mr-2"><i class="fa fa-repeat"></i> Reset</button>
      <button class="btn btn-sm btn-warning float-right" id="back" onclick="handle_main()"><i class="fa fa-backward"></i> Back</button>
	  </div>
	</div>
</div>
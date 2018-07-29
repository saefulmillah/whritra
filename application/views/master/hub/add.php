<div class="col-md-6 grid-margin stretch-card">
	<div class="card shadow">
	  <div class="card-header border border-light">
	    New
	  </div>
	  <div class="card-body">
	  	<div id="message"></div>
	    <form class="forms-sample" id="myForm">
            <div class="form-group row">
              <label for="hubcode" class="col-sm-3 col-form-label">Hub Code</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="hubcode" name="hubcode" placeholder="Input Hub Code...">
              </div>
            </div>
            <div class="form-group row">
              <label for="hubname" class="col-sm-3 col-form-label">Hub Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="hubname" name="hubname" placeholder="Input Hub Name...">
              </div>
            </div>
        </form>
	  </div>
	  <div class="card-footer">
	  	<button type="button" id="submit" class="btn btn-sm btn-success mr-2" onclick="handle_save()"><i class="fa fa-send"></i> Submit</button>
	  	<button type="reset" class="btn btn-info btn-success mr-2"><i class="fa fa-repeat"></i> Reset</button>
	    <button class="btn btn-sm btn-warning float-right" id="back" onclick="handle_main()"><i class="fa fa-backward"></i> Back</button>
	  </div>
	</div>
</div>
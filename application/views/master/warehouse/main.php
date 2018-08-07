<div class="col-md-12 grid-margin stretch-card">
	<div class="card shadow">
		<div class="card-header">
			<button class="btn btn-sm btn-info float-right" id="new" onclick="handle_new()"><i class="fa fa-plus"></i> New</button>
			<form class="form-inline">
				<div class="form-group row">
	              <div class="col-sm-4">
	                <input type="text" class="form-control" name="start_date" placeholder="Start date">
	              </div>
	            </div>
	            &nbsp;
				<button class="btn btn-sm btn-success"><i class="fa fa-search"></i> Search</button>
				&nbsp;
				<button class="btn btn-sm btn-success"><i class="fa fa-download"></i> Excel</button>
			</form>
		</div>
		<div class="card-body">
			<table class="table table-hover table-bordered" id="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Code</th>
						<th>Name</th>
						<th>Address</th>
						<th>Created by</th>
						<th>Created at</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
		<div class="card-footer">
	      <small class="text-muted">Last updated 3 mins ago</small>
	    </div>
	</div>
</div>
@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Language</h2>
  </div>
</div>
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Language List
    		<button type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add new</button>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped">
    				<thead>
    					<tr>
    						<td>No</td>
    						<td>Language code</td>
    						<td>Description</td>
    						<td>Action</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($languages as $l => $language)
						<tr>
							<td>{{ $l+1 }}</td>
							<td>{{ $language->name }}</td>
							<td>{{ $language->description }}</td>
							<td>
								<button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
							</td>
						</tr>
    					@endforeach
    				</tbody>
    			</table>
    		</div>	 
    	</div>
    </div>
</div>
@endsection
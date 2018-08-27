@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Cities</h2>
  </div>
</div>
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Cities List
    		<a href="{{ route('cities.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped">
    				<thead>
    					<tr>
    						<td>No</td>
    						<td>Name</td>
    						<td>Description</td>
    						<td>Action</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($cities as $l => $city)
    					<tr>
							<td>{{ $l+1 }}</td>
							<td>{{ $city->name }}</td>
							<td>{{ $city->description }}</td>
							<td><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></td>
						</tr>
						@endforeach
    				</tbody>
    			</table>
    		</div>
    	</div>
    </div>
</div>
@endsection
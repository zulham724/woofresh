@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Sub Categories</h2>
  </div>
</div>
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Sub Categories List
    		<a href="{{ route('subcategories.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped">
    				<thead>
    					<tr>
    						<td>No</td>
    						<td>Group Id</td>
    						<td>Name</td>
    						<td>Action</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($subcategories as $l => $category)
    					<tr>
							<td>{{ $l+1 }}</td>
							<td>{{ $category->category_id }}</td>
							<td>{{ $category->name }}</td>
							<td><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></td>
						</tr>
						@endforeach
    				</tbody>
    			</table>
                <small><a href="{{ url('groups') }}">click here</a> for a New Data Groups, And  <a href="{{ url('categories') }}">click me</a> for a new data categories</small>
    		</div>
    	</div>
    </div>
</div>
@endsection
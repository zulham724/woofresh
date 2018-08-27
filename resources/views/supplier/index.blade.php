@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Supplier</h2>
  </div>
</div>
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Supplier List
    		<a href="{{ route('suppliers.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped">
    				<thead>
    					<tr>
    						<td>No</td>
    						<td>Name</td>
    						<td>Description</td>
    						<td>First Name</td>
    						<td>Last Name</td>
    						<td>Tittle</td>
                            <td>Address</td>
                            <td>Email</td>
                            <td>Phone Numb</td>
    						<td>Action</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($suppliers as $l => $supplier)
    					<tr>
							<td>{{ $l+1 }}</td>
							<td>{{ $supplier->name }}</td>
							<td>{{ $supplier->description }}</td>
							<td>{{ $supplier->contact_first_name }}</td>
							<td>{{ $supplier->contact_last_name }}</td>
							<td>{{ $supplier->contact_title }}</td>                            
                            <td>{{ $supplier->address_detail }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->phone_number }}</td>
							<td><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></td>
						</tr>
						@endforeach
    				</tbody>
    			</table>
                <small>have a New City Data? <a href="{{ url('cities') }}">click here</a></small>
    		</div>
    	</div>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Group</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('groups') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>['suppliers.update',$supplier->id],'method'=>'patch']) }}
						<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" value="{{ $supplier->name }}" name="name" placeholder="type something" required> 
					</div> 
					<div class="form-group">
						<label>Description</label>
						<input type="text" class="form-control" value="{{ $supplier->description }}" name="description" placeholder="type something" required> 
					</div>
					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" value="{{ $supplier->contact_first_name }}" name="contact_first_name" placeholder="type something" required> 
					</div> 
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" class="form-control" value="{{ $supplier->contact_last_name }}" name="contact_last_name" placeholder="type something" required> 
					</div> 
					<div class="form-group">
						<label>Contact Tittle</label>
						<input type="text" class="form-control" value="{{ $supplier->contact_title }}" name="contact_title" placeholder="type something" required> 
					</div>  
					<div class="form-group">
						<label>Address</label>
						<input type="text" class="form-control" value="{{ $supplier->address_detail }}" name="address_detail" placeholder="type something" required> 
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" value="{{ $supplier->email }}" name="email" placeholder="type something" required> 
					</div> 
					<div class="form-group">
						<label>Phone Numb</label>
						<input type="text" class="form-control" value="{{ $supplier->phone_number }}" name="phone_number" placeholder="type something" required> 
					</div> 
						<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Submit</button> 
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
	
</section>
@endsection
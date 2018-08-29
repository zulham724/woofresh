@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Language</h2>
  </div>
</div>
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('transactions') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>'transactions.store','method'=>'post','files'=>true]) }}
						<div class="form-group">
							<label>User</label>
							<select class="form-control select2" name="user_id">
								@foreach ($users as $u => $user)
								<option value="{{ $user->id }}">{{ $user->name }}</option>
								@endforeach
							</select>
						</div> 
						<div class="form-group">
							<label>Transaction Number</label>
							<input type="number" class="form-control" name="transaction_number" placeholder="type something" required> 
						</div> 
						<div class="form-group">
							<label>Payment Type</label>
							<input type="number" class="form-control" name="payment_type" placeholder="type something" required> 
						</div>
						<div class="form-group">
							<label>Status</label>
							<input type="number" class="form-control" name="status" placeholder="type something" required> 
						</div>
						<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Submit</button> 
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
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
					{{ Form::open(['route'=>['vouchers.update',$voucher->id],'method'=>'patch','files'=>true]) }}
						<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" value="{{ $voucher->name }}" name="name" placeholder="type something" required> 
					</div>
					<div class="form-group">
							<label>Image</label>
							{{ Form::file('image',['class'=>'form-control'])}}
					</div> 
					<div class="form-group">
						<label>Code</label>
						<input type="text" class="form-control" value="{{ $voucher->code }}" name="code" placeholder="type something" required> 
					</div> 
					<div class="form-group">
						<label>Description</label>
						<input type="text" class="form-control" value="{{ $voucher->description }}" name="description" placeholder="type something" required> 
					</div> 
					<div class="form-group">
						<label>Value</label>
						<input type="text" class="form-control" value="{{ $voucher->value }}" name="value" placeholder="type something" required>
					</div>
					<div class="form-group">
						<label>Percent</label>
						<input type="text" class="form-control" value="{{ $voucher->percent }}" name="percent" placeholder="type something" required>
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
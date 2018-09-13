@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom"> Voucher</h2>
  </div>
</div>

<section>

<div class="container">
	{{ Form::open(['route'=>'vouchers.store','method'=>'post','files'=>true]) }}
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('vouchers') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
						<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" name="name" placeholder="type something" required> 
					</div>
					<div class="form-group">
							<label>Image</label>
							{{ Form::file('image',['class'=>'form-control'])}}
					</div> 
					<div class="form-group">
						<label>Code</label>
						<input type="text" class="form-control" name="code" placeholder="type something" required> 
					</div> 
					<div class="form-group">
						<label>Description</label>
						<input type="text" class="form-control" name="description" placeholder="type something" required> 
					</div> 
					<div class="form-group">
						<label>Value</label>
						<input type="number" class="form-control" name="value" placeholder="type something" required>
					</div>
					<div class="form-group">
						<label>Percent</label>
						<input type="number" class="form-control" name="percent" placeholder="type something" required>
					</div>			
			
						<button type="submit" class="btn btn-dark pull-right"><i class="fa fa-check"></i> Submit</button> 
				</div>
			</div>
		</div>
	</div>
	{{ Form::close() }}
</div>
	
</section>
@endsection
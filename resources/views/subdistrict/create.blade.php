@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Recipe</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ route('subdistricts.index') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>['subdistricts.store'],'method'=>'post','files'=>true]) }}
						<div class="form-group">
							<label>User ID</label>
							<select class="form-control select2" name="user_id" required>
								<option>--select--</option>
								@foreach ($cities as $citi)
									<option value="{{ $citi->id }}">{{ $citi->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="name" placeholder="type something" required>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
</section>
@endsection
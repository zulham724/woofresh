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
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('recipes') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>['recipes.update',$recipe->id],'method'=>'patch']) }}
						<div class="form-group">
							<label>User ID</label>
							<select class="form-control select2" name="user_id" required>
								<option>--select--</option>
								@foreach ($users as $u => $user)
									<option value="{{ $user->id }}" {{ $recipe->user_id == $user->id ? 'selected': null }}>{{ $user->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" value="{{ $recipe->name }}" name="name" placeholder="type something" required>
						</div>
						<div class="form-group">
							<label>Description</label>
							<input type="text" class="form-control" value="{{ $recipe->description }}" name="description" placeholder="type something">
						</div>
						<div class="form-group">
							<label>Difficulty Level</label>
							<select class="form-control rating" name="difficulty_level">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
						<div class="form-group">
							<label>Preparation Time</label>
							<input type="number" class="form-control" value="{{ $recipe->preparation_time}}" name="preparation_time" placeholder="How long ?"><p>Minutes</p>
						</div>
						<div class="form-group">
							<label>Portion per Serve</label>
							<input type="number" class="form-control" value="{{ $recipe->portion_per_serve }}" name="portion_per_serve" placeholder="How much ?">
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
@section('script')
<script type="text/javascript">
	$('.rating').barrating({
          theme: 'fontawesome-stars-o',
          initialRating:{!! $recipe->difficulty_level !!}
    });
</script>
@endsection
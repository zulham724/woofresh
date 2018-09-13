@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Components</h2>
  </div>
</div>

<section>
	
<div class="container">
	<div class="row">
		<div class="offset-3 col-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('components') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
					<h5 class="pull-right"> Fill the Form</h5>
				</div>
				<div class="card-body"> 
					{{ Form::open(['route'=>['components.update',$component->id],'method'=>'patch']) }}
						<div class="form-group">
						<label>Product</label>
						<select class="form-control select2" name="product_id">
							<option value="">Choose one</option>
							@foreach ($products as $p => $product)
							<option value="{{ $product->id }}" {{ $component->product_id == $product->id? 'selected': null}}>{{ $product->product_translations[0]->name }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label>Component List</label>
						<select class="form-control select2" name="component_list_id">
							<option value="">Choose one</option>
							@foreach ($componentlists as $cl => $componentlist)
							<option value="{{ $componentlist->id }}" {{ $component->component_list_id == $componentlist->id? 'selected': null}}>{{ $componentlist->name }}</option>
							@endforeach
						</select>
					</div>  
					<div class="form-group">
							<label>Unit</label>
							<input type="text" class="form-control" name="unit" placeholder="type something" value="{{ $component->unit }}"required> 
						</div> 
						<div class="form-group">
							<label>Value</label>
							<input type="number" class="form-control" name="value" placeholder="type something" value="{{ $component->value }}" required> 
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
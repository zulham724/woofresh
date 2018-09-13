@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Subdistrict</h2>
  </div>
</div>

<section>
    
<div class="container">
    <div class="row">
        <div class="offset-3 col-6">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('subdistricts') }}" type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"> </i> Back</a>
                    <h5 class="pull-right"> Fill the Form</h5>
                </div>
                <div class="card-body"> 
                   {{ Form::open(['route'=>['subdistricts.update',$subdistrict->id],'method'=>'patch']) }}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="type something" value="{{ $subdistrict->name }}" required> 
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description" placeholder="type something" value="{{ $subdistrict->description }}"> 
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
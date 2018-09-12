@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Recipe</h2>
  </div>
</div>

<section>
  
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-flag"></i> Recipe List
            <a href="{{ route('recipeimages.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
            <a href="{{ route('recipeimages.index') }}" type="button" class="btn btn-secondary pull-right"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Recipe ID</td>
                            <td>Image</td>
                            <td>Description</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($recipeimages as $ri => $recipeimage)
                           <tr>
                               <td>{{ $ri+1 }}</td>
                               <td>{{ $recipeimage->recipe->name }}</td>
                               <td>
                                <img src="{{ asset('storage/'.$recipeimage->image) }}" class="rounded mx-auto d-block" width="150">
                               </td>
                               <td>{{ $recipeimage->description }}</td>
                               <td>
                                    <a type="button" class="btn btn-warning" href="{{ route('recipeimages.edit',$recipeimage->id) }}"><i class="fa fa-gear"></i> Edit</a>
                                  <button type="button" class="btn btn-danger" onclick="destroy({{$recipeimage->id}})"><i class="fa fa-trash"></i> Delete</button> 
                               </td>
                           </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>   
        </div>
    </div>
</div>
  
</section>

@endsection

@section('script')
<script type="text/javascript">
    $(()=>{
        console.log("recipeimage page");
    });

    const destroy = (id)=>{
        swal({
            title:"Are you sure?",
            text:"You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(result=>{
            if(result.value){
                let access = {
                    id:id,
                    _method:'delete',
                    _token:"{{csrf_token()}}"
                }
                $.post("recipeimages/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Okay",
                        text:"You deleted language",
                        type:"success",
                    }).then(result=>{
                       window.location = "{{ url('recipeimages') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>
@endsection
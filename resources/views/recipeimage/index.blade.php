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
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($recipeimages as $ri => $recipeimage)
                           <tr>
                               <td>{{ $ri+1 }}</td>
                               <td>{{ $recipe->user->recipe_id }}</td>
                               <td>{{ $recipe->name }}</td>
                               <td>{{ $recipe->description }}</td>
                               <td>
                                  <button type="button" class="btn btn-danger" onclick="destroy({{$recipe->id}})"><i class="fa fa-trash"></i> Delete</button> 
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
        $.each({!! $recipes !!},(key,val)=>{
          $("#recipe_rating"+val.id).barrating({
            theme: 'fontawesome-stars-o',
            initialRating:2,
            readonly:true
          });
        });
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
                $.post("recipes/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Okay",
                        text:"You deleted language",
                        type:"success",
                    }).then(result=>{
                        window.location.reload();
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>
@endsection
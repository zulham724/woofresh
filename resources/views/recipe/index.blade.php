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
            <a href="{{ route('recipes.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
            <a href="{{ route('recipes.index') }}" type="button" class="btn btn-secondary pull-right"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Creator</td>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Difficulty Level</td>
                            <td>Preparation Time</td>
                            <td>Portion per Serve</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($recipes as $r => $recipe)
                           <tr>
                               <td>{{ $r+1 }}</td>
                               <td>{{ $recipe->user->name }}</td>
                               <td>{{ $recipe->name }}</td>
                               <td>{{ $recipe->description }}</td>
                               <td>
                                 <select id="recipe_rating{{ $recipe->id }}">
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                                   <option value="3">3</option>
                                   <option value="4">4</option>
                                   <option value="5">5</option>
                                 </select>
                               </td>
                               <td>{{ $recipe->preparation_time }} Minutes</td>
                               <td>{{ $recipe->portion_per_serve }} pcs</td>
                               <td>
                                  <a href="{{ route('recipes.edit',$recipe->id) }}" type="button" class="btn btn-info" ><i class="fa fa-pencil"></i>Edit</a>
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
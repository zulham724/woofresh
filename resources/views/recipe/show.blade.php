@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Ingredients</h2>
  </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-flag"></i> Ingredients List
            <a href="{{ route('ingredients.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
            <a href="{{ route('ingredients.index') }}" type="button" class="btn btn-secondary pull-right"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Recipe</td>
                            <td>Product</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($recipe['ingredients'] as $i => $ingredient)
                           <tr>
                               <td>{{ $i+1 }}</td>
                               <td>{{ $ingredient->recipe->name }}</td>
                               <td>{{ $ingredient->product->name }}</td>
                               <td>
                                   <button type="button" class="btn btn-danger" onclick="destroy({{$ingredient->id}})"><i class="fa fa-trash"></i> Delete</button>
                               </td>
                           </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>   
        </div>
    </div>
</div>

@endsection


@section('script')
<script type="text/javascript">
  const destroy = (id)=>{
        swal({
            type:"warning",
            title:"Are you sure?",
            text:"You won't be able to revert this!",
            showCancelButton:true,
            cancelButtonColor:"#d33",
            confirmButtonText:"Yes, delete it!",
            confirmButtonColor:"#3085d6"
        }).then(result=>{
            if(result.value){
                let access = {
                    id:id,
                    _method:"delete",
                    _token:"{{ csrf_token() }}"
                }

                $.post("ingredients/"+id,access)
                .done(res=>{
                    swal({
                        title:"Okay!",
                        text:"You deleted data",
                        type:"success"
                    }).then(result=>{
                        window.location.reload();
                    });
                })
                .fail(err=>{
                     console.log(err);
                });
            }
        });
    }
</script>
@endsection
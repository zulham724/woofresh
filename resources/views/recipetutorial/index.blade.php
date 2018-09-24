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
            <a href="{{ route('recipetutorials.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
            <a href="{{ route('recipetutorials.index') }}" type="button" class="btn btn-secondary pull-right"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Recipe ID</td>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($recipetutorials as $rt => $recipetutorial)
                           <tr>
                               <td>{{ $rt+1 }}</td>
                               <td>{{ $recipetutorial->recipe->name }}</td>
                               <td>{{ $recipetutorial->name }}</td>
                               <td>{{ $recipetutorial->description }}</td>
                               <td>
                                    <a type="button" class="btn btn-warning" href="{{ route('recipetutorials.edit',$recipetutorial->id) }}"><i class="fa fa-gear"></i> Edit</a>
                                  <button type="button" class="btn btn-danger" onclick="destroy({{$recipetutorial->id}})"><i class="fa fa-trash"></i> Delete</button> 
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
        console.log("recipetutorial page");
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
                $.post("recipetutorials/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Okay",
                        text:"You deleted language",
                        type:"success",
                    }).then(result=>{
                       window.location = "{{ url('recipetutorials') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>
@endsection
@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">ComponentLists</h2>
  </div>
</div>

<section>
    
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Component List
    		<a href="{{ route('componentlists.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
            <a href="{{ url('cities') }}" type="button" class="btn btn-secondary pull-right"><i class="fa fa-arrow-left"> </i> Back</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped datatable">
    				<thead>
    					<tr>
    						<td>ID</td>
    						<td>Name</td>
    						<td>Description</td>
    						<td>Action</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($componentlists as $st => $componentlist)
    					<tr>
							<td>{{ $st+1 }}</td>
							<td>{{ $componentlist->name }}</td>
							<td>{{ $componentlist->description }}</td>
							<td>
                                <button type="submit" class="btn btn-danger" onclick="destroy({{$componentlist->id}})"><i class="fa fa-trash"></i> Delete</button>
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

                $.post("{{ url('componentlists') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Okay!",
                        text:"You deleted product",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('componentlists') }}";
                    });
                })
                .fail(err=>{
                    // console.log(err);
                    swal("Oops","Something not right","error");
                });
            }
        });
    }
</script>
@endsection
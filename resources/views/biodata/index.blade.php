@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Users</h2>
  </div>
</div>
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Users List
    		<a href="{{ route('users.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped datatable">
    				<thead>
    					<tr>
    						<td>No</td>
    						<td>First Name</td>
    						<td>Last Name</td>
                            <td>Address</td>
                            <td>Phone Number</td>
    						<td>Action</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($biodatas as $l => $biodata)
    					<tr>
							<td>{{ $l+1 }}</td>
							<td>{{ $biodata->first_name }}</td>
							<td>{{ $biodata->last_name }}</td>
                            <td>{{ $biodata->address }}</td>
                            <td>{{ $biodata->phone_number }}</td>
							<td><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></td>
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
    $(()=>{
        console.log("user page");
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
                $.post("{{ url('users') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Okay",
                        text:"You deleted language",
                        type:"success",
                    }).then(result=>{
                        window.location = "{{ url('users') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>
@endsection
@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Vouchers</h2>
  </div>
</div>
<section>
    
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Vouchers List
    		<a href="{{ route('vouchers.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped">
    				<thead>
    					<tr>
    						<td>No</td>
                            <td>Name</td>
                            <td>Image</td>
                            <td>Code</td>
                            <td>Description</td>
                            <td>Value</td>
                            <td>Percent</td>
    						<td>Action</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($vouchers as $v => $voucher)
    					<tr>
							<td>{{ $v+1 }}</td>
                            <td>{{ $voucher->name }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$voucher->image) }}" class="rounded mx-auto d-block" width="150">
                            </td>
                            <td>{{ $voucher->code }}</td>
                            <td>{{ $voucher->description }}</td>
                            <td>{{ $voucher->value }}</td>
                            <td>{{ $voucher->percent }}</td>
							<td>
                                <a type="button" class="btn btn-warning" href="{{ route('vouchers.edit',$voucher->id) }}"><i class="fa fa-gear"></i> Edit</a>
                                <button type="button" class="btn btn-danger" onclick="destroy({{$voucher->id}})"><i class="fa fa-trash"></i> Delete</button>
                               
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
        console.log("voucher page");
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
                $.post("{{ url('vouchers') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Okay",
                        text:"You deleted language",
                        type:"success",
                    }).then(result=>{
                        window.location = "{{ url('vouchers') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>
@endsection
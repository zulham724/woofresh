@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Product Sale</h2>
  </div>
</div>

<section>
    
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Product Sale List
    		<a href="{{ route('productsales.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped datatable">
    				<thead>
    					<tr>
    						<td>No</td>
                            <td>Product </td>
                             <td>City </td>
                            <td>State </td>
                            <td>Subdistrict </td>
    						<td>Quantity</td>
    						<td>Stock</td>
                            <td>Price</td>
    						<td>Discount</td>
    						<td>Action</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($productsales as $l => $productsale)
    					<tr>
							<td>{{ $l+1 }}</td>
                            <td>{{ $productsale->product->name}}</td>
                            <td>{{ $productsale->city->name}}</td>
                            <td>{{ $productsale->state->name }}</td>
                            <td>{{ $productsale->subdistrict->name }}</td>
                            <td>{{ $productsale->quantity}}</td>
                            <td>{{ $productsale->stock}}</td>
							<td>{{ $productsale->price }}</td>
							<td>{{ $productsale->discount }}</td>
							<td>
                                <button type="submit" class="btn btn-danger" onclick="destroy({{$productsale->id}})"><i class="fa fa-trash"></i> Delete</button>
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

                $.post("{{ url('productsales') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Okay!",
                        text:"You deleted productsale",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('productsales') }}";
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
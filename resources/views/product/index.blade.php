@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Product</h2>
  </div>
</div>

<section>
    
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> All Product List
    		<a href="{{ route('products.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped datatable">
    				<thead>
    					<tr>
    						<td>No</td>
                            <td>Supplier</td>
                            <td>Group</td>
                            <td>Category</td>
                            <td>Sub Category</td>
                            <td>Name</td>
                            <td>Description</td>
    						<td>Quantity</td>
    						<td>Price</td>
    						<td>Stock</td>
    						<td>Weight</td>
                            <td>Unit</td>
                            <td>Discount</td>
                            <td>Badge</td>
                            <td>Available Language</td>
    						<td>Is Available?</td>
    						<td>Action</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($products as $l => $product)
    					<tr>
							<td>{{ $l+1 }}</td>
                            <td>{{ $product->supplier->name }}</td>
                            <td>{{ $product->group_id }}</td>
                            <td>{{ $product->category_id }}</td>
                            <td>{{ $product->sub_category_id }}</td>
                            <td>{{ $product->name}}</td>
                            <td>{{ $product->description}}</td>
							<td>{{ $product->quantity }}</td>
							<td>{{ $product->price }}</td>
							<td>{{ $product->stock }}</td>
							<td>{{ $product->weight }}</td>
                            <td>{{ $product->unit }}</td>
                            <td>{{ $product->discount }}</td>
                            <td>{{ $product->badge }}</td>
                            <td>
                                @foreach ($product['product_translations'] as $product_translation)
                                    <img src="{{ asset('storage/'.$product_translation->language->image) }}" class="img-responsive" width="30">
                                @endforeach
                            </td>
							<td>{{ $product->is_available == 0 ? 'Not available' : 'Available' }}</td>
							<td>
                                <button type="submit" class="btn btn-danger" onclick="destroy({{$product->id}})"><i class="fa fa-trash"></i> Delete</button>
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

                $.post("{{ url('products') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Okay!",
                        text:"You deleted product",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('products') }}";
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
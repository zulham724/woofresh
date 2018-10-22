@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Produk</h2>
  </div>
</div>

<section>
    
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Data Semua Produk
    		<a href="{{ route('products.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped datatable">
    				<thead>
    					<tr>
    						<td>No</td>
                            <td>Pemasok</td>
                            <td>Grup</td>
                            <td>Kategori</td>
                            <td>Sub Kategori</td>
                            <td>Nama</td>
    						<td>Kuantitas</td>
    						<td>Berat</td>
                            <td>Satuan</td>
                            <td>Badge</td>
                            <td>Bahasa Yang Tersedia</td>
    						<td>Action</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($products as $l => $product)
    					<tr>
							<td>{{ $l+1 }}</td>
                            <td>{{ $product->supplier->name }}</td>
                            <td>{{ $product->group->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->sub_category->name }}</td>
                            <td>{{ $product->product_translations[0]->name }}</td>
							<td>{{ $product->quantity }}</td>
							<td>{{ $product->weight }}</td>
                            <td>{{ $product->unit }}</td>
                            <td>{{ $product->badge }}</td>
                            <td>
                                @foreach ($product['product_translations'] as $product_translation)
                                    <img src="{{ asset('storage/'.$product_translation->language->image) }}" class="img-responsive" width="30">
                                @endforeach
                            </td>
							<td>
                                <a href="{{ route('products.edit',$product->id) }}" type="button" class="btn btn-secondary" ><i class="fa fa-pencil"></i>Edit</a>
                                <button type="submit" class="btn btn-danger" onclick="destroy({{$product->id}})"><i class="fa fa-trash"></i> Hapus</button>
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
            title:"Apakah Anda Yakin?",
            text:"Anda Tidak Akan Dapat Mengembalikan Data Ini!",
            showCancelButton:true,
            cancelButtonText: "Batal",
            cancelButtonColor:"#d33",
            confirmButtonText:"Ya, Saya Yakin!",
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
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('products') }}";
                    });
                })
                .fail(err=>{
                    // console.log(err);
                    swal("Oops","Ada Sesuatu Yang Tidak Beres","error");
                });
            }
        });
    }
</script>
@endsection
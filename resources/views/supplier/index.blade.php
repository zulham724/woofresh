@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Pemasok</h2>
  </div>
</div>

<section>
    
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Data Pemasok
    		<a href="{{ route('suppliers.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped datatable">
    				<thead>
    					<tr>
    						<td>No</td>
    						<td>Nama</td>
    						<td>Deskripsi</td>
    						<td>Nama Depan</td>
    						<td>Nama Belakang</td>
    						<td>Judul</td>
                            <td>Alamat</td>
                            <td>Email</td>
                            <td>No Telepon</td>
    						<td>Aksi</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($suppliers as $l => $supplier)
    					<tr>
							<td>{{ $l+1 }}</td>
							<td>{{ $supplier->name }}</td>
							<td>{{ $supplier->description }}</td>
							<td>{{ $supplier->contact_first_name }}</td>
							<td>{{ $supplier->contact_last_name }}</td>
							<td>{{ $supplier->contact_title }}</td>                            
                            <td>{{ $supplier->address_detail }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->phone_number }}</td>
							<td>
                            <a type="button" class="btn btn-warning" href="{{ route('suppliers.edit',$supplier->id) }}"><i class="fa fa-gear"></i> Edit</a>
                                <button type="submit" class="btn btn-danger"  onclick="destroy({{$supplier->id}})"><i class="fa fa-trash"></i> Hapus</button></td>
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

                $.post("{{ url('suppliers') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('suppliers') }}";
                    });
                })
                .fail(err=>{
                    // console.log(err);
                    swal("Oops","Ada Sesuatu yang Tidak Beres","error");
                });
            }
        });
    }
</script>
@endsection
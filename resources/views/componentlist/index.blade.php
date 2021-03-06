@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Daftar Komponen</h2>
  </div>
</div>

<section>
    
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Data Daftar Komponen
    		<a href="{{ route('componentlists.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
            <a href="{{ url('cities') }}" type="button" class="btn btn-secondary pull-right"><i class="fa fa-arrow-left"> </i> Kembali</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped datatable">
    				<thead>
    					<tr>
    						<td>ID</td>
    						<td>Nama</td>
    						<td>Deskripsi</td>
    						<td>Aksi</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($componentlists as $st => $componentlist)
    					<tr>
							<td>{{ $st+1 }}</td>
							<td>{{ $componentlist->name }}</td>
							<td>{{ $componentlist->description }}</td>
							<td>
                                <a href="{{ route('componentlists.edit',$componentlist->id) }}" type="button" class="btn btn-secondary" ><i class="fa fa-pencil"></i>Edit</a>
                                <button type="submit" class="btn btn-danger" onclick="destroy({{$componentlist->id}})"><i class="fa fa-trash"></i> Hapus</button>
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
            title:"Apakah anda Yakin?",
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

                $.post("{{ url('componentlists') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Mengahapus Data",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('componentlists') }}";
                    });
                })
                .fail(err=>{
                    // console.log(err);
                    swal("Oops","Ada sesuatu Yang tidak beres","error");
                });
            }
        });
    }
</script>
@endsection
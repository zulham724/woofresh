@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Negara</h2>
  </div>
</div>

<section>
    
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Data Negara
    		<a href="{{ route('states.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
            <a href="{{ url('cities') }}" type="button" class="btn btn-secondary pull-right"><i class="fa fa-arrow-left"> </i> Kembali</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped datatable">
    				<thead>
    					<tr>
    						<td>No</td>
    						<td>Nama</td>
    						<td>Deskripsi</td>
    						<td>Aksi</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($states as $st => $state)
    					<tr>
							<td>{{ $st+1 }}</td>
							<td>{{ $state->name }}</td>
							<td>{{ $state->description }}</td>
                             <td><a href="{{ route('states.edit',$state->id) }}" type="button" class="btn btn-secondary" ><i class="fa fa-pencil"></i>Edit</a>
                                <button type="submit" class="btn btn-danger" onclick="destroy({{$state->id}})"><i class="fa fa-trash"></i> Hapus</button>
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

                $.post("{{ url('states') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('states') }}";
                    });
                })
                .fail(err=>{
                    // console.log(err);
                    swal("Oops","Ada Sesuatu Yang Tidak beres","error");
                });
            }
        });
    }
</script>
@endsection
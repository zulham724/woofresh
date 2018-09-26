@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Pengguna</h2>
  </div>
</div>
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Daftar Pengguna
    		<a href="{{ route('users.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped datatable">
    				<thead>
    					<tr>
    						<td>No</td>
    						<td>Nama Depan</td>
    						<td>Nama Belakang</td>
                            <td>Alamat</td>
                            <td>No Telepon</td>
    						<td>Aksi</td>
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
							<td><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></td>
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
            title:"Apakah Anda Yakin?",
            text:"Anda Tidak Akan Dapat Mengembalikan Data Ini!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Saya Yakin!'
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
                        title:"Berhasil",
                        text:"Anda Menghapus Data",
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
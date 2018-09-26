@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Pngguna</h2>
  </div>
</div>
<section>
    
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Data Pengguna
    		<a href="{{ route('users.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped datatable">
    				<thead>
    					<tr>
    						<td>No</td>
                            <td>Role</td>
                            <td>Avatar</td>
                            <td>Nama</td>
                            <td>Email</td>
    						<td>Aksi</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($users as $u => $user)
    					<tr>
							<td>{{ $u+1 }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>
                                <img src="{{ asset($user->avatar == null ? 'storage/uploads/avatars/default.png' : 'storage/'.$user->avatar) }}" class="rounded mx-auto d-block" width="150">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
							<td>
                                <div class="btn-group-vertical">
                                    <button type="button" class="btn btn-danger" onclick="destroy({{$user->id}})"><i class="fa fa-trash"></i> Hapus</button>
                                <a href="{{ route('users.transaction',$user->id) }}" type="button" class="btn btn-primary"><i class="fa fa-folder"></i> Tampil Transaksi</a>
                                <a href="{{ route('users.recipe',$user->id) }}" type="button" class="btn btn-info"><i class="fa fa-folder"></i> Tampil Resp</a>
                                <a href="{{ route('users.edit',$user->id) }}" type="button" class="btn btn-warning" ><i class="fa fa-gear"></i> Edit</a>
                                </div>
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
        console.log("user page");
    });

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
                    _method:'delete',
                    _token:"{{csrf_token()}}"
                }
                $.post("{{ url('users') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success"
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
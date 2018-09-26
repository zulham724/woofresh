@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Voucher</h2>
  </div>
</div>
<section>
    
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Data Voucher
    		<a href="{{ route('vouchers.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped datatable">
    				<thead>
    					<tr>
    						<td>No</td>
                            <td>Nama</td>
                            <td>Gambar</td>
                            <td>Kode</td>
                            <td>Deskripsi</td>
                            <td>Nilai</td>
                            <td>Persen</td>
    						<td>Aksi</td>
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
                                <button type="button" class="btn btn-danger" onclick="destroy({{$voucher->id}})"><i class="fa fa-trash"></i> Hapus</button>
                               
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
                $.post("{{ url('vouchers') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success"
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
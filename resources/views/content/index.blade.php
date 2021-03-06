@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Konten</h2>
  </div>
</div>
<section>

<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Data Konten
    		<a href="{{ route('contents.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table id="table_id" class="table table-striped custom">
    				<thead>
    					<tr>
    						<td>No</td>
    						<td>Kategori</td>
                            <td>Nama</td>
                            <td>Gambar</td>
                            <td>Bahasa yang Tersedia</td>
    						<td>Aksi</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($contents as $c => $content)
						<tr>
							<td>{{ $c+1 }}</td>
                            <td>{{ $content->content_list->name }}</td>
                            <td>{{ $content->name }}</td>
                            <td><img src="{{ $content->image ? asset('storage/'.$content->image) : asset('img/blank.png') }}" class="img-responsive" width="100"></td>
                            <td>
                                @foreach ($content['content_translations'] as $content_translation)
                                    <img src="{{ asset('storage/'.$content_translation->language->image) }}" class="img-responsive" width="30">
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('contents.edit',$content->id) }}" type="button" class="btn btn-warning"><i class="fa fa-gear"></i> Tampilkan/Edit</a>
                                <button type="button" class="btn btn-danger" onclick="destroy({{$content->id}})"><i class="fa fa-trash"></i> Hapus</button>
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
            title:"Apakaha Anda Yakin?",
            text:"Anda Tidak Akan Dapat Mengembalikan Data Ini!",
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: "Batal",
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
                $.post("{{ url('contents') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Berhasil",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success",
                    }).then(result=>{
                        window.location = "{{ url('contents') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

    $(()=>{
        $('.custom').DataTable({
        });
    });
</script>
@endsection
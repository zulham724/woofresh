@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Sub Kategori</h2>
  </div>
</div>

<section>
    
<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Data Sub Kategori
    		<a href="{{ route('subcategories.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped datatable">
    				<thead>
    					<tr>
    						<td>No</td>
    						<td>Id Grup</td>
    						<td>Nama</td>
                            <td>Gambar</td>
                            <td>Bahasa yang Tersedia</td>
    						<td>Aksi</td>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($subcategories as $sc => $subcategory)
    					<tr>
							<td>{{ $sc+1 }}</td>
							<td>{{ $subcategory->category->name }}</td>
							<td>{{ $subcategory->name }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$subcategory->image) }}" width="50">
                            </td>
                            <td>
                                @foreach ($subcategory['sub_category_translations'] as $sub_category_translation)
                                    <img src="{{ asset('storage/'.$sub_category_translation->language->image) }}" class="img-responsive" width="30">
                                @endforeach                                
                            </td>
							<td>
                            <a type="button" class="btn btn-warning" href="{{ route('subcategories.edit',$subcategory->id) }}"><i class="fa fa-gear"></i> Edit</a>
                                <button type="submit" class="btn btn-danger" onclick="destroy({{$subcategory->id}})"><i class="fa fa-trash"></i> Hapus</button></td>
						</tr>
						@endforeach
    				</tbody>
    			</table>
                <small><a href="{{ url('groups') }}">Klik Disini</a> untuk data grup, dan <a href="{{ url('categories') }}">klik ini</a> untuk data kategori</small>
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

                $.post("{{ url('subcategories') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('subcategories') }}";
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
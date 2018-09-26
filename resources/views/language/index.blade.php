@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Bahasa</h2>
  </div>
</div>

<section>
    
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-flag"></i> Data Bahasa
            <a href="{{ route('languages.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Kode Bahasa</td>
                            <td>Gambar</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($languages as $l => $language)
                           <tr>
                               <td>{{ $l+1 }}</td>
                               <td>{{ $language->name }}</td>
                               <td><img src="{{ asset('storage/'.$language->image) }}" class="img-responsive" width="30"></td>
                               <td>
                                   <a type="button" class="btn btn-primary" href="{{ route('languages.show',$language->id) }}"><i class="fa fa-search"></i> Tampilkan</a>
                                   <a type="button" class="btn btn-info" href="{{ route('languages.edit',$language->id) }}"><i class="fa fa-gear"></i> Edit</a>
                                   <button type="button" class="btn btn-danger" onclick="destroy({{$language->id}})"><i class="fa fa-trash"></i> Hapus</button>
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
        console.log("language page");
    });

    const destroy = (id)=>{
        swal({
            title:"Apakah Anda Yakin?",
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
                $.post("{{ url('languages') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success",
                    }).then(result=>{
                        window.location = "{{ url('languages') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>
@endsection
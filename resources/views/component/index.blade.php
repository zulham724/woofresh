@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Komponen</h2>
  </div>
</div>
  <section>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-flag"></i> Komponen
            <a href="{{ route('components.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
            <a href="{{ route('components.index') }}" type="button" class="btn btn-secondary pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Produk</td>
                            <td>Daftar Komponen</td>
                            <td>Satuan</td>
                            <td>Nilai</td>
                            <td>Aksi</td>
                          </tr>
                    </thead>
                    <tbody>
                      @foreach ($components as $i => $component)
                           <tr>
                               <td>{{ $i+1 }}</td>
                               <td>{{ $component->product->product_translations[0]->name }}</td>
                               <td>{{ $component->component_list->name }}</td>
                               <td>{{ $component->unit }}</td>
                               <td>{{ $component->value }}</td>
                               <td>
                                <a type="button" class="btn btn-secondary" href="{{ route('components.edit',$component->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                <button type="submit" class="btn btn-danger" onclick="destroy({{$component->id}})"><i class="fa fa-trash"></i> Hapus</button>
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

                $.post("components/"+id,access)
                .done(res=>{
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Mengahapus Data",
                        type:"success"
                    }).then(result=>{
                        window.location.reload();
                    });
                })
                .fail(err=>{
                     console.log(err);
                });
            }
        });
    }
</script>
@endsection
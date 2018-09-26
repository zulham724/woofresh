@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Bahan</h2>
  </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-flag"></i> Data Bahan
            <a href="{{ route('ingredients.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
            <a href="{{ route('ingredients.index') }}" type="button" class="btn btn-secondary pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Resep</td>
                            <td>Produk</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($recipe['ingredients'] as $i => $ingredient)
                           <tr>
                               <td>{{ $i+1 }}</td>
                               <td>{{ $ingredient->recipe->name }}</td>
                               <td>{{ $ingredient->product->product_translations[0]->name }}</td>
                               <td>
                                   <button type="button" class="btn btn-danger" onclick="destroy({{$ingredient->id}})"><i class="fa fa-trash"></i> Hapus</button>
                               </td>
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

                $.post("ingredients/"+id,access)
                .done(res=>{
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
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
@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Gambar Produk</h2>
  </div>
</div>

<section>
  
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-flag"></i> Data Gambar Produk
            <a href="{{ route('productimages.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
            <a href="{{ route('productimages.index') }}" type="button" class="btn btn-secondary pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>ID Produk</td>
                            <td>Gambar</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($productimages as $pi => $productimage)
                           <tr>
                               <td>{{ $pi+1 }}</td>
                               <td>{{ $productimage->product->product_translations[0]->name }}</td>
                               <td>
                                <img src="{{ asset('storage/'.$productimage->image) }}" class="rounded mx-auto d-block" width="150">
                               </td>
                               <td>
                                  <button type="button" class="btn btn-danger" onclick="destroy({{$productimage->id}})"><i class="fa fa-trash"></i> Hapus</button> 
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
                $.post("productimages/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Berhasil",
                        text:"Anda Berhasil menghapus Data",
                        type:"success",
                    }).then(result=>{
                        window.location.reload();
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>
@endsection
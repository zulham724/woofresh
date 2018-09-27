@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Resep</h2>
  </div>
</div>

<section>
  
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-flag"></i> Data Resep
            <a href="{{ route('recipes.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
            <a href="{{ route('users.index') }}" type="button" class="btn btn-secondary pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Penulis</td>
                            <td>Nama</td>
                            <td>Deskripsi</td>
                            <td>Tutorial</td>
                            <td>Tingkat kesulitan</td>
                            <td>Waktu Persiapan</td>
                            <td>Porsi per Penyajian</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($user['recipes'] as $r => $recipe)
                           <tr>
                               <td>{{ $r+1 }}</td>
                               <td>{{ $recipe->user->name }}</td>
                               <td>{{ $recipe->name }}</td>
                               <td>{{ $recipe->description }}</td>
                               <td>{{ $recipe->tutorial }}</td>
                               <td>
                                 <select id="recipe_rating{{ $recipe->id }}">
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                                   <option value="3">3</option>
                                   <option value="4">4</option>
                                   <option value="5">5</option>
                                 </select>
                               </td>
                               <td>{{ $recipe->preparation_time }} Menit</td>
                               <td>{{ $recipe->portion_per_serve }} pcs</td>
                               <td>
                                 <div class="btn-group-vertical">
                                  <a href="{{ route('recipes.show',$recipe->id) }}" type="button" class="btn btn-info" ><i class="fa fa-folder"></i> Tampil Bahan</a>
                                  <a href="{{ route('recipes.edit',$recipe->id) }}" type="button" class="btn btn-info" ><i class="fa fa-pencil"></i>Edit</a>
                                  <button type="button" class="btn btn-danger" onclick="destroy({{$recipe->id}})"><i class="fa fa-trash"></i> Hapus</button>
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
                $.post("recipes/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success"
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
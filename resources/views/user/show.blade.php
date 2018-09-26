@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Transaksi</h2>
  </div>
</div>

<section>
    
<div class="container-fluid">
    <div class="card">
         <div class="card-header">
            <i class="fa fa-flag"></i> Data Transaksi
            <a href="{{ route('users.index') }}" type="button" class="btn btn-secondary pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>No Transaksi</td>
                            <td>Jenis Pembayaran</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users ['transactions'] as $t => $transaction)
                            <tr>
                                <td>{{ $t+1 }}</td>
                                <td>{{ $transaction->transaction_number }}</td>
                                <td>{{ $transaction->payment_type }}</td>
                                <td>
                                    <a href="{{ route('transactions.edit',$transaction->id) }}" type="button" class="btn btn-info" ><i class="fa fa-pencil"></i>Edit</a>
                                    <button type="button" class="btn btn-danger" onclick="destroy({{ $transaction->id }})"><i class="fa fa-trash"></i> Hapus</button>
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
                $.post("transactions/"+id,access)
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
@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Pesanan</h2>
  </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-flag"></i> Data Pesanan
            <a href="{{ route('orders.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
            <a href="{{ route('orders.index') }}" type="button" class="btn btn-secondary pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Transaksi</td>
                            <td>Produk</td>
                            <td>Kuantitas</td>
                            <td>Sub Total Harga</td>
                            <td>Diskon</td>
                            <td>Pengiriman</td>
                            <td>Total</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($transaction['orders'] as $o => $order)
                           <tr>
                               <td>{{ $o+1 }}</td>
                               <td>{{ $order->transaction->transaction_number }}</td>
                               <td>{{ $order->product->name }}</td>
                               <td>{{ $order->quantity }}</td>
                               <td>{{ $order->subtotal_price }}</td>
                               <td>{{ $order->discount }}</td>
                               <td>{{ $order->delivery_fee }}</td>
                               <td>{{ $order->total }}</td>
                               <td>
                                   <button type="button" class="btn btn-danger" onclick="destroy({{$order->id}})"><i class="fa fa-trash"></i> Hapus</button>
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

                $.post("orders/"+id,access)
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
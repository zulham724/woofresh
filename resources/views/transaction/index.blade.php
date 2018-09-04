@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Transaction</h2>
  </div>
</div>

<section>
    
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-flag"></i> Transaction List
            <a href="{{ route('transactions.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Transaction number</td>
                            <td>Payment type</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $t => $transaction)
                            <tr>
                                <td>{{ $t+1 }}</td>
                                <td>{{ $transaction->transaction_number }}</td>
                                <td>{{ $transaction->payment_type }}</td>
                                <td>
                                    <a href="{{ route('transactions.show',$transaction->id) }}" type="button" class="btn btn-info" ><i class="fa fa-folder"></i> Show Orders</a>
                                    <a href="{{ route('transactions.edit',$transaction->id) }}" type="button" class="btn btn-secondary" ><i class="fa fa-pencil"></i>Edit</a>
                                    <button type="button" class="btn btn-danger" onclick="destroy({{ $transaction->id }})"><i class="fa fa-trash"></i> Delete</button>
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
            title:"Are you sure?",
            text:"You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
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
                        title:"Okay",
                        text:"You deleted transaction",
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
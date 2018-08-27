@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Transaction</h2>
  </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-flag"></i> Transaction List
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>User</td>
                            <td>Transaction number</td>
                            <td>Payment type</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $t => $transaction)
                            <tr>
                                <td>{{ $t+1 }}</td>
                                <td>{{ $transaction->user->name }}</td>
                                <td>{{ $transaction->trasaction_number }}</td>
                                <td>{{ $transaction->payment_type }}</td>
                                <td>{{ $transaction->status }}</td>
                                <td>
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
                $.post("{{ url('transactions') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Okay",
                        text:"You deleted transaction",
                        type:"success",
                    }).then(result=>{
                        window.location = "{{ url('transactions') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>
@endsection
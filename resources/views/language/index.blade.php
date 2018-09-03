@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Language</h2>
  </div>
</div>

<section>
    
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-flag"></i> Language List
            <a href="{{ route('languages.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Language code</td>
                            <td>image</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($languages as $l => $language)
                           <tr>
                               <td>{{ $l+1 }}</td>
                               <td>{{ $language->name }}</td>
                               <td><img src="{{ asset('storage/'.$language->image) }}" class="img-responsive" width="30"></td>
                               <td>
                                   <a type="button" class="btn btn-info" href="{{ route('languages.edit',$language->id) }}"><i class="fa fa-gear"></i> Edit</a>
                                   <button type="button" class="btn btn-danger" onclick="destroy({{$language->id}})"><i class="fa fa-trash"></i> Delete</button>
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
                $.post("{{ url('languages') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Okay",
                        text:"You deleted language",
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
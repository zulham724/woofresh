@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Categories</h2>
  </div>
</div>

<section>
    
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-flag"></i>Categories List
            <a href="{{ route('categories.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
            <a href="{{ url('subcategories') }}" type="button" class="btn btn-secondary pull-right"><i class="fa fa-arrow-left"> </i> Back</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Group Id</td>
                            <td>Name</td>
                            <td>Available Language</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $l => $category)
                        <tr>
                            <td>{{ $l+1 }}</td>
                            <td>{{ $category->group->name}}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @foreach ($category['category_translations'] as $category_translation)
                                    <img src="{{ asset('storage/'.$category_translation->language->image) }}" class="img-responsive" width="30">
                                @endforeach
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger"onclick="destroy({{$category->id}})"><i class="fa fa-trash"></i> Delete</button></td>
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
            title:"Are you sure?",
            text:"You won't be able to revert this!",
            showCancelButton:true,
            cancelButtonColor:"#d33",
            confirmButtonText:"Yes, delete it!",
            confirmButtonColor:"#3085d6"
        }).then(result=>{
            if(result.value){
                let access = {
                    id:id,
                    _method:"delete",
                    _token:"{{ csrf_token() }}"
                }

                $.post("{{ url('categories') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Okay!",
                        text:"You deleted data",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('categories') }}";
                    });
                })
                .fail(err=>{
                    // console.log(err);
                    swal("Oops","Something not right","error");
                });
            }
        });
    }
</script>
@endsection
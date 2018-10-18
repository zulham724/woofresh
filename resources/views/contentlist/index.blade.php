@extends('layouts.admin')
@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Konten</h2>
  </div>
</div>
<section>

<div class="container-fluid">
    <div class="card">
    	<div class="card-header">
    		<i class="fa fa-flag"></i> Data Konten
    		<a href="{{ route('contentlists.create') }}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-striped custom">
    				
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
            title:"Apakaha Anda Yakin?",
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
                $.post("{{ url('contentlists') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Berhasil",
                        text:"Anda Berhasil Menghapus Data",
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

    $(()=>{
        axios.get('/api/contentlists').then(res=>{
            let table = $('.custom').DataTable({
                data:res.data,
                columns:[
                    {data:'name',title:'nama'},
                    {data:'description',title:'description'},
                    {
                        data:null,
                        title:'action',
                        defaultContent:"\
                        <button class='btn btn-warning btn_edit'><i class='fa fa-pencil'></i> Edit</button>\
                        <button class='btn btn-danger btn_delete'><i class='fa fa-trash'></i> Hapus</button>\
                        "
                    }
                ]
            });

            //edit
            table.on('click','button.btn_edit', function(e){
                e.preventDefault();
                let data = table.row($(this).parents('tr')).data();
                window.location.href = "{{ url('contentlists') }}/"+data.id+"/edit";
            });

            // Delete a record
            table.on('click', 'button.btn_delete', function (e) {
                e.preventDefault();
                let data = table.row($(this).parents('tr')).data();
                destroy(data.id);
            });
        });
    });
</script>
@endsection
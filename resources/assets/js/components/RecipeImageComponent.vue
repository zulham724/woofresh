<template>
    <div>
        <div class="alert alert-info">
          <strong>Info!</strong> Tentukan Gambar-gambar Resep Anda.
          <button @click="add()" type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <div class="row">
            <div class="col-4" v-for="(recipeimage,ri) in recipeimages">
                <div class="card">
                    <div class="card-header">
                        Tentukan
                        <small>Gambar Resep</small>
                    </div>
                    <div class="card-body">
                        <input type="hidden" :name="'recipeimages['+ri+'][id]'" :value="recipeimage.id">
                        <img v-if="recipeimage.image" :src="'/storage/'+recipeimage.image" class="img img-rounded" width="100">
                        <div class="form-group">
                            <span v-model="recipeimage.image">Gambar: </span>
                            <input type="file" :name="'recipeimages['+ri+'][image]'" > 
                        </div>
                         <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea type="text" class="form-control" v-model="recipeimage.description" :name="'recipeimages['+ri+'][description]'" placeholder="type something"> </textarea>
                        </div>
                        <button type="button" class="btn btn-danger pull-right" @click="remove(ri,recipeimage.id)"><i class="fa fa-trash"></i> Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['edit_recipeimages'],
        data(){
            return{
                recipeimages:[{}]
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            this.edit_recipeimages ? this.recipeimages = this.edit_recipeimages : null;
            console.log("resep Gambar",this.recipeimages);
        },
        methods:{
            add(){
                this.recipeimages.push({});
            },
            remove(index,id){
                if(id){
                    axios.post('/api/recipeimages/'+id,{_method:'delete'}).then(res=>{
                        swal({
                            title:"Berhasil",
                            text:"Anda Berhasil Menghapus Data",
                            type:"success",
                        }).then(result=>{
                            this.recipeimages.splice(index,1);
                        });
                    });
                } else {
                    swal({
                        title:"Berhasil",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success",
                    }).then(result=>{
                        this.recipeimages.splice(index,1);
                    });
                }
            }
        }
    }
</script>

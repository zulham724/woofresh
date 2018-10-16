<template>
    <div>
        <div class="alert alert-info">
          <strong>Info!</strong> Tentukan Gambar-gambar Resep Anda.
          <button @click="add()" type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <div class="row">
            <div class="col-4" v-for="(recieimage,ri) in recipeimages">
                <div class="card">
                    <div class="card-header">
                        Tentukan
                        <small>Gambar Resep</small>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" placeholder="type something" :name="'recipeimages['+ri+'][image]'">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" placeholder="Type something" :name="'recipeimages['+ri+'][description]'"></textarea>
                        </div>
                        <button type="button" class="btn btn-danger pull-right" @click="remove(ri)"><i class="fa fa-trash"></i> Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                recipeimages:[{}]
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            
        },
        methods:{
            add(){
                this.recipeimages.push({});
            },
            remove(index){
                this.recipeimages.splice(index,1);
            }
        }
    }
</script>

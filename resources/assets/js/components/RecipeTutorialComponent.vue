<template>
    <div>
        <div class="alert alert-info">
          <strong>Info!</strong> Tentukan Bahan Resep Anda.
          <button @click="add()" type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <div class="row">
            <div class="col-4" v-for="(ingredient,i) in ingredients">
                <div class="card">
                    <div class="card-header">
                        Pilih
                        <small>Bahan</small>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label></label>
                            <input type="text" class="form-control" placeholder="type something" name="">
                        </div>
                        <button type="button" class="btn btn-danger pull-right" @click="remove(i)"><i class="fa fa-trash"></i> Hapus</button>
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
                products:[{}],
                ingredients:[{}]
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            axios.get('/api/products').then(res=>{
                this.products = res.data;
            });
        },
        methods:{
            add(){
                this.ingredients.push({});
            },
            remove(index){
                this.ingredients.splice(index,1);
            }
        }
    }
</script>

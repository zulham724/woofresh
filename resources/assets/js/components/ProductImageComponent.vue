<template>
    <div>
        <div class="alert alert-info">
          <strong>Info!</strong> Tentukan Gambar-gambar Product Anda.
          <button @click="add()" type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <div class="row">
            <div class="col-4" v-for="(productimage,ri) in productimages">
                <div class="card">
                    <div class="card-header">
                        Tentukan
                        <small>Gambar Product</small>
                    </div>
                    <div class="card-body">
                        <input type="hidden" :name="'productimages['+ri+'][id]'" :value="productimage.id">
                        <img v-if="productimage.image" :src="'/storage/'+productimage.image" class="img img-rounded" width="100">
                        <div class="form-group">
                            <span v-model="productimage.image">Gambar: </span>
                            <input type="file" :name="'productimages['+ri+'][image]'" > 
                        </div>
                         <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea type="text" class="form-control" v-model="productimage.description" :name="'productimages['+ri+'][description]'" placeholder="type something"> </textarea>
                        </div>
                        <button type="button" class="btn btn-danger pull-right" @click="remove(ri,productimage.id)"><i class="fa fa-trash"></i> Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['edit_productimages'],
        data(){
            return{
                productimages:[{}]
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            this.edit_productimages ? this.productimages = this.edit_productimages : null;
            console.log("resep Gambar",this.productimages);
        },
        methods:{
            add(){
                this.productimages.push({});
            },
            remove(index,id){
                if(id){
                    axios.post('/api/productimages/'+id,{_method:'delete'}).then(res=>{
                        swal({
                            title:"Berhasil",
                            text:"Anda Berhasil Menghapus Data",
                            type:"success",
                        }).then(result=>{
                            this.productimages.splice(index,1);
                        });
                    });
                } else {
                    swal({
                        title:"Berhasil",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success",
                    }).then(result=>{
                        this.productimages.splice(index,1);
                    });
                }
            }
        }
    }
</script>

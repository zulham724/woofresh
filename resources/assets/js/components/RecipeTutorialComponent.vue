<template>
    <div>
        <div class="alert alert-info">
          <strong>Info!</strong> Tuliskan Tutorial Resep Anda.
          <button @click="add()" type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah</button>
      </div>
      <div class="row">
        <div class="col-4" v-for="(recipetutorial,r) in recipetutorials">
            <div class="card">
                <div class="card-header">
                    <small>Tutorial</small>
                </div>
                <div class="card-body">
                    <input type="hidden" :name="'recipetutorials['+r+'][id]'" :value="recipetutorial.id">
                        <!-- <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" :name="'recipetutorials['+r+'][name]'" v-model="recipetutorial.name" placeholder="type something" required> 
                        </div> -->
                        <div class="form-group">
                            <label>Step {{ r+1 }}</label>
                            <textarea type="text" class="form-control" v-model="recipetutorial.description" :name="'recipetutorials['+r+'][description]'" placeholder="type something" > </textarea>
                        </div>
                    <button type="button" class="btn btn-danger pull-right" @click="remove(r,recipetutorial.id)"><i class="fa fa-trash"></i> Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props:['edit_recipetutorials'],
    data(){
        return{
            recipetutorials:[{}]
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    created(){
        this.edit_recipetutorials ? this.recipetutorials = this.edit_recipetutorials : null;
        console.log("Resep Tutorial nya ",this.recipetutorials);
    },
    methods:{
        add(){
            this.recipetutorials.push({});
        },
        remove(index,id){
            if(id){
                axios.post('/api/recipetutorials/'+id,{_method:'delete'}).then(res=>{
                    swal({
                        title:"Berhasil",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success",
                    }).then(result=>{
                        this.recipetutorials.splice(index,1);
                    });
                });
            } else {
                swal({
                    title:"Berhasil",
                    text:"Anda Berhasil Menghapus Data",
                    type:"success",
                }).then(result=>{
                    this.recipetutorials.splice(index,1);
                });
            }
        }
    }
}
</script>

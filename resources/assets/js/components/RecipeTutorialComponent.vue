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
                    <small>Tuliskan Resep</small>
                </div>
                <div class="card-body">
                    <div class="form-group">
                            <label>Nama Resep</label>
                            <input type="text" class="form-control" :name="'recipetutorials['+r+'][name]'" v-model="recipetutorial.name" placeholder="type something" required> 
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea type="text" class="form-control" v-model="recipetutorial.description" :name="'recipetutorials['+r+'][description]'" placeholder="type something" > </textarea>
                        </div>
                    <button type="button" class="btn btn-danger pull-right" @click="remove(r)"><i class="fa fa-trash"></i> Hapus</button>
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
        remove(index){
            this.recipetutorials.splice(index,1);
        }
    }
}
</script>

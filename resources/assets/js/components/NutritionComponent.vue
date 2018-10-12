<template>
    <div>
        <div class="alert alert-info">
          <strong>Info!</strong> Tentukan Nutrisi Barang anda.
          <button @click="add()" type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <div class="row">  
            <div class="col-4" v-for="(component,c) in components">
                <div class="card">
                    <div class="card-header">
                        Nutrisi
                        <small>Pilih salah satu</small>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nutrisi</label>
                            <select class="form-control" :name="'components['+c+'][component_list_id]'" @change="loadComponentLists()" v-model="component.component_list_id" required>
                                <option value="0">--Pilih--</option>
                                <option v-for="(componentlist,cl) in componentlists" :value="componentlist.id">{{ componentlist.name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="text" class="form-control" :name="'components['+c+'][unit]'" v-model="component.unit" placeholder="ml/g/kg" required>
                        </div>
                        <div class="form-group">
                            <label>Nilai</label>
                            <input type="number" class="form-control" :name="'components['+c+'][value]'" v-model="component.value" placeholder="tulis disini" required>
                        </div>
                        <button type="button" class="btn btn-danger pull-right" @click="remove(c)"><i class="fa fa-trash"></i> Hapus</button>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</template>

<script>
    export default {
        props:['edit_components'],
        data(){
            return {
                components:[{
                    component_list_id:0
                }],
                componentlists:[{}]
            }
        },
        mounted() {
            console.log('Component mounted.');
        },
        created(){
            this.edit_components ? this.components = this.edit_components : null;
            console.log(this.components);
            this.loadComponentLists();
        },
        methods:{
            loadComponentLists(){
                axios.get('/api/componentlists').then(res=>{
                    this.componentlists = res.data;
                    console.log(this.componentlists);
                });
            },
            add(){
                this.components.push({
                    component_list_id:0
                });
            },
            remove(index){
                this.components.splice(index,1);
            }
        }
    }
</script>

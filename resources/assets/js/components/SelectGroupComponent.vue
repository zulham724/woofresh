<template>
    <div>
        <div class="form-group">
            <label>ID Grup</label>
            <select class="form-control" name="group_id" v-model="selected.group" @change="initCategories()">
                <option value="">Pilih</option>
                <option v-for="(group,g) in groups" :value="group.id">{{ group.name }}</option>
            </select>
        </div> 
        <div class="form-group">
            <label>ID Kategori</label>
            <select class="form-control" name="category_id" v-model="selected.category" @change="initSubcategories()">
                <option value="">Pilih</option>
                <option v-for="(category,c) in categories" :value="category.id">{{ category.name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label>Sub Kategori</label>
            <select class="form-control" name="sub_category_id" v-model="selected.subcategory">
                <option value="">Pilih</option>
                <option v-for="(subcategory,sc) in subcategories" :value="subcategory.id">{{ subcategory.name }}</option>
            </select>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                groups:[{}],
                categories:[{}],
                subcategories:[{}],
                selected:{
                    group:'',
                    category:'',
                    subcategory:''
                }
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.initGroups();
        },
        methods:{
            initGroups(){
                axios.get('/api/groups').then(res=>{
                    this.groups = res.data;
                });
            },
            initCategories(){
                this.subcategories=[{}];
                axios.get('/api/categories').then(res=>{
                    this.categories = res.data.filter(category=>{
                        return category.group_id == this.selected.group;
                    });
                });
            },
            initSubcategories(){
                axios.get('/api/subcategories').then(res=>{
                    this.subcategories = res.data.filter(subcategory=>{
                        return subcategory.category_id == this.selected.category;
                    });
                });
            }
        }
    }
</script>

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
                        <label>Bahan</label>
                        <select class="form-control" v-model="ingredient.product_id" @change="loadProducts()" :name="'ingredients['+i+'][product_id]'">
                            <option value="">--Pilih Bahan--</option>
                            <option v-for="(product,p) in products" :value="product.id">{{ product.product_translations[0].name }}</option>
                        </select>
                    </div>
                    <div class="form-group" v-if="ingredient.product_id == '' || ingredient.product_id == null">
                        <label>Produk Opsional</label>
                        <input type="text" class="form-control" v-model="ingredient.optional_product" placeholder="Product Opsional" :name="'ingredients['+i+'][optional_product]'">
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" class="form-control" placeholder="ml/kg" v-model="ingredient.unit" :name="'ingredients['+i+'][unit]'" required>
                    </div>
                    <div class="form-group">
                        <label>Berat</label>
                        <input type="number" class="form-control" placeholder="Berat" v-model="ingredient.weight" :name="'ingredients['+i+'][weight]'" required>
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
    props:['edit_ingredients'],
    data(){
        return{
            products:[{}],
            ingredients:[{
                product_id:''
            }]
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    created(){
        this.edit_ingredients ? this.ingredients = this.edit_ingredients : null;
        console.log(this.ingredients);
        this.loadProducts();
    },
    methods:{
        loadProducts(){
            axios.get('/api/products').then(res=>{
                this.products = res.data;
                console.log(this.products);
            });
        },
        add(){
            this.ingredients.push({
                product_id:''
            });
        },
        remove(index){
            this.ingredients.splice(index,1);
        }
    }
}
</script>

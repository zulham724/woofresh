<template>
    
</template>

<script>
    export default {
        data(){
            return {
                languages:{}
            }
        },

        mounted() {
            console.log('Component mounted.');
            axios.get('api/languages').then((result)=>{
                this.languages = result.data;
                console.log(result);
            },err=>{
                console.log(err);
            });
        },

        created(){
            this.init();
        },

        methods:{
            init(){

            }
        }
    }
</script>

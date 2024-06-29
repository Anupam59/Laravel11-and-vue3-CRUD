<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <RouterLink class="btn btn-sm btn-primary m-2" :to="{name: 'ListView'}">List</RouterLink>
                        <RouterLink class="btn btn-sm btn-primary m-2" :to="{name: 'AboutView'}">About</RouterLink>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="UpdateData">
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" v-model="FormData.product_name">
                                <span class="text-danger" v-for="(error, index) in FormError.product_name">{{ error }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Price</label>
                                <input type="number" class="form-control" v-model="FormData.product_price">
                                <span class="text-danger" v-for="(error, index) in FormError.product_price">{{ error }}</span>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "HomeView",
    data(){
        return{
            FormData:{
                product_name:'',
                product_price:'',
            },
            FormError:{
                product_name:'',
                product_price:'',
            },
        }
    },
    mounted() {
        this.ShowData();
    },
    methods:{
        ShowData(){
            let base_url="http://127.0.0.1:8000/api/product/";
            axios.get(base_url+'show/'+this.$route.params.id).then((success)=>{
                this.FormData = success.data.product;
            }).catch((errors)=>{
                console.log(errors);
            });
        },

        UpdateData(){
            let base_url="http://127.0.0.1:8000/api/product/";
            axios.post(base_url+'update/'+this.$route.params.id,this.FormData).then((success)=>{
                this.$router.push({name:'ListView'});
            }).catch((errors)=>{
                this.FormError.product_name = errors.response.data.errors.product_name;
                this.FormError.product_price = errors.response.data.errors.product_price;
            });
        }
    }
}
</script>

<style scoped>

</style>

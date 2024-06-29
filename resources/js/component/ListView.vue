<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <RouterLink class="btn btn-sm btn-primary m-2" :to="{name: 'HomeView'}">Home</RouterLink>
                <RouterLink class="btn btn-sm btn-primary m-2" :to="{name: 'AboutView'}">About</RouterLink>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>


                    <tr v-for="(product, index) in products">
                        <th scope="row">{{ ++index }}</th>
                        <td>{{ product.product_name }}</td>
                        <td>{{ product.product_price }}</td>
                        <td>
                            <RouterLink class="btn btn-sm btn-primary m-2" :to="{name: 'EditView',params:{id:product.id}}">Edit</RouterLink>
                            <a @click.prevent="DeleteData(product.id)" class="btn btn-sm btn-danger m-2">Delete</a>
                        </td>
                    </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ListView",

    data(){
        return{
            products:[],
        }
    },
    mounted(){
        this.ProductList();
    },
    methods:{
        ProductList(){
            let base_url="http://127.0.0.1:8000/api/product/";
            axios.get(base_url+'index').then((success)=>{
                this.products = success.data.product;
            }).catch((errors)=>{
                console.log(errors);
            });
        },
        DeleteData(product_id){
            let base_url="http://127.0.0.1:8000/api/product/";
            axios.delete(base_url+'delete/'+product_id).then((success)=>{
                this.ProductList();
            }).catch((errors)=>{
                console.log(errors);
            });
        }
    }
}
</script>

<style scoped>

</style>

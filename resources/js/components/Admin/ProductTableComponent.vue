<template>

    <div>
        <div class="card">
            <notifications group="foo" />

            <div class="card-header">
                <h5>Product List
                    <a @click="create" class="btn btn-sm btn-primary float-end">Add Product</a>
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Sub Category</th>
                                        <th>Title</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="product in products" :key="product.id">
                                        <th>{{ product.id }}</th>
                                        <th>{{ product.sub_category.title }}</th>
                                        <th>{{ product.title }}</th>
                                        <th><a @click="editData(product.id)" class="btn btn-sm btn-primary">Edit</a></th>
                                        <th><a @click="deleteData(product.id)" class="btn btn-sm btn-danger">Delete</a></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</template>

<script>

    import Vue from 'vue'
    import { mapGetters } from 'vuex'

    export default {
        name: 'product-form-component',
        props: {

        },
        mounted(){

            this.getProductList();

        },
        computed: {
            ...mapGetters({

            }),
        },
        data() {
            return {
                products: [],
            }
        },
        methods: {
            create() {
                window.location = "/admin/products/create"
            },
            editData(product_id){
                window.location = `/admin/products/${product_id}/edit`
            },
            getProductList(){
                axios.get(`/admin/products-list`)
                    .then(res=>{
                        console.log(res.data)
                        this.products = res.data;
                    });
            },
            deleteData(product_id){
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((value) => {
                    if (value) {

                        axios.delete(`/admin/products/${product_id}`)
                            .then(res => {

                                console.log(res.data)
                                Vue.notify({
                                    title: 'Success',
                                    message: res.data.message,
                                    type: 'success'
                                });

                                this.getProductList();
                             
                            })
                            .catch(err => {
                                console.log(err);
                            });
                    }
                });
            },
        }
    }

</script>

<template>

    <div>

        <div class="row">
            <div class="col-md-12">

                <div v-if="products.length > 0">
                    <div class="card mb-3"  v-for="product in products" :key="product.id">
                        <div class="card-body">
                            <h4>{{product.title}}</h4>
                            <p class="mb-1">{{product.description}}</p>
                            <h5>Rs: {{product.price}}</h5>
                            <button class="btn btn-link btn-sm" @click="viewProduct(product.sub_category.category.slug, product.sub_category.slug, product.slug)">View Product</button>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <div class="card card-body mb-3">
                        No Product Found
                    </div>
                </div>

            </div>
        </div>

    </div>

</template>

<script>

    import Vue from 'vue'

    export default {
        name: 'frontend-product-component',
        props: {
            id: String
        },
        mounted(){

            this.getProductList();
        },
        computed: {
            
        },
        data() {
            return {
                products: [],
            }
        },
        methods: {
            viewProduct(category_slug, sub_category_slug, product_slug) {
                // console.log(category_slug, sub_category_slug, product_slug)
                window.location = `/${category_slug}/${sub_category_slug}/${product_slug}`
            },
            getProductList(){

                axios.get(`/api/products/${this.id}`)
                    .then(res=>{
                        // console.log(res.data)
                        this.products = res.data;
                    });
            },
        }
    }

</script>

<template>

    <div>

        <div class="row">
            <div class="col-md-12">

                <div v-if="product.length > 0">
                    <div class="card mb-3" v-for="product_item in product" :key="product_item.id">
                        <div class="card-body">
                            <h2>{{product_item.title}}</h2>
                            <p class="mb-1">{{product_item.description}}</p>
                            <h3>Rs: {{product_item.price}}</h3>
                            <button class="btn btn-link btn-sm" @click="goBack(product_item.sub_category.category.slug, product_item.sub_category.slug)">Go BACK</button>
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
                product: [],
            }
        },
        methods: {
            goBack(category_slug, sub_category_slug) {
                // console.log(category_slug, sub_category_slug)
                window.location = `/${category_slug}/${sub_category_slug}`
            },
            getProductList(){

                axios.get(`/api/product-view/${this.id}`)
                    .then(res=>{
                        // console.log(res.data)
                        this.product = res.data;
                    });
            },
        }
    }

</script>

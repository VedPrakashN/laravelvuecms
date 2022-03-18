<template>

    <div>
        <div class="row" v-if="subcategories.length > 0">
            <div class="col-md-4" v-for="subcategory in subcategories" :key="subcategory.id">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4>{{subcategory.title}}</h4>
                        <p>{{subcategory.description}}</p>
                        <button class="btn btn-link btn-sm" @click="viewProduct(subcategory.category.slug, subcategory.slug)">View Product</button>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <div class="card card-body mb-3">
                No Sub Categories are available
            </div>
        </div>
    </div>

</template>

<script>

    import Vue from 'vue'

    export default {
        name: 'frontend-sub-category-component',
        props: {
            id: String
        },
        mounted(){

            this.getSubCategoryList();
        },
        computed: {
            
        },
        data() {
            return {
                subcategories: [],
            }
        },
        methods: {
            viewProduct(category_slug, sub_category_slug) {
                // console.log(category_slug, sub_category_slug)
                window.location = `/${category_slug}/${sub_category_slug}`
            },
            getSubCategoryList(){
                axios.get(`/api/sub-category/${this.id}`)
                    .then(res=>{
                        // console.log(res.data)
                        this.subcategories = res.data;
                    });
            },
        }
    }

</script>

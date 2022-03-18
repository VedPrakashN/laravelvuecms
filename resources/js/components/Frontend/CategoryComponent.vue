<template>

    <div>

        <div class="row">
            <div class="col-md-12">
                <div v-if="categories.length > 0">
                    <div class="card mb-3"  v-for="category in categories" :key="category.id">
                        <div class="card-body">
                            <h4>{{category.title}}</h4>
                            <p>{{category.description}}</p>
                            <button class="btn btn-link btn-sm" @click="viewSubcategory(category.slug)">View Data</button>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <div class="card card-body mb-3">
                        No Categories Found
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>

    import Vue from 'vue'

    export default {
        name: 'frontend-category-component',
        props: {

        },
        mounted(){

            this.getCategoryList();
        },
        computed: {
            
        },
        data() {
            return {
                categories: [],
            }
        },
        methods: {
            viewSubcategory(category_slug) {
                window.location = `/${category_slug}`
            },
            getCategoryList(){
                axios.get(`/admin/category-list`)
                    .then(res=>{
                        // console.log(res.data)
                        this.categories = res.data;
                    });
            },
        }
    }

</script>

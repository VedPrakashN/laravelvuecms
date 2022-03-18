<template>

    <div>
        <div class="card">
            <notifications group="foo" />

            <div class="card-header">
                <h5>Sub Category List
                    <a @click="create" class="btn btn-sm btn-primary float-end">Add Sub Category</a>
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
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="subcategory in subcategories" :key="subcategory.id">
                                        <th>{{ subcategory.id }}</th>
                                        <th>{{ subcategory.category.title }}</th>
                                        <th>{{ subcategory.title }}</th>
                                        <th><a @click="editData(subcategory.id)" class="btn btn-sm btn-primary">Edit</a></th>
                                        <th><a @click="deleteData(subcategory.id)" class="btn btn-sm btn-danger">Delete</a></th>
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
        name: 'sub-category-form-component',
        props: {

        },
        mounted(){

            this.getSubCategoryList();
                   
        },
        computed: {
            ...mapGetters({

            }),
        },
        data() {
            return {
                subcategories: [],
            }
        },
        methods: {
            create() {
                window.location = "/admin/sub-category/create"
            },
            editData(sub_category_id){
                window.location = `/admin/sub-category/${sub_category_id}/edit`
            },
            getSubCategoryList(){
                axios.get(`/admin/sub-category-list`)
                    .then(res=>{
                        console.log(res.data)
                        this.subcategories = res.data;
                    });
            },
            deleteData(sub_category_id){
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((value) => {
                    if (value) {

                        axios.delete(`/admin/sub-category/${sub_category_id}`)
                            .then(res => {

                                console.log(res.data)
                                Vue.notify({
                                    title: 'Success',
                                    message: res.data.message,
                                    type: 'success'
                                });

                                this.getSubCategoryList();
                             
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

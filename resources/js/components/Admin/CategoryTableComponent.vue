<template>

    <div>
        <div class="card">
            <notifications group="foo" />

            <div class="card-header">
                <h5>Category List
                    <a @click="create" class="btn btn-sm btn-primary float-end">Add Category</a>
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
                                        <th>Title</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="category in categories" :key="category.id">
                                        <th>{{ category.id }}</th>
                                        <th>{{ category.title }}</th>
                                        <th><a @click="editData(category.id)" class="btn btn-sm  btn-primary">Edit</a></th>
                                        <th><a @click="deleteData(category.id)" class="btn btn-sm  btn-danger">Delete</a></th>
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
        name: 'category-form-component',
        props: {

        },
        mounted(){

            this.getCategoryList();
        },
        computed: {
            ...mapGetters({

            }),
        },
        data() {
            return {
                categories: [],
            }
        },
        methods: {
            create() {
                window.location = "/admin/category/create"
            },
            editData(category_id){
                window.location = `/admin/sub-category/${category_id}/edit`
            },
            getCategoryList(){
                axios.get(`/admin/category-list`)
                    .then(res=>{
                        console.log(res.data)
                        this.categories = res.data;
                    });
            },
            deleteData(category_id){
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((value) => {
                    if (value) {

                        axios.delete(`/admin/category/${category_id}`)
                            .then(res => {

                                console.log(res.data)
                                Vue.notify({
                                    title: 'Success',
                                    message: res.data.message,
                                    type: 'success'
                                });

                                this.getCategoryList();
                             
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

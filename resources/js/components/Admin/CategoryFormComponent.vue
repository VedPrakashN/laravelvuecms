<template>

    <div>
        <div class="card">
            <notifications group="foo" />

            <div class="card-header">
                <h5>
                    <span class="text-capitalize">{{scope}} Category</span>
                    <a @click="goBack" class="btn btn-sm btn-danger float-end">BACK</a>
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" v-model="model.title" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea v-model="model.description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <button  class="btn btn-primary" @click="saveForm">Save Category</button>
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
            scope: String,
            id: Number,
        },
        mounted(){

            // Vue.swal('Hello Vue world!!!');

            switch (this.scope) {
                case 'show':
                case 'edit':

                    axios.get(`/admin/category/${this.id}`)
                        .then(res=>{
                            this.model = res.data;
                        });

                    break;
                default:
                    break;
            }
        },
        computed: {
            ...mapGetters({

            }),
            readOnlyFields(){
                return (this.scope == 'show')  ? true : false;
            },
        },
        data() {
            return {
                model: {
                    title: null,
                    description: null,
                },
            }
        },
        methods: {
            goBack() {
                window.location = "/admin/category"
            },
            saveForm() {

                switch (this.scope) {
                    case 'create':

                        axios.post("/admin/category", this.model)
                            .then(res => {
                                console.log(res)

                                Vue.notify({
                                    group: 'foo',
                                    title: 'Success',
                                    text: res.data.message,
                                    type: 'success'
                                })

                                window.location = "/admin/category"
                            })

                        break;

                    case 'edit':

                        axios.put(`/admin/category/${this.id}`, this.model)
                            .then(res => {
                                console.log(res)

                                Vue.notify({
                                    group: 'foo',
                                    title: 'Success',
                                    text: res.data.message,
                                    type: 'success'
                                })

                                window.location = "/admin/category"
                            })

                        break;

                        break;

                    default:
                        break;
                }
            },
        }
    }

</script>

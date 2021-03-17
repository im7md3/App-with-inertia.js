<template>
    <Layout>
        <div class="container">
            <form @submit.prevent="handleSubmit">
                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="name">Name</label><input type="text" id="name" class="form-control" placeholder="Enter Name"
                                v-model="lead.name" tabindex="1">
                        </div><!-- form-group -->

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="phone" id="phone" class="form-control" placeholder="Enter phone"
                                v-model="lead.phone" tabindex="3">
                        </div><!-- form-group -->

                        <div class="form-group">
                            <label for="package">interested Package</label>
                            <input type="text" id="package" class="form-control"
                                placeholder="Enter interested Package in" v-model="lead.package" tabindex="5">
                        </div><!-- form-group -->

                    </div><!-- col-md-6 -->

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" placeholder="Enter Email"
                                v-model="lead.email" tabindex="2">
                        </div><!-- form-group -->

                        <div class="form-group">
                            <label for="dob">Birthday</label>
                            <input type="date" id="dob" class="form-control" placeholder="Enter dob"
                                v-model="lead.dob" tabindex="4">
                        </div><!-- form-group -->

                    </div><!-- col-md-6 -->

                    <div class="col-md-12">
                        <button class="btn btn-success">Save</button>
                    </div>
                </div><!-- row -->
            </form>
        </div>
    </Layout>
</template>

<script>
    import Layout from "./../../Shared/Layout"
    export default {
        components: {
            Layout
        },
        data() {
            return {
                lead: {
                    name: '',
                    email: '',
                    phone: '',
                    dob: '',
                    package: ""
                } /* lead */
            } /* return */
        } /* data */ ,
        methods: {
            handleSubmit() {
                this.$inertia.post('/leads/save',this.lead);
            } /* handleSubmit */
        } /* method */ ,

    }

</script>

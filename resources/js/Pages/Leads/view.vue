<template>
    <Layout>
        <div class="container">
            <h1>

                <inertia-link class="text-primary" :href="$route('leads.index')">Leads</inertia-link>
                <span class="text-secondary">/</span>
                {{ lead.name }} details
            </h1>
            <div class="card">
                <div class="card-header">
                    {{ lead.name }} details
                </div>
                <div class="card-body">
                    <form @submit.prevent="handleSubmit">
                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" placeholder="Enter Name"
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

                            <div class="col-md-12 d-flex ">
                                <button class="btn btn-success">Save</button>
                                <inertia-link :href="$route('leads.index')" class="ml-2 btn btn-warning">Back
                                </inertia-link>
                            </div>
                        </div><!-- row -->
                    </form>
                </div>
                <!--card-body-->
            </div>
            <!--card-->

            <div class="card mt-5">
                <div class="card-header">
                    Reminders
                </div>
                <!--card-header-->
                <div class="card-body" v-if="lead.reminders.length>0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-action" v-for="remind in lead.reminders"
                            :key="remind.id">
                            <div class="row align-items-center">
                                <div class="col-md-6">{{ remind.reminder }}</div>
                                <div class="col-md-2">{{ remind.reminder_date }}</div>
                                <div class="col-md-2 text-success font-weight-bold">{{ remind.status }}</div>
                                <div class="col-md-2 text-success font-weight-bold">
                                    <inertia-link :href="$route('reminder.view',[lead,remind])" class="float-right"><i
                                            class="fa fa-chevron-right" aria-hidden="true"></i></inertia-link>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!--card-body-->

                <div class="card-body" v-else>
                    <p class="card-text">
                        <inertia-link class="btn btn-outline-success" :href="$route('reminder.add',lead)">Add New Reminder
                        </inertia-link>
                    </p>
                </div>

            </div>
            <!--card-->

        </div>
        <!--container-->
    </Layout>
</template>

<script>
    import Layout from "./../../Shared/Layout"
    export default {
        props: {leadprop:Object},
        components: {
            Layout
        },
        data() {
            return {
                lead: {
                    id: this.leadprop.id,
                    name: this.leadprop.name,
                    email: this.leadprop.email,
                    phone: this.leadprop.phone,
                    dob: this.leadprop.dob,
                    package: this.leadprop.interested_package,
                    reminders: this.leadprop.reminders
                } /* lead */
            } /* return */
        } /* data */ ,
        methods: {
            handleSubmit() {
                let dataForm = new FormData();
                dataForm.append('id', this.lead.id);
                dataForm.append('name', this.lead.name);
                dataForm.append('email', this.lead.email);
                dataForm.append('phone', this.lead.phone);
                dataForm.append('dob', this.lead.dob);
                dataForm.append('package', this.lead.package);
                this.$inertia.post('/leads/update', dataForm).then(() => {
                    new Noty({
                        theme: 'metroui',
                        type: 'success',
                        layout: 'topRight',
                        text: "yes yes yes",
                        timeout: 2000,
                        killer: true
                    }).show();
                });
            } /* handleSubmit */
        } /* method */ ,



    }

</script>

<template>
    <Layout>
        <div class="container">
            <h1>

                <inertia-link class="text-primary" :href="$route('leads.index')">Leads</inertia-link>
                <span class="text-secondary">/</span>
                <inertia-link class="text-primary" :href="$route('lead.view',lead)">{{ this.lead.name }} details
                </inertia-link>
                <span class="text-secondary">/</span>
                View Reminder
            </h1>
            <div class="card">
                <div class="card-header">
                    Edit Reminder
                </div>
                <div class="card-body">
                    <form @submit.prevent="handleSubmit">

                        <div class="form-group">
                            <label for="reminde">Reminde</label>
                            <textarea name="reminde" id="reminde" class="form-control" placeholder="Enter Reminde"
                                v-model="reminder.reminder" tabindex="1"></textarea>
                        </div><!-- form-group -->

                        <div class="form-group">
                            <label for="date">Reminder Date</label>
                            <input name="date" type="date" id="date" class="form-control" placeholder="Enter Reminder Date" v-model="reminder.date" tabindex="2">
                        </div><!-- form-group -->

                        <div class="col-md-12 d-flex ">
                            <button class="btn btn-primary">submit</button>
                            <inertia-link :href="$route('lead.view',lead)" class="ml-2 btn btn-warning">Back
                            </inertia-link>
                        </div>

                    </form>
                </div>
                <!--card-body-->
            </div>
            <!--card-->



        </div>
        <!--container-->
    </Layout>
</template>

<script>
    import Layout from "./../../../Shared/Layout"
    export default {
        props: ["lead","remind"],
        components: {
            Layout
        },
        data() {
            return {
                reminder:{
                    reminder:this.remind.reminder,
                    date:this.remind.reminder_date,
                    lead:this.lead.id,
                }
            } /* return */
        } /* data */ ,
        methods: {
            handleSubmit() {
                this.$inertia.post(this.$route('reminder.update',this.remind),this.reminder).then(()=>{
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

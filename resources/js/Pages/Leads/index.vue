<template>
    <Layout>
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1>Leads</h1>
                <inertia-link class="btn btn-outline-primary align-self-center" :href="$route('leads.add')">Create Lead
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </inertia-link>
            </div>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Package</th>
                        <th scope="col">Added On</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="lead in leads.data" :key="lead.id">
                        <th>{{ lead.id }}</th>
                        <td>{{ lead.name }}</td>
                        <td>{{ lead.email }}</td>
                        <td>{{ lead.phone }}</td>
                        <td>{{ lead.dob }}</td>
                        <td>{{ lead.interested_package ? lead.interested_package:' _ ' }}
                        </td>
                        <td>{{ lead.created_at }}</td>

                        <inertia-link :href="$route('lead.view',lead)" class="w-100">
                            <td class="w-100 btn btn-outline-info"><i class="fa fa-chevron-right"
                                    aria-hidden="true"></i></td>
                        </inertia-link>

                    </tr>

                </tbody>
            </table>
            <paginate :data="this.leads"></paginate>
        </div>

    </Layout>
</template>

<script>
    import Layout from "./../../Shared/Layout"
    import paginate from "./../../Shared/paginate"
    export default {
        props: ['leads'],
        components: {
            Layout,
            paginate
        },
        data() {
            return {
                
            } /* return */
        } /* data */ ,
        methods: {
            
        } /* method */ ,

        
    }

</script>

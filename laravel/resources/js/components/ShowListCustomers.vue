<template>
    <div>
        <h2>Customers vue:</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Akcje</th>
            </tr>
            <tr v-for="(customer, index) in customers" :key="index">
                <td>{{ customer.id }}</td>
                <td>{{ customer.name }}</td>
                <td> <router-link :to="'/customer/' + customer.id">{{ customer.name }}</router-link></td>

            </tr>
        </table>

    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            customers: [],
        }
    },
    mounted() {
        this.fetchData()
    },
    methods: {
        fetchData() {
            axios.get('api/customer/list')
                .then(response => {
                    this.customers = response.data;
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>

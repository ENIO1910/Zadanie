<template>
    <div>
        <h2>{{ customer.name }}</h2>
        <p>ID: {{ customer.id }}</p>
        <p>Created at: {{ customer.created_at }}</p>
        <p>Updated at: {{ customer.updated_at }}</p>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            customer: {},
        }
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            axios.get('api/customer/' + this.$route.params.id)
                .then(response => {
                    this.customer = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
}
</script>

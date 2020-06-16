<template>
    <ul>
        <li v-for="table in tables" v-bind:key="table.id">
            Tafel {{table.id}} - 
            <span v-if="table.latest_guest">Laatste gasten: {{table.latest_guest.created_at.toLocaleString()}} ---- {{table.latest_guest.id}}</span>
            <button v-on:click="createNewGuests(table.id)">Nieuwe gasten</button>
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['tablesprops'],
        methods: {
            createNewGuests(table) {
                axios.post(`/kassa/tafel/${table}/store_guest`)
                    .then(res => {
                        this.tables = res.data;
                    })
                    .catch(res => alert(res))
            }
        },
        mounted() {
            this.tables = this.tablesprops;
        },
        data() {
            return {
                tables: []
            }
        }
    }
</script>

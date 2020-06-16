<template>
    <div class="m-cashdesk__history container">
        <h2>Bestel geschiedenis</h2>
        <div class="m-cashdesk__history__order" v-for="order in orderslines" v-bind:key="order.id">
            <button @click="$emit('add-history-order', order)">Voeg toe aan bestelling!</button>
            <div v-for="item in order.orderlines" v-bind:key="item.id">{{item.menuitem.name}}</div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['orders'],
        data() {
            return {
                orderslines: JSON.parse(this.orders)
            }
        }
    }
</script>

<template>
    <div class="container m-cashdesk__order">
        <div class="m-cashdesk__order__list">
            <h3>Bestelling</h3>
            <ul>
                <li v-for="orders in orderItems">
                    {{orders.menuitem.menunumber}}. {{orders.menuitem.name}} €{{(orders.menuitem.price * orders.amount).toFixed(2)}} <input type="number" min="1" v-model="orders.amount" @change="setTotalPrice">
                </li>
            </ul>
        </div>

        <div class="m-cashdesk__order__total">
            <h2>Totaal</h2> <h2>€{{totalPrice}}</h2>
            <button v-on:click="$emit('delete-order')">Alles verwijderen</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['orderItems'],
        mounted() {
            this.calcTotalPice()
        },
        methods: {
            calcTotalPice() {
                let price = this.orderItems.reduce((price, item) => {
                    return (parseFloat(price) + item.menuitem.price * item.amount).toFixed(2)
                }, 0)

                return price;
            },
            setTotalPrice() {
                this.totalPrice = this.calcTotalPice();
            }
        },
        data() {
            return {
                totalPrice: 0
            }
        },
        watch: { 
            orderItems: function(newVal, oldVal) {
                this.setTotalPrice()
            }
        }  
    }
</script>

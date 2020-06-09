<template>
    <div class="container m-cashdesk__gridcontainer__order">
        <div class="m-cashdesk__gridcontainer__order__list">
            <h3>Bestelling</h3>
            <ul>
                <li v-for="(orders, index) in orderItems" v-bind:key="orders.id" class="m-cashdesk__gridcontainer__order__list__item">
                    <div class="m-cashdesk__gridcontainer__order__list__item__flex">
                        <button @click="$emit('delete-item', $event, orders, index)"><i class="fas fa-times"></i></button>
                        <div class="m-cashdesk__gridcontainer__order__list__item__flex__name">{{orders.menuitem.menunumber}}. {{orders.menuitem.name}}</div>
                        <div class="m-cashdesk__gridcontainer__order__list__item__flex__price">€{{(orders.menuitem.price * orders.amount).toFixed(2)}}</div>
                        <button @click="toggleDescription(index)">Beschrijving</button> 
                        <input type="number" min="1" v-model="orders.amount" @change="setTotalPrice">
                    </div>
                    <textarea class="m-cashdesk__gridcontainer__order__list__item__description" name="description" v-model="orders.description"></textarea>
                </li>
            </ul>
        </div>

        <div class="m-cashdesk__gridcontainer__order__total">
            <div class="m-cashdesk__gridcontainer__order__total__text">
                <h2>Totaal</h2> 
                <h2>€{{totalPrice}}</h2>
            </div>
            <button v-on:click="$emit('delete-order')">Alles verwijderen</button>
            <button class="order-button" @click="$emit('create-order')">Bestellen</button>
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
            },
            toggleDescription(index) {
                document.querySelectorAll(".m-cashdesk__gridcontainer__order__list__item__description")[index].classList.toggle("visible");
            }
        },
        data() {
            return {
                totalPrice: 0,
     
            }
        },
        watch: { 
            orderItems: function(newVal, oldVal) {
                this.setTotalPrice()
            }
        }  
    }
</script>

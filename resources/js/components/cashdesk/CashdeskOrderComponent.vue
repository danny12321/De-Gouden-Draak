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
                        <button @click="$emit('show-extra-ordermodel', $event, index)"><i class="fas fa-plus"></i></button>
                        <button @click="toggleDescription(index)"><i class="fas fa-paragraph"></i></button>
                        <input type="number" min="1" v-model="orders.amount" @change="setTotalPrice">
                    </div>
                    <ul>
                        <li v-for="extraOrder in orders.extraOrder" v-bind:key="extraOrder.id">
                            {{extraOrder.name}}
                            {{(extraOrder.price * orders.amount).toFixed(2)}}
                        </li>
                    </ul>
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
        props: ['orderItems', 'renderComp'],
        mounted() {
            this.calcTotalPice()
        },
        methods: {
            calcTotalPice() {
                let price = this.orderItems.reduce((price, item) => {
                    let extraOrderPrice = 0;
                    if('extraOrder' in item) {
                        item.extraOrder.forEach(extraItem => {
                            extraOrderPrice += parseFloat(extraItem.price)
                        });
                    }
                    let endPrice = (parseFloat((parseFloat(price) + item.menuitem.price * item.amount) + (extraOrderPrice * item.amount))).toFixed(2)
                    return endPrice
                }, 0)

                return price;
            },
            setTotalPrice() {
                this.totalPrice = this.calcTotalPice();
            },
            toggleDescription(index) {
                document.querySelectorAll(".m-cashdesk__gridcontainer__order__list__item__description")[index].classList.toggle("visible");
            },
        },
        data() {
            return {
                totalPrice: 0,
            }
        },
        watch: { 
            orderItems: function(newVal, oldVal) {
                this.setTotalPrice();
            },
            renderComp: function(newVal, oldVal) {
                this.setTotalPrice()
            }
        }
    }
</script>

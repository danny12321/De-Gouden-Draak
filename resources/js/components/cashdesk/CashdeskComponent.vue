<template>
        <div class="m-cashdesk">
            <h3>Tafel nummer</h3>
            <select name="table" id="table" @change="changeTable($event)">
                <option v-for="table in tables" v-bind:key="table.id" v-bind:value="table.id">{{table.id}}</option>
            </select>

            <div class="m-cashdesk__gridcontainer">
                <cashdeskmenulist :menuitems="menuitems" @add-menuitem="addMenuitemToOrder"></cashdeskmenulist>
                <cashdesk-order-component :orderItems="menuOrderItems" @delete-order="deleteOrder" @create-order="createOrder"></cashdesk-order-component>
            </div>
        </div>
</template>

<script>
    export default {
        props: ['menuitems', 'tables'],
        methods: {
            addMenuitemToOrder(menuitem) {
                this.menuOrderItems.push({menuitem, amount: 1})
            },
            changeTable(event) {
                this.activeTable = parseInt(event.target.value);
            },
            deleteOrder() {
                this.menuOrderItems = []
            },
            createOrder() {
                document.querySelector('.order-button').disabled = true;

                let order = this.menuOrderItems.map(m => {
                    return {
                        amount: m.amount,
                        description: null,
                        menuitem_id: m.menuitem.id,
                    }
                })
                axios.post(`/kassa/order/${this.activeTable}`, { order })
                .then(res => {
                    alert("Bestelling geplaatst");
                    location.reload();
                })
            }
        },
        data() {
            return {
                menuOrderItems: [],
                activeTable: 1,
            }
        },
        
    }
</script>

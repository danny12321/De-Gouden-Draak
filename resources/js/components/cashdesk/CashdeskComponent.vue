<template>
        <div class="m-cashdesk">
            <div class="m-cashdesk__select--table container">
                <h3>Geselecteerde tafel</h3>
                <select name="table" id="table" @change="changeTable($event)">
                    <option v-for="table in tables" v-bind:key="table.id" v-bind:value="table.id">Tafel: {{table.id}}</option>
                </select>
            </div>

            <div class="m-cashdesk__gridcontainer">
                <cashdeskmenulist :menuitems="menuitems" @add-menuitem="addMenuitemToOrder"></cashdeskmenulist>
                <cashdesk-order-component :renderComp="renderComponent" :orderItems="menuOrderItems" @show-extra-ordermodel="showExtraOrderModel" @delete-order="deleteOrder" @create-order="createOrder" @delete-item="deleteItem"></cashdesk-order-component>
            </div>

            <model-component @add-extra-order="addExtraOrder" :orderItemIndex="extraOrderItemIndex" :menuitems="menuitems" />
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
                this.activeTable = parseInt(event.target.value)
            },
            deleteOrder() {
                this.menuOrderItems = []
            },
            createOrder() {
                document.querySelector('.order-button').disabled = true

                let order = this.menuOrderItems.map(m => {
                    let extraOrder = [];
                    if('extraOrder' in m) {
                        extraOrder = m.extraOrder.map(eo => {
                            return {
                                menuitem_id: eo.id,
                            }
                        })
                    }

                    return {
                        amount: m.amount,
                        description: m.description,
                        menuitem_id: m.menuitem.id,
                        extraOrder,
                    }
                })
                axios.post(`/kassa/order/${this.activeTable}`, { order })
                .then(res => {
                    alert("Bestelling geplaatst")
                    // location.reload()
                })
            },
            deleteItem(event, orders, index) {
                this.menuOrderItems.splice(index, 1)
            },
            showExtraOrderModel(event, index) {
                this.extraOrderItemIndex = index
                window.$("#extraOrderModel").modal()
            },
            addExtraOrder(extraOrder) {
                if(Number.isInteger(this.extraOrderItemIndex)) {
                    this.menuOrderItems[this.extraOrderItemIndex].extraOrder = extraOrder
                    this.forceRerender()
                }
            },
            forceRerender() {
                // Remove my-component from the DOM
                this.renderComponent = false;

                this.$nextTick(() => {
                    // Add the component back in
                    this.renderComponent = "banaan";
                });
            }
        },
        data() {
            return {
                menuOrderItems: [],
                activeTable: 1,
                extraOrderItemIndex: null,
                renderComponent: true,
            }
        },
        
    }
</script>

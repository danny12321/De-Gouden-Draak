<template>
        <div class="m-cashdesk">
            <h2>Bestellen voor tafel {{tableId}}</h2>
            <div class="m-cashdesk__gridcontainer">
                <cashdeskmenulist :menuitems="menuitems" @add-menuitem="addMenuitemToOrder"></cashdeskmenulist>
                <cashdesk-order-component :renderComp="renderComponent" :orderItems="menuOrderItems" @show-extra-ordermodel="showExtraOrderModel" @delete-order="deleteOrder" @create-order="createOrder" @delete-item="deleteItem"></cashdesk-order-component>
            </div>

            <model-component @add-extra-order="addExtraOrder" :orderItemIndex="extraOrderItemIndex" :menuitems="menuitems" />

            <order-history-component :orders="orders" @add-history-order="addHistoryOrder"/>
        </div>
</template>

<script>
    export default {
        props: ['menuitems', 'table', 'orders'],
        methods: {
            addMenuitemToOrder(menuitem, amount = 1) {
                this.menuOrderItems.push({menuitem, amount})
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
                axios.post(`/tablet/order/${this.tableId}`, { order })
                .then(res => {
                    alert("Bestelling geplaatst")
                    location.reload()
                })
                .catch(res => {
                    alert("Je mag niet meer dan een keer per 10 minuten betsellen.")
                    document.querySelector('.order-button').disabled = false
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
            },
            addHistoryOrder(order) {
                console.log(order)
                order.orderlines.forEach(orderline => {
                    this.addMenuitemToOrder(orderline.menuitem, orderline.amount)
                });
            }
        },
        data() {
            return {
                menuOrderItems: [],
                activeTable: 1,
                extraOrderItemIndex: null,
                renderComponent: true,
                tableId: JSON.parse(this.table).id,
            }
        },
        
    }
</script>
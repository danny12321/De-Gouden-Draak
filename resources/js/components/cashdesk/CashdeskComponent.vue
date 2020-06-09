<template>
    <div class="m-cashdesk">
        <cashdeskmenulist :menuitems="menuitems" @add-menuitem="addMenuitemToOrder"></cashdeskmenulist>
        <cashdesk-order-component :orderItems="menuOrderItems" @delete-order="deleteOrder"></cashdesk-order-component>
    </div>
</template>

<script>
    export default {
        props: ['menuitems'],
        methods: {
            addMenuitemToOrder(menuitem) {
                this.menuOrderItems.push({menuitem, amount: 1})
            },
            deleteOrder() {
                this.menuOrderItems = []
            }
        },
        data() {
            return {
                menuOrderItems: []
            }
        },
        
    }
</script>

<template>
    <div>        
        <!-- Modal -->
        <div class="modal fade" id="extraOrderModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Voet extra gerecht toe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li v-for="menuitem in extraMenuitems" v-bind:key="menuitem.id" >
                                <div>
                                    <input type="checkbox" v-model="menuitem.checked" v-bind:id="menuitem.name" v-bind:name="menuitem.name">
                                    <label v-bind:for="menuitem.name"> {{menuitem.name}}</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" @click="addExtraOrders">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['menuitems', 'orderItemIndex'],
        methods: {
            filterExtraMenuitems(menuitems) {
                // Needs to be the same in the database
                const extraMenuitemId = 3;
                return menuitems.filter(item => {
                    return item.menuitem_type_id === extraMenuitemId
                }).map(item => {
                    return {...item, checked: false}
                });
            },
            addExtraOrders() {
                let extraOrders = this.extraMenuitems.filter(item => {
                    return item.checked
                })

                this.extraMenuitems = this.extraMenuitems.map(item => {
                    return {...item, checked: false}
                })

                this.$emit('add-extra-order', extraOrders)
            }
        },
        data() {
            return {
                extraMenuitems: this.filterExtraMenuitems(JSON.parse(this.menuitems))
            }
        }
    }
</script>
        
        
        
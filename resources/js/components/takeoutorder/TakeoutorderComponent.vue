<template>
  <div class="m-cashdesk">
    <div class="form-group">
      <label for="name">Naam</label>
      <input v-model="name" class="form-control" type="text" id="name" />
    </div>


    <div class="m-cashdesk__gridcontainer">
      <cashdeskmenulist :menuitems="menuitems" @add-menuitem="addMenuitemToOrder"></cashdeskmenulist>
      <cashdesk-order-component
        :renderComp="renderComponent"
        :orderItems="menuOrderItems"
        @show-extra-ordermodel="showExtraOrderModel"
        @delete-order="deleteOrder"
        @create-order="createOrder"
        @delete-item="deleteItem"
      ></cashdesk-order-component>
    </div>

    <model-component
      @add-extra-order="addExtraOrder"
      :orderItemIndex="extraOrderItemIndex"
      :menuitems="menuitems"
    />
  </div>
</template>

<script>
export default {
  props: ["menuitems"],
  methods: {
    addMenuitemToOrder(menuitem) {
      this.menuOrderItems.push({ menuitem, amount: 1 });
    },
    deleteOrder() {
      this.menuOrderItems = [];
    },
    createOrder() {
      document.querySelector(".order-button").disabled = true;

      let order = this.menuOrderItems.map(m => {
        let extraOrder = [];
        if ("extraOrder" in m) {
          extraOrder = m.extraOrder.map(eo => {
            return {
              menuitem_id: eo.id
            };
          });
        }

        return {
          amount: m.amount,
          description: m.description,
          menuitem_id: m.menuitem.id,
          extraOrder
        };
      });

      const data = {
        name: this.name,
        order
      };

      axios.post(`/order`, data).then(res => {
        window.location.href = `/order/${res.data}`;
      });
    },
    deleteItem(event, orders, index) {
      this.menuOrderItems.splice(index, 1);
    },
    showExtraOrderModel(event, index) {
      this.extraOrderItemIndex = index;
      window.$("#extraOrderModel").modal();
    },
    addExtraOrder(extraOrder) {
      if (Number.isInteger(this.extraOrderItemIndex)) {
        this.menuOrderItems[this.extraOrderItemIndex].extraOrder = extraOrder;
        this.forceRerender();
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
      extraOrderItemIndex: null,
      renderComponent: true,
      name: ""
    };
  }
};
</script>

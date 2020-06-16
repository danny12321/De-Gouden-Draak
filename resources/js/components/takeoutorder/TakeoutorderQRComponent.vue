<template>
  <div>
    <div>
      <img :src="qrurl" alt="qrcode" />
    </div>
    <button v-on:click="print">Print</button>
  </div>
</template>

<script>
export default {
  props: ["orderprops", "orderlinesprops", "guestprops"],
  methods: {
    print() {
      let popup = window.open("target_blank");

      popup.document.write(`<img src="${this.qrurl}">`);
      popup.focus(); //required for IE

      setTimeout(() => {
        popup.print();
        popup.close();
      }, 100);
    }
  },
  mounted() {
    const order = JSON.parse(this.orderprops);
    const orderlines = JSON.parse(this.orderlinesprops);
    const guest = JSON.parse(this.guestprops);

    this.qrurl = `https://api.qrserver.com/v1/create-qr-code/?data=${JSON.stringify(
      {
        id: order.id,
        name: guest.name,
        order: orderlines.map(ol => ol.id)
      }
    )}&size=220x220&margin=5&bgcolor=255-0-0&color=255-255-255`;
  },
  data() {
    return {
      qrurl: ""
    };
  }
};
</script>






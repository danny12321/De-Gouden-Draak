<template>
  <div>
    <div>
      <img class="l-order__qr" :src="qrurl" alt="qrcode" />
    </div>
    <a class="l-order__download btn btn-primary" id="downloadqr" download="qr.png">Download</a>
  </div>
</template>

<script>
export default {
  props: ["orderprops", "orderlinesprops", "guestprops"],
  methods: {},
  mounted() {
    const order = JSON.parse(this.orderprops);
    const orderlines = JSON.parse(this.orderlinesprops);
    const guest = JSON.parse(this.guestprops);
    const link = document.querySelector("#downloadqr");

    this.qrurl = `https://api.qrserver.com/v1/create-qr-code/?data=${JSON.stringify(
      {
        id: order.id,
        name: guest.name,
        order: orderlines.map(ol => ol.id)
      }
    )}&size=${this.size}x${this.size}&margin=0`;

    const canvas = document.createElement("canvas");
    const ctx = canvas.getContext("2d");
    ctx.canvas.width = this.size;
    ctx.canvas.height = this.size;

    const image = new Image(this.size, this.size);
    image.crossOrigin = true;
    image.src = this.qrurl;

    image.onload = () => {
      ctx.drawImage(image, 0, 0);
      link.setAttribute("download", "qr.png");
      link.setAttribute(
        "href",
        canvas.toDataURL("image/png").replace("image/png", "image/octet-stream")
      );
    };
  },
  data() {
    return {
      qrurl: "",
      size: 220
    };
  }
};
</script>






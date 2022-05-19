var Modal = {
  template: `
    <div class="modal" id="detail_barang" tabindex="-1" v-if="detail">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nama Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>{{detail.nama_barang}}</h5>
                    <img v-bind:src="'http://localhost/toko_online/tokoonline/public/foto_produk/'+detail.foto" class="card-img-top" alt="...">
                    <p>{{detail.deskripsi}}</p>
                    <p>Rp. {{detail.harga}}</p>
                                <p>Cart:
                                    <span v-if="getcount(detail)!=null">({{getcount(
                                        detail)}})</span>
                                    <span v-else>(0)</span>
                                </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a class="btn btn-primary" v-on:click="addToCart(detail)">Add To Cart</a> <br>
                                <a class="btn btn-danger" v-on:click="removeItem(detail)">Kurangi</a>
                </div>
            </div>
        </div>
    </div>
    `,
  props: ['detail'],
  methods: {
    getcount(produk) {
      return this.$store.getters.productQuantity(produk);
    },
    addToCart(produk) {
      this.$store.commit('addToCart', produk);
    },
    removeItem(produk) {
      this.$store.commit('removeFromProduct', produk);
    },
  },
};

var Getcustomer = {
  template: `
    <div class = "container">
      <div class="card">
        <div class="card-body">
          <h2 align="center">-- Data Customer --</h2>
            <table class="table tale-hover table-stripped">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama Customer</th>
                  <th>Alamat</th>
                  <th>username</th>
                  <th>Password</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(customer,index) in datacustomer">
                  <td>{{index+1}}</td>
                  <td>{{customer.nama_customer}}</td>
                  <td>{{customer.alamat}}</td>
                  <td>{{customer.username}}</td>
                  <td>{{customer.password}}</td>
                  <td><a v-bind:href="'#/editcustomer/'+customer.id_customer" class="btn btn-dark">Edit</a> | <button class="btn btn-outline-dark"
                  v-on:click="hapus(customer.id_customer)">Delete</button></td>
                </tr>
              </tbody>
            </table>
            <a href="#/tambahcustomer" class="btn btn-outline-dark">Tambah Customer</a>
          </div>
        </div>
      </div>`,
  data() {
    return {
      datacustomer: [],
    };
  },
  methods: {
    async Getcustomer() {
      var option = {
        headers: { Authorization: 'bearer ' + localStorage.getItem('token') },
      };
      var res = await axios.get('http://localhost/toko_online/tokoonline/public/api/getcustomer', option);
      console.log(res);
      this.datacustomer = res.data;
    },
    async hapus(id) {
      var option = {
        headers: { Authorization: 'bearer ' + localStorage.getItem('token') },
      };
      var res = await axios.delete('http://localhost/toko_online/tokoonline/public/api/delete_customer/' + id, option);
      console.log(res);
      this.$router.push('/tampilcustomer');
      this.Getcustomer();
    },
  },
  mounted() {
    this.Getcustomer();
  },
};

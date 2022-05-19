var routes = [
    {path : '/', name:'Home', component: Home},
    {path : '/about', component: About},
    {path : '/tampilcustomer', component: Getcustomer},
    {path : '/tambahcustomer', component: tambahcustomer},
    {path : '/editcustomer/:id', component: Editcustomer},
    {path : '/login', name:'Login', component: Login},
    {path : '/barang', name:'Barang', component: Barang},
    {path : '/keranjang', name:'Keranjang', component: Keranjang},


];

var router = VueRouter.createRouter({
    history: VueRouter.createWebHashHistory(),
    routes, // short for `routes: routes`
  });

var app = Vue.createApp({
    data() {
      return {
        judul: 'Belajar Vue 3', 
        authenticated:(localStorage.getItem('status')=='true'?true:false),
        data:[],
      }
    },
    methods: {
      setAuthenticated(status){
        this.authenticated=status
      },
      logout(){
        this.authenticated=false;
        localStorage.clear();
        //this.redirectlogin()
        location.reload();
      },
      redirectlogin(){
        if(!this.authenticated){
          this.$router.replace({name:"Login"})
        }
      },
    },
    mounted(){
      this.redirectlogin()
      if(JSON.parse(localStorage.getItem('user'))!=null){
        this.data=JSON.parse(localStorage.getItem('user'))
      }
      this.$store.commit('updateCartFromLocalStorage')
    }
  });

app.use(router);
app.use(store);
app.mount('#app');
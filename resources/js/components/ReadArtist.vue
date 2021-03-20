<template>
  <div>
    <!-- disini saya menggunakan bootstrap untuk design tabel nya. secara default bootstrap sudah di include di file welcome.blade.php jadi saya tidak perlu lagi untuk import file nya -->
    <div class="row">
      <router-link class="btn btn-warning mr-5" :to="'/GenreList/'+this.$route.params.id"> Genre List </router-link>
      <router-link class="btn btn-warning" :to="'/ForYou/'+this.$route.params.id"> For You </router-link>
      <div class="col-md-12">
        <br>
        <br>
        <div class="row">
          <div class="col-md-10">
            <h1>Welcome ,  {{ name }} </h1>
            <h1> Halaman list artist </h1>
          </div>
          <div class="col-md-2">
            <!-- push router ke form membuat data -->
          </div>
        </div>
        <br>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Country</th>
            </tr>
          </thead>
          <tbody>
            <!-- menampilkan data ke table -->
            <tr v-for="artist in artists" :key="artist.id">
              <td><router-link :to="'/ReadLagu/'+ $route.params.id"> {{artist.name}}</router-link></td>
              <td>{{artist.country}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<!-- script js -->
<script>
export default {
  data() {
    return {
      // variable array yang akan menampung hasil fetch dari api
      name:'',
      subscriptions: [],
      artists: []
    };
  },
  created() {
    this.loadData(),
    this.loadDataSub(),
    this.loadName();
  },
  methods: {
    loadDataSub(){
       axios.get("http://localhost:8000/api/sub").then(response => {
        this.subList = response.data;
      });
    },
    loadName(){
      axios
        .get("http://localhost:8000/api/members/" + this.$route.params.id)
        .then(response => {
          // post value yang dari response ke form
          this.name = response.data.name;
        });
    },
    loadData() {
      // fetch data dari api menggunakan axios
      axios.get("http://localhost:8000/api/artists").then(response => {
        // mengirim data hasil fetch ke varibale array persons
        this.artists = response.data;
      });
    },
    deleteData(id) {
      // delete data
      axios.delete("http://localhost:8000/api/artists/" + id).then(response => {
        this.loadData();
      });
    }
  }
};
</script>
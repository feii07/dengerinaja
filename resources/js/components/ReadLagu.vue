<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <br>
        <br>
        <div class="row">
          <div class="col-md-10">
            <h1>Welcome ,  {{ name }} </h1>
          </div>
          <div class="col-md-2">
            <!-- push router ke form membuat data -->
          </div>
        </div>
        <br>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Release</th>
              <th scope="col">Artist</th>
            </tr>
          </thead>
          <tbody>
            <!-- menampilkan data ke table -->
            <tr v-for="song in songs" :key="song.id">
              <td style="width:40%"><router-link :to="{ name: 'comment', params: { idMember: $route.params.id,songId: song.id }}">{{song.title}} </router-link></td>
              <td style="width:40%">{{song.releaseYear}}</td>
              <td style="width:40%">{{song.artist.name}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name:'',
      songs: []
    };
  },
  created() {
    this.loadData(),
    this.loadName();
  },
  methods: {
    loadName(){
      axios
        .get("http://localhost:8000/api/members/" + this.$route.params.id)
        .then(response => {
          this.name = response.data.name;
        });
    },
    loadData() {
      // fetch data dari api menggunakan axios
      axios.get("http://localhost:8000/api/songs").then(response => {
        // mengirim data hasil fetch ke varibale array persons
        this.songs = response.data;
      });
    }
  }
}
</script>
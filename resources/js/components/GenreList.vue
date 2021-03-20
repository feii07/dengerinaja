<template>
<div>
    <div class="row">
      <div class="col-md-12">
        <br>
        <br>
        <div class="row">
          <div class="col-md-10">
            <h1> Genre List </h1>
          </div>
          <div class="col-md-2">
          </div>
        </div>
        <br>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Genre</th>
              <th scope="col">Subs</th>
            </tr>
          </thead>
          <tbody>
            <!-- menampilkan data ke table -->
            <tr v-for="genre in genres" :key="genre.id">
              <td>{{ genre.id }}</td>
              <td>
                  <button
                    @click.prevent
                    class="btn btn-outline-danger btn-block"
                    v-if="subscriptions.includes(genre.id)"
                    @click="unsubsGenre(genre.id)"
                  >Unsubscribe</button>

                  <button
                    @click.prevent
                    class="btn btn-outline-success btn-block"
                    v-else
                    @click="subsGenre(genre.id)"
                  >Subscribe</button>
              </td>
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
      genres: [],
      subscriptions: []
    };
  },
  created() {
    this.loadData()
    this.loadSubscriptions();
  },
  methods: {
    loadData() {
      axios.get("http://localhost:8000/api/genres").then(response => {
        this.genres = response.data;
      });
    },
    loadSubscriptions(){
      axios.get('http://localhost:8000/api/subs/'+ this.$route.params.id)
        .then(response=>{
          let x = response.data;
          for(let i =0 ;i<x.length;i++){
            this.subscriptions.push(x[i].genre);
          }
      });
    console.log(this.subscriptions);
    },
    unsubsGenre(genre){
      axios.delete("http://localhost:8000/api/sub/" + this.$route.params.id +"/"+genre).then(response => {
        this.loadData();
        alert('Delete Berhasil');
        window.location.reload()
      });
    },
    subsGenre(gen){
       axios
        .post("http://localhost:8000/api/sub", {
          member: this.$route.params.id,
          genre: gen,
          headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => { 
          console.log(response)
          alert('Subs berhasil');
          window.location.reload()
        })
        .catch(error => {
            console.log(error.response)
            alert('Subs gagal');
        });
    }
  }
}
</script>

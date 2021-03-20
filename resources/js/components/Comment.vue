<template>
    <div>
      <div class="row">
            <div class="col-md-10">
              <h1>{{ judul }} </h1>
              <h5> Artist :  {{ artist }} </h5>
              <h5> Tahun : {{ tahun }} </h5>
            </div>
              <table class="table">
                <thead>
                    <tr>Komentar: </tr>
                </thead>
                <tbody>
                    <tr v-for="comment in comments" :key="comment.id">
                            <div class="row">
                                <td colspan="3" style="text-align: center"> {{ comment.member_id }} , ( {{ comment.postDate }} ) </td>
                            </div>
                            <div class="row">
                                <td colspan="3" style="text-align: center">  {{ comment.comment }} </td>
                            </div>
                    </tr>
                </tbody>
              </table>
              <br><br><br>
              <form @submit.prevent="addData()">
                  <div class="form-group">
                      <span>Komentar Anda: </span>
                        <br>
                        <textarea v-model="form.comment" placeholder="Silahkan Tulis Komentar Anda"></textarea>
                        <br>
                        <button class="btn btn-primary">Submit</button>
                  </div>
              </form>
          </div>
        </div>
</template>

<script>
export default {
  data() {
    return {
      judul: '',
      name:'',
      artist:'',
      tahun:'',
      idMember:'',
      idSong:'',
      comments: [],
       form:{
        comment: ''
      }
    };
  },
  created() {
    this.loadData(),
    this.loadName(),
    this.loadJudul()
  },
  methods: {
     loadData(){
        axios.get('http://localhost:8000/api/comment/'+ this.$route.params.songId)
        .then(response=>{
          this.comments = response.data;
      });
    },
    loadName(){
      axios
        .get("http://localhost:8000/api/members/" + this.$route.params.idMember)
        .then(response => {
          this.name = response.data.name;
          this.idMember = response.data.id;
        });
    },
    loadJudul(){
      axios
        .get("http://localhost:8000/api/songs/" + this.$route.params.songId)
        .then(response => {
          this.judul = response.data.title;
          this.artist = response.data.artist;
          this.tahun = response.data.releaseYear;
          this.idSong = response.data.id;
          axios
            .get("http://localhost:8000/api/artists/" + this.artist)
            .then(response => {
            this.artist = response.data.name;
            });
        })
    },
    addData(){
      axios
        .post("http://localhost:8000/api/comment", {
          comment: this.form.comment,
          member_id: this.idMember,
          song_id: this.idSong,
          headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => { 
          console.log(response)
          alert('Komen berhasil');
          window.location.reload()
        })
        .catch(error => {
            console.log(error.response)
            alert('Komen gagal');
        });
    }
   
  }
}
</script>
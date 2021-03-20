<template>
  <div>
    <div class="row">
      <div class="col-md-6">
        <br>
        <br>
        <h4>Create new data</h4>
        <br>
        <!-- prevent form submit untuk reload halaman, kemudian memanggil function addData() -->
        <form @submit.prevent="addData()">
          <div class="form-group">
            <label>Member ID</label>
            <input
              type="textfield"
              class="form-control"
              placeholder="Input your id"
              v-model="form.id"
              required
            >
          </div>
          <button class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      form:{
        id: ''
      }
    }
  },
  methods: {
    addData() {
      // post data ke api menggunakan axios
      axios
        .post("http://localhost:8000/api/members", {
          id: this.form.id,
          name: this.form.id,
          headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => { 
          console.log(response)
          alert('Login dan register berhasil');
        })
        .catch(error => {
            console.log(error.response)
            alert('login berhasil');
        });
        this.$router.push("/readartist/"+this.form.id);
    }
  }
};
</script>
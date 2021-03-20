<template>
    <div>
        <div class="row">
            <div class="col">
                <h4>DengerinAja!</h4>
                <br>
                <form>
                    <div class="form-group">
                        <label>DengerinAja ID</label>
                        <input
                        name="id"
                        type="textfield"
                        class="form-control"
                        placeholder="Input your Id"
                        v-model="form.id"
                        required
                    >
                    </div>
                    <button class="btn btn-primary"  v-on:click="loginData()">Login</button>
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
        id: '',
      }
    }
  },
  methods: {
    loginData() {
      // post data ke api menggunakan axios
      axios
        .get("http://localhost:8000/api/members/"+ this.$route.params.id)
        .then(response => {
          // push router ke read data
          this.$router.push("/readartist");
        });
        this.$router.push("/create");
    }
  }
};
</script>

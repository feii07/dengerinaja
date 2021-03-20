<template>
    <div>
    <div class="row">
      <div class="col-md-12">
        <br>
        <br>
        <div class="row">
          <div class="col-md-10">
            <h1> Songs by {{ name }} </h1>
          </div>
          <div class="col-md-2">
          </div>
        </div>
        <br>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Genre</th>
            </tr>
          </thead>
          <tbody>
              <tr v-for="subs in subscriptions" :key="subs.id">
                <td v-if="subs.member === $route.params.id">{{ subs.id }}</td>
                <td v-if="subs.member === $route.params.id">{{ subs.genre }}</td>
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
      subscriptions: []
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
      axios.get("http://localhost:8000/api/sub").then(response => {
        // mengirim data hasil fetch ke varibale array persons
        this.subscriptions = response.data;
      });
    }
  }
}
</script>

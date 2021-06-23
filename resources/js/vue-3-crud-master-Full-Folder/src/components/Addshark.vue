Z<template>
  <div class="submit-form">
    <div v-if="!submitted">
      <div class="form-group">
        <label for="name">name</label>
        <input
          type="text"
          class="form-control"
          id="name"
          required
          v-model="shark.name"
          name="name"
        />
      </div>

      <div class="form-group">
        <label for="email">email</label>
        <input
          class="form-control"
          id="email"
          required
          v-model="shark.email"
          name="email"
        />
      </div>

      <button @click="saveshark" class="btn btn-success">Submit</button>
    </div>

    <div v-else>
      <h4>You submitted successfully!</h4>
      <button class="btn btn-success" @click="newshark">Add</button>
    </div>
  </div>
</template>

<script>
import sharkDataService from "../services/sharkDataService";

export default {
  name: "add-shark",
  data() {
    return {
      shark: {
        id: null,
        name: "",
        email: "",
        published: false
      },
      submitted: false
    };
  },
  methods: {
    saveshark() {
      var data = {
        name: this.shark.name,
        email: this.shark.email
      };

      sharkDataService.create(data)
        .then(response => {
          this.shark.id = response.data.id;
          console.log(response.data);
          this.submitted = true;
        })
        .catch(e => {
          console.log(e);
        });
    },
    
    newshark() {
      this.submitted = false;
      this.shark = {};
    }
  }
};
</script>

<style>
.submit-form {
  max-width: 300px;
  margin: auto;
}
</style>

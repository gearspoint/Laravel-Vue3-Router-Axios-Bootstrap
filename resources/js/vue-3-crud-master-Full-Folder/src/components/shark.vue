<template>
  <div v-if="currentshark" class="edit-form">
    <h4>shark</h4>
    <form>
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title"
          v-model="currentshark.name"
        />
      </div>
      <div class="form-group">
        <label for="email">email</label>
        <input type="text" class="form-control" id="email"
          v-model="currentshark.email"
        />
      </div>

      <div class="form-group">
        <label><strong>Status:</strong></label>
        {{ currentshark.published ? "Published" : "Pending" }}
      </div>
    </form>

    <button class="badge badge-primary mr-2"
      v-if="currentshark.published"
      @click="updatePublished(false)"
    >
      UnPublish
    </button>
    <button v-else class="badge badge-primary mr-2"
      @click="updatePublished(true)"
    >
      Publish
    </button>

    <button class="badge badge-danger mr-2"
      @click="deleteshark"
    >
      Delete
    </button>

    <button type="submit" class="badge badge-success"
      @click="updateshark"
    >
      Update
    </button>
    <p>{{ message }}</p>
  </div>

  <div v-else>
    <br />
    <p>Please click on a shark...</p>
  </div>
</template>

<script>
import sharkDataService from "../services/sharkDataService";

export default {
  name: "shark",
  data() {
    return {
      currentshark: null,
      message: ''
    };
  },
  methods: {
    getshark(id) {
      sharkDataService.get(id)
        .then(response => {
          this.currentshark = response.data;
          console.log(response.data);
        })
        .catch(e => {
          console.log(e);
        });
    },

    updatePublished(status) {
      var data = {
        id: this.currentshark.id,
        title: this.currentshark.title,
        email: this.currentshark.email,
        published: status
      };

      sharkDataService.update(this.currentshark.id, data)
        .then(response => {
          console.log(response.data);
          this.currentshark.published = status;
          this.message = 'The status was updated successfully!';
        })
        .catch(e => {
          console.log(e);
        });
    },

    updateshark() {
      sharkDataService.update(this.currentshark.id, this.currentshark)
        .then(response => {
          console.log(response.data);
          this.message = 'The shark was updated successfully!';
        })
        .catch(e => {
          console.log(e);
        });
    },

    deleteshark() {
      sharkDataService.delete(this.currentshark.id)
        .then(response => {
          console.log(response.data);
          this.$router.push({ name: "sharks" });
        })
        .catch(e => {
          console.log(e);
        });
    }
  },
  mounted() {
    this.message = '';
    this.getshark(this.$route.params.id);
  }
};
</script>

<style>
.edit-form {
  max-width: 300px;
  margin: auto;
}
</style>

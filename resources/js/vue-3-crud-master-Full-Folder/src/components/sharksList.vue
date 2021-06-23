<template>
  <div class="list row">
    <div class="col-md-8">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search by name"
          v-model="name"/>
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button"
            @click="searchname"
          >
            Search
          </button>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <h4>sharks List</h4>
      <ul class="list-group">
        <li class="list-group-item"
          :class="{ active: index == currentIndex }"
          v-for="(shark, index) in sharks"
          :key="index"
          @click="setActiveshark(shark, index)"
        >
          {{ shark.name }}
        </li>
      </ul>

      <button class="m-3 btn btn-sm btn-danger" @click="removeAllsharks">
        Remove All
      </button>
    </div>
    <div class="col-md-6">
      <div v-if="currentshark">
        <h4>shark</h4>
        <div>
          <label><strong>name:</strong></label> {{ currentshark.name }}
        </div>
        <div>
          <label><strong>email:</strong></label> {{ currentshark.email }}
        </div>
        <div>
          <label><strong>Status:</strong></label> {{ currentshark.published ? "Published" : "Pending" }}
        </div>

        <router-link :to="'/sharks/' + currentshark.id" class="badge badge-warning">Edit</router-link>
      </div>
      <div v-else>
        <br />
        <p>Please click on a shark...</p>
      </div>
    </div>
  </div>
</template>

<script>
import sharkDataService from "../services/sharkDataService";

export default {
  name: "sharks-list",
  data() {
    return {
      sharks: [],
      currentshark: null,
      currentIndex: -1,
      name: ""
    };
  },
  methods: {
    retrievesharks() {
      sharkDataService.getAll()
        .then(response => {
          this.sharks = response.data;
          console.log(response.data);
        })
        .catch(e => {
          console.log(e);
        });
    },

    refreshList() {
      this.retrievesharks();
      this.currentshark = null;
      this.currentIndex = -1;
    },

    setActiveshark(shark, index) {
      this.currentshark = shark;
      this.currentIndex = shark ? index : -1;
    },

    removeAllsharks() {
      sharkDataService.deleteAll()
        .then(response => {
          console.log(response.data);
          this.refreshList();
        })
        .catch(e => {
          console.log(e);
        });
    },
    
    searchname() {
      sharkDataService.findByname(this.name)
        .then(response => {
          this.sharks = response.data;
          this.setActiveshark(null);
          console.log(response.data);
        })
        .catch(e => {
          console.log(e);
        });
    }
  },
  mounted() {
    this.retrievesharks();
  }
};
</script>

<style>
.list {
  text-align: left;
  max-width: 750px;
  margin: auto;
}
</style>

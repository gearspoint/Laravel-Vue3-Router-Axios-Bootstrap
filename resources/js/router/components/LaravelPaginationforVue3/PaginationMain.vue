<template>
    <div class="container mt-5">
<table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Craeted at</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="d in laravelData.data" v-bind:key="d.id">
        <td>{{ d.id }}</td>
        <td>{{ d.name }}</td>
        <td>{{ d.email }}</td>
        <td>{{ d.created_at }}</td>
      </tr>
    </tbody>
  </table>
<pagination :data="laravelData" @pagination-change-page="getResults"></pagination>
    </div>
</template>

<script>

import LaravelVuePagination from './LaravelVuePagination.vue';
import axios from "axios";
export default {
data() {
		return {
			// Our data object that holds the Laravel paginator data
			laravelData: {},
		}
	},

	mounted() {
		// Fetch initial results
		this.getResults();
	},

	methods: {
		// Our method to GET results from a Laravel endpoint
		getResults(page = 1) {
			axios.get('http://127.0.0.1:8000/api/list?page=' + page)
				.then(response => {
					this.laravelData = response.data;
				});
		}
	},
    components: {
        'pagination': LaravelVuePagination
    },
}
</script>

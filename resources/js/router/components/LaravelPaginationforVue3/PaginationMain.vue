<template>
    <div class="container mt-5">
<input type="text" v-model="search" class="form-control" @keyup="SearchRecord">
<table class="table table-dark table-striped">
    
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">shark_level</th>
        <th scope="col">published</th>
        <!-- <th scope="col">Craeted at</th> -->
        <th scope="col">Edit Record</th>
        <th scope="col">Delete Record</th>
        <th scope="col">Preview Record</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="d in laravelData" v-bind:key="d.id">
        <td>{{ d.id }}</td>
        <td>{{ d.name }}</td>
        <td>{{ d.email }}</td>
        <td>{{ d.shark_level }}</td>
        <td>{{ d.published }}</td>
        <!-- <td>{{ d.created_at }}</td> -->

        <td><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#UpdateModal" @click="GetCurrentRecord(d.id)">Edit Record</button></td>
        <td><button type="button" class="btn btn-danger" @click="DeleteRecord(d.id)">Delete Record</button></td>
        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ViewModal" @click="GetCurrentRecord(d.id)">Preview Record</button></td>
      </tr>
    </tbody>
  </table>
<LaravelVuePagination :data="laravelData" @pagination-change-page="getResults"></LaravelVuePagination>
     <MyModalAdd @recordAdded="RefreshRecords"></MyModalAdd>
     <update-modal :rec="EditRecords" @UpdateRecordEmit="RefreshRecords"></update-modal>
     <View-modal :rec="EditRecords"></View-modal>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#MyModalAdd">
Please Add Record Click Here
</button>
    </div>
</template>


<script>
import LaravelVuePagination from './PaginationMasterFiles/LaravelVuePagination.vue';
import MyModalAdd from './PaginationMasterFiles/ModalAdded/MyModalAdd.vue'
import UpdateModal from './PaginationMasterFiles/ModalAdded/UpdateModal.vue'
import ViewModal from './PaginationMasterFiles/ModalAdded/ViewModal.vue'
import axios from "axios";
export default {
data() {
		return {
			// Our data object that holds the Laravel paginator data
			laravelData: {},
      EditRecords:[],
      errors:[],
      search:'',
		}
	},

	mounted() {
		// Fetch initial results
		this.getResults();
	},

	methods: {
		// Our method to GET results from a Laravel endpoint
		getResults(page = 1) {
			axios.get('http://127.0.0.1:8000/api/sharks?page=' + page)
				.then(response => {
					this.laravelData = response.data.data;
				})
      .catch(error => {
          this.errors=error.response.data.errors;
          console.log(this.errors);
        })
        },
        RefreshRecords(Record){
            this.laravelData = Record.data
      },
                          DeleteRecord(id){
                          axios.delete('http://127.0.0.1:8000/api/sharks/'+id)
                          .then(response => {
                                                 // this.laravelData = response.data;
                            this.getResults();
                                                // console.log("Deleted the record is success");
                            })
                            .catch((error) => console.log(error));
                                              // .catch((error) => console.log("Error is here"));
                             },

  GetCurrentRecord(id){
    console.log(id);
        axios.get('http://127.0.0.1:8000/api/sharks/'+id+'/edit')
        .then(response => this.EditRecords = response.data)
      .catch(error => this.errors=error.response.errors)
      },
                SearchRecord(){
                  if (this.search.length > 0) {
                  axios.get('http://127.0.0.1:8000/api/sharks/search/'+this.search)
                      .then(response => this.laravelData = response.data)
                      .catch(error => console.log(error))
                }else{
                          this.getResults()
                                                }
                                        },

  },
    components: {
          'LaravelVuePagination': LaravelVuePagination,
          'MyModalAdd': MyModalAdd,
          'UpdateModal':UpdateModal,
          'ViewModal':ViewModal,
    },
}
</script>

<template>
<div class="rootinMyModalAdd">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<label for="nameYes">Your Name, Email & Shark Level Here</label>
<textarea class="form-control" placeholder="Enter Name Here" id="nameYes" v-model="nameYes"></textarea>
<textarea class="form-control" placeholder="Enter Email Here" id="email" v-model="email"></textarea>
<textarea class="form-control" placeholder="Enter shark_level Here" id="shark_level" v-model="shark_level"></textarea>
<ul v-if="errors.name" class="list-unstyle">
<li v-for="error in errors.name" :key="error.name" class="alert alert-danger" role="alert">{{ error }}</li>
</ul>
<ul v-if="errors.email" class="list-unstyle">
<li v-for="error in errors.email" :key="error.email" class="alert alert-danger">{{ error }}</li>
</ul>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary" @click='addRecord' >Save changes</button>
</div>
</div>
</div>
</div>
</div>
</template>

<script>
import axios from "axios";
export default {
  name: 'MyModalAdd',
  data(){
      return {
          nameYes:'',
          email:'',
          shark_level:'',
          Success:'',
          errors:[]
      }
  },
methods: {
      addRecord(){
        axios.post("http://127.0.0.1:8000/api/add",{
            "name": this.nameYes,
            "email": this.email,
            "shark_level": this.shark_level,
        })
        .then(data =>{
        this.$emit('recordAdded', data);
        this.Success("Data has been added successfully");
        this.nameYes ='',
            this.email='',
            this.shark_level='';
       })
      .catch(error => {
          this.errors=error.response.data.errors;
          console.log(this.errors);
      })
      }
  },

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>

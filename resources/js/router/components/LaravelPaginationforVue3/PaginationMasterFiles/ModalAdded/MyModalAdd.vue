<template>
<div class="rootinMyModalAdd">
<!-- Modal -->
<div class="modal fade" id="MyModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click='ClearAddData'></button>
</div>
<div class="modal-body">
<label for="nameYes">Your Name, Email & Shark Level Here</label>
<textarea class="form-control" placeholder="Enter Name Here" id="nameYes" v-model="nameYes"></textarea>
<textarea class="form-control" placeholder="Enter Email Here" id="email" v-model="email"></textarea>
<textarea class="form-control" placeholder="Enter shark_level Here" id="shark_level" v-model="shark_level"></textarea>
<textarea class="form-control" placeholder="Enter published Here" id="published" v-model="published"></textarea>
<p class="alert alert-success" v-if="success.length > 0">{{ success }}</p>
<ul v-if="errors.name" class="list-unstyle">
<li v-for="error in errors.name" :key="error.name" class="alert alert-danger" role="alert">{{ error }}</li>
</ul>
<ul v-if="errors.email" class="list-unstyle">
<li v-for="error in errors.email" :key="error.email" class="alert alert-danger">{{ error }}</li>
</ul>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click='ClearAddData'>Close</button>
<button type="button" class="btn btn-primary" @click='addRecord'>Save changes</button>
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
          published:'',
          success:'',
          errors:[]
      }
  },
methods: {
      addRecord(){
        axios.post("http://127.0.0.1:8000/api/sharks",{
            "name": this.nameYes,
            "email": this.email,
            "shark_level": this.shark_level,
            "published":this.published,
        })
        .then(data =>{
        this.$emit('recordAdded', data);
        this.success = "Data has been added successfully";
        this.nameYes ='';
        this.email='';
        this.shark_level='';
        this.published='',
        this.errors = [];
       })
      .catch(error => {
          this.errors=error.response.data.errors;
          console.log(this.errors);
      })
      },
      UpdateRecord(id){
                  axios.put('http://127.0.0.1:8000/api/sharks/'+id,{
                    "name": this.nameYes,
                    "email": this.email,
                    "shark_level": this.shark_level,
                    "published":this.published,
                  })
                        .then(response => {
                             // this.laravelData = response.data;
                             this.getResults();
                             // console.log("Deleted the record is success");
                             })
                        .catch((error) => console.log(error));
                        // .catch((error) => console.log("Error is here"));
                  },
       ClearAddData(){
        this.success ='';
        this.nameYes ='';
        this.email ='';
        this.shark_level ='';
        this.published='';
        this.errors = [];
  },
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

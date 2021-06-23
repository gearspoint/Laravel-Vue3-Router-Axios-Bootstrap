<template>
<div class="ViewModal">
<!-- Modal -->
<div class="modal fade" id="ViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Preview Modal</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<h5 for="nameYes">Your Name, Email & Shark Level Here</h5>
<p id="nameYes"><b>Name: </b>{{rec.name}}</p>
<p id="email"><b>Email: </b>{{rec.email}}</p>
<p  id="shark_level"><b>Shark Level: </b>{{rec.shark_level}}</p>
<p  id="published"><b>Published: </b>{{rec.published}}</p>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</div>
</div>
</template>

<script>
import axios from "axios";
export default {
  name: 'ViewModal',
  props:['rec'],
  data(){

  },

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h5 {
  margin: 40px 0 0;
  color : red;
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
b {
  color: red
}
</style>

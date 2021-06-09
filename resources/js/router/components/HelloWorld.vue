<template>
  <div class="hello">
    <h1>{{ msg }}</h1>
    <button v-on:click="myaxios()">Button myaxios</button>
<ul id="v-for-object" class="demo">

<li v-for="value in myObject" :key="value.id">
<h3>{{ value.id }}</h3>-{{ value.name }}
<!-- -{{ value.email }}-{{ value.created_at }}-{{ value.updated_at }} -->
</li>
</ul>
  </div>
</template>

<script>
//Import Axios in your HelloWorld.vue
import axios from 'axios'
//Add a method to implement Axios

export default {
  name: 'HelloWorld',
  props: {
    msg: String
  },
  data() {
return {
myObject: {

}
}
},methods: {
  myaxios () {
      axios.get('http://127.0.0.1:8000/api/list')
      .then((response) => this.myObject =  response.data)
      .catch((error) => console.log(error));
    }
}
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

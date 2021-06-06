<template>
  <div class="hello">
    <h1>{{ msg }}</h1>

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
  test () {
      axios.get('')
      .then(function (response) {
        alert (response.data);
      })
      .catch(function (error) {
        alert(error);
      });
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

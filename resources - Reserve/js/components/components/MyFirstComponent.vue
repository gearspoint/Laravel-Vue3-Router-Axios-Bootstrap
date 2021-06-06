<template>
<div>
    <h1>{{ msg }}</h1>
<button v-on:click="Hello('Raza')">Button</button>
</div>
</template>

<script>
export default {
  name: 'MyFirstComponent',
  props: {
    msg: String
  },methods: {
      Hello(data)
      {
          alert(data)
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

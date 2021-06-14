<template>
<div id="appcopom">
<h1>{{ msg }}</h1>
<h2>Mysecond Home Tab componet Start</h2>
<li v-for="item in items" :key="item.message"></li>
<h1>Hello App!</h1>
<h2>My second Home Tab componet End</h2>
</div>
</template>

<script>
export default {
  name: 'My2ndComponent',
  props: {
    msg: String
  },
  data() {
return {
items: [{ message: 'Foo' }, { message: 'Bar' }]
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

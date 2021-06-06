<template>
<div id="falto">
  <HelloWorld msg="Welcome to Your.js App"/>
  <MyFirstComponent msg="My 1st Compomnent"/>
  <MyFirstComponent msg="My 1st Compomnent called 2nd time"/>
  <My2ndComponent msg="My 2nd Compomnent"/>
</div>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
import MyFirstComponent from './components/MyFirstComponent.vue'
import My2ndComponent from './components/My2ndComponent.vue'
export default {
  name: 'App',
  components: {
    HelloWorld,
    MyFirstComponent,
    My2ndComponent
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>

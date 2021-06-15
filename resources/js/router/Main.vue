<template>
<div id="main">
  <HelloWorld msg="Welcome to Your.js App"/>
  <PaginationMain/>
  <My2ndComponent msg="My 2nd Compomnent"/>
</div>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
import PaginationMain from './components/LaravelPaginationforVue3/PaginationMain.vue'
import My2ndComponent from './components/My2ndComponent.vue'
export default {
  name: 'Main',
  components: {
    HelloWorld,
    My2ndComponent,
    PaginationMain
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

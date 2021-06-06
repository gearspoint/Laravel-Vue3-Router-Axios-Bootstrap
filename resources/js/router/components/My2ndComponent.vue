<template>
<div id="appcopom">
<h1>{{ msg }}</h1>
<h2>Mysecond componet Start</h2>

<h1>Hello App!</h1>
<p>
<!-- use the router-link component for navigation.  -->
<!-- specify the link by passing the `to` prop. -->
<!-- `<router-link>` will render an `<a>` tag with the correct `href` attribute  -->
<!-- <router-link to="/">Go to Home</router-link>
<router-link to="/about">Go to About</router-link> -->
</p>
<!-- route outlet -->
<!-- component matched by the route will render here -->
<!-- <router-view></router-view> -->
<h2>My second componet End</h2>
</div>
</template>

<script>
export default {
  name: 'My2ndComponent',
  props: {
    msg: String
  }
}
// 1. Define route components.
// These can be imported from other files
// const Home = { template: '<div>Home</div>' }
// const About = { template: '<div>About</div>' }
// 2. Define some routes
// Each route should map to a component.
// We'll talk about nested routes later.
// const routes = [
// { path: '/', component: Home },
// { path: '/about', component: About },
// ]
// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
// const router = new createRouter({
// 4. Provide the history implementation to use. We are using the hash history for simplicity here.
// history: VueRouter.createWebHashHistory(),
// routes, // short for `routes: routes`
// })
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

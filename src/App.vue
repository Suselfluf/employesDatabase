<template>
  <div id="app">
    <h1>UnasDatabase information</h1>
    <departments/>
    <hr>
<!--    <employees v-bind:empls="empls"></employees>-->
  </div>
</template>

<script>
import employees from "./components/employees"
import departments from "./components/departments";

export default {
  name: 'App',
  data() {
    return {
      empls: [
        {name: "Igor Jenkin", depName: "Penza", empSalary: "80000.00", shown: false},
        {name: "Igor Jenkin", depName: "Penza", empSalary: "80000.00", shown: false},
      ]
    }
  },
  components: {
    departments,
    employees
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

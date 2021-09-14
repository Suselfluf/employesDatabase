<template>
  <tr
      v-on:click="showDeptInfo(this.dat.departmentId, this.dat.deptName)">
    <td>{{this.dat.departmentId}}</td>
    <td>{{this.dat.deptName}}</td>
    <td>{{this.dat.numberOfWorkers}}</td>
    <td>{{this.dat.deptSalary}}</td>
  </tr>
</template>
}
<script>
export default{
  props:{
    dat:{
      type: Object,
      required:false
    },
    getWorkers: Function
  },
  data(){
    return{
      fetchInfo: null
    }
  },
  mounted: async function ()
  {
  },
  methods:{
    showDeptInfo: async function(deptId, deptName){
      const response = await fetch(`http://localhost:80/?y=${deptId}`)
      const result = await response.json()
      this.fetchInfo = result
      this.getWorkers(this.fetchInfo, deptId, deptName)
    }
  }

}
</script>
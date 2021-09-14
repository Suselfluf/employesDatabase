<template>
  <button
      v-if="data.deps == null"
      v-on:click="showType">
    Show information
  </button>

  <div className="departmentBlock"
       v-if="data.isDblockVisible">
    <h3>Departments info</h3>
    <div>
    <tabl>
      <tr>
        <th>Id</th>
        <th>Departmemt Name</th>
        <th>№ of Workers</th>
        <th>Average Salary</th>

      </tr>
      <department   v-for="dat of data.deps"
                    v-bind:dat="dat"
                    :getWorkers="getWorkersName"
      />
    </tabl>
    </div>
  </div>

  <div v-if="data.workers != null" className="dptWorkers"
  >
    <button v-on:click="addWorkerFetch(this.data.depNo)">Add worker</button>
    <tble>
    <th><input type="text" v-model="this.data.addingWorkerId" placeholder="Employer Id"></th>
    <th><input type="text" v-model="this.data.addingWorkerName" placeholder="Employer's Full Name"></th>
    <th><input type="text" v-model="this.data.addingWorkerSalary" placeholder="Employer's Salary"></th>
    </tble>
    <h4>{{this.data.depNo}} - {{this.data.depName}}</h4>

    <tabl v-if="this.data.renderComponent">
      <tr>
        <th>Employer Id</th>
        <th>Employer's Full Name</th>
        <th>Employer's Salary</th>
      </tr>
      <tr v-for="emp of this.data.workers"
          v-on:click="showEmpCard(emp.empId)"
      >
        <td>{{emp.empId}}</td>
        <td>{{emp.empName}}</td>
        <td>{{emp.empSalary}}</td>
      </tr>
      <div class="nav">
        <p v-on:click="prvAction">Back</p>
        <p v-on:click="frwdAction">Forward</p>
      </div>
    </tabl>
  </div>
  <employee v-if="data.empShown"
            v-bind:empl="data.emp"
            :showEmp="empBackFunc"
  />


</template>

<script>
import {onMounted} from "vue";
import employee from "./employee";

// const axios = require('axios').default;
import department from "./department";

export default {
  data() {
    return {
      data: {
        workers: null,
        urlDeps: 'http://localhost:80/?m=departmentpage',
        deps: null,
        depNo: null,
        depName: null,
        isElVisible:false,
        isDblockVisible:false,
        empShown:false,
        emp: null,
        addingWorkerName: null,
        addingWorkerId:null,
        addingWorkerSalary:null,
        renderComponent: true,
      }
    }
  },
  methods: {
    showType: async function(){
      this.data.isElVisible = !this.data.isElVisible
      this.data.isDblockVisible = true
      const response = await fetch('http://localhost:80/?m=departmentpage')
      const result = await response.json()
      this.data.deps = result;
      console.log('showType')
    },
    getWorkersName(array, deptId, deptName){
      this.data.depNo = deptId
      this.data.depName = deptName
      this.data.workers = array
      this.data.isDblockVisible = !this.data.isDblockVisible
      console.log('getWorkeresName')
    },
    prvAction(){
      this.data.isElVisible = !this.data.isElVisible
      this.data.isDblockVisible = !this.data.isDblockVisible
      this.data.workers = null
    },
    frwdAction(){

    },
    showEmpCard: async function(empId){
      const response = await fetch(`http://localhost:80/?e=${empId}`)
      const result = await response.json()
      this.data.emp = result
      this.data.workers = null
      this.data.empShown = !this.data.empShown
    },
    empBackFunc(){
      this.data.isElVisible = !this.data.isElVisible
    },
    addWorkerFetch: async function(deptId){
      this.data.renderComponent = false;
      const empName = this.data.addingWorkerName.replace(/ /, "_")
      const empId = this.data.addingWorkerId
      const empSalary = this.data.addingWorkerSalary
      await fetch(`http://localhost:80/?d=${empId}/${empName}/${empSalary}/${deptId}`)
      this.$nextTick(()=>{
        this.data.renderComponent = true;
      });
    }


  },
  mounted: async function ()
  {
  },
  components: {
    department,
    employee

  }
//
}
</script>
<style>
td, th {
  border: 1px solid #999;
  padding: 0.5rem;
}
.table{
  display: flex;
  margin-left: auto;
  margin-right: auto;
}
.dptWorkers{
  margin-top: 20px;
  display: block;
}
.nav{
  display: grid;
  grid-template-columns: 1fr 1fr;
  margin-left: 250px;
  margin-right: 250px;
  /*width: 400px;*/

}
</style>
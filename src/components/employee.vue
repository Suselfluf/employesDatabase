<template>
  <button v-on:click="deleteWorkerFetch"
  >Delete worker</button>
  <button v-on:click="showTheForms"
  >Edit worker's info</button>
  <div class="empCardWrapper">

    <div class="empId">
      <p>Employer's name: {{this.$props.empl[0].empName}}</p>
    </div>
    <div class="empImg">
      <p>Image</p>
    </div>
    <div class="empDecr">
      <p>Working in: {{this.$props.empl[0].deptName}}</p>
      <p>Salary is: {{this.$props.empl[0].empSalary}}</p>
    </div>
  </div>

  <div class="formsDiv" v-if="showForms">
    <h3>To modifie worker's information fill the forms and press "Done" button</h3>
    <p>Name: <input type="text" v-model="this.empName" placeholder="New Name"></p>
    <p>Salary<input type="text" v-model="this.empSalary" placeholder="New Salary"></p>
    <button v-on:click="editWorkerFetch">Done</button>
  </div>
</template>

<script>

export default {
  props:{
    empl:{
      type: Object,
      required:true
    },
    showEmp: Function
  },
  data(){
    return{
      showForms:false,
      empName:null,
      empSalary:null,
      deptId:null
    }
  },
  methods:{
    deleteWorkerFetch: async function(){
      await fetch(`http://localhost:80/?del=${this.$props.empl[0].empId}`)
      location.reload()
    },
    showTheForms: function() {
      this.showForms = !this.showForms
    },
    editWorkerFetch: async function(){
      const empName = this.empName.replace(/ /, "_")
      const empId = this.$props.empl[0].empId
      const empSalary = this.empSalary
      await fetch(`http://localhost:80/?upd=${empName}/${empId}/${empSalary}`)
      this.$props.empl[0].empName = empName
      this.$props.empl[0].empSalary = empSalary
    }
  }

}
/// Можно модифицировать поля без обновления страницы, просто обращаясь к атрибутам this.data = dsd
</script>

<style>
.empCardWrapper{
  display: grid;
  border: solid black;
  border-radius: 5px;
  margin-left: 25%;
  margin-right: 25%;
  grid-template-columns: 1fr 1fr;
}
.empId{
  grid-column: 1/3;
  justify-content: center;
}
.empImg{
  border: dashed red;
  align-self: center;
  margin: 5px;
  width: 220px;
  height: 220px;
}
.empDecr{
  align-self: center;
}
.formsDiv{
  border:solid lightsalmon;

}
</style>


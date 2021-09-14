<?php
include ("./db.php");

class Employee {

    protected $db = null;

    public function __construct () {
        
        $this->db = DB::connToDB();

    }

    public function Init($empId){
        
        $query = "SELECT e.empId, e.empName, e.empSalary, d.deptName
        from employee e join department d
        on e.departmentId = d.departmentId
        where empId = '$empId';";

        if ($result = $this->db->query($query)){
            while ($empInfo=$result->fetch_object()){
                $resp[] = $empInfo;
            }
        }

        return $resp;
    }

    public function deleteWorker($empId){

        $query = "DELETE from employee
        where empId = '$empId';";


        if($this->db->query($query) == TRUE){
            echo "New record was deleated successfully";
        }else{
            echo "Error: " . $query . "<br> " . $this->db->error;
        }
    }
    public function updateWorker($empInfo){
        $empName = $empInfo[0];
        $empId = $empInfo[1];
        $empSalary = $empInfo[2];

        $query = "UPDATE employee
        set empName = '$empName', empSalary = '$empSalary'
        where empId = '$empId';";

        if($this->db->query($query) == TRUE){
            echo "Record was modified successfully";
        }else{
            echo "Error: " . $query . "<br> " . $this->db->error;
        }

        return $empInfo;
    }
}
<?php
include ("./db.php");

class Department {

    protected $db = null;

    public function __construct () {
        
        $this->db = DB::connToDB();

    }

    public function Init($deptId){
        
        $query = "SELECT * from employee
        where departmentId = '$deptId';";

        if ($result = $this->db->query($query)){
            while ($dptInfo=$result->fetch_object()){
                $resp[] = $dptInfo;
            }
        }

        return $resp;
    }
    public function addWorker($dpt){
        $empId = $dpt[0];
        $empName = $dpt[1];
        $empSalary = $dpt[2];
        $dptId = $dpt[3];

        // echo $empId, $empName, $empSalary, $dptId;

        $adding = "INSERT into employee values
        ('$empId', '$empName', '$empSalary', '$dptId');";

        if($this->db->query($adding) == TRUE){
            echo "New record was created successfully";
        }else{
            echo "Error: " . $adding . "<br> " . $this->db->error;
        }
    }
}
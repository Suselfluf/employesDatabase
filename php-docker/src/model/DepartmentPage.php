<?php
include ("./db.php");

class DepartmentPage {

    protected $db = null;
    public $i = 0;

    public function __construct () {
        
        $this->db = DB::connToDB();



    }

    public function Init(){

        $normQuery = "SELECT d.departmentId, d.deptName, d.deptSalary, count(e.empName) as numberOfWorkers
        from department d inner join employee e 
        on e.departmentId = d.departmentId
        group by d.departmentId;";

        if ($result = $this->db->query($normQuery)){
            while ($sol=$result->fetch_object()){
                $goods[] = $sol;
            }
        }

        return $goods;
    }
}
<?php

class DB{

    const SRVR = "db";
	const USER = "root";
	const PASS = 'example';
	const DB   = "UnasDatabase";
	public $conn = null;

    
    public function __construct(){
        
    }

	public static function connToDB() {

       
        $srvr = self::SRVR;
		$user = self::USER;
		$pass = self::PASS;
		$db   = self::DB;

        // $stmt = $pdo->query('SELECT deptName FROM department');
        // while ($row = $stmt->fetch())
        // {
        //     echo $row['depName'] . "\n";
        // }

		// $depName = 'Penza';
	

        $mysqli = new mysqli ($srvr,$user,$pass,$db);

		// $query = "SELECT e.empName as empName, d.deptName as deptName, d.deptSalary as deptSalary, count(*) as countAll
        // from employee e join department d
        // on e.departmentId = d.departmentId
		// WHERE d.deptName = '$depName'
        // GROUP BY e.empName, d.deptName, d.deptSalary;";


        // if ($result = $mysqli->query($query)){
        //     while ($data=$result->fetch_object()){
        //         $depts[] = $data;
        //     }
        // }


		// foreach ($depts as $d ){
        //     echo "<br>";
        //     echo $d->empName . "\t" . $d->deptName . "\t" . $d->deptSalary . "\t" . $d->countAll;
        //     echo "<br>";
        // }

		// return $mysqli;
        return $mysqli;
    
	
	}

}
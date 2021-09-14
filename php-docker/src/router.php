<?php


spl_autoload_register(function($class){
    $class = ucfirst($class);
    if(is_file("./model/".$class.".php")){  				// Define if is the file is a standart file
        include "./model/".$class.".php";
        if(!class_exists($class, false)){
            exit("Class ".$class." not found");
        }
    }else{
        exit("Module ".$class." not found");
    } 
});

if(isset($_GET['m']) && preg_match("/[a-zA-z0-9.-_]{3,24}$/i", $_GET['m'])){        // getting the adress of /?m=var
    $model = new $_GET['m'];
    $resp = null;
    
    header("Access-Control-Allow-Origin: *");                   ##headers of the page Enter all
    header("Content-Type: application/json; charset=UTF-8");    #Format response in json format

    if(!method_exists($_GET['m'],"Init")){  //if class doesnot have init method
        exit('Method init has not found');
    }else{
        // print_r($model->Init());
        $resp = json_encode($model->init());
        echo $resp;
        return $resp;
    }
}elseif($_GET['y']){
    $dptId = $_GET['y'];
    $dpt = new Department;
    $resp = json_encode($dpt->init($dptId));
    echo $resp;
}elseif($_GET['e']){
    $employeId = $_GET['e'];
    $emp = new Employee;
    $resp = json_encode($emp->init($employeId));
    echo $resp;
}elseif($_GET['d']){
    $deptInfo = $_GET['d'];
    $deptInfo = explode("/", $deptInfo);
    $deptInfo[1] = str_replace("_", " ", $deptInfo[1]);
    $dpt = new Department;
    $resp = json_encode($dpt->addWorker($deptInfo));
    echo $resp;
}elseif($_GET['del']){
    $empId = $_GET['del'];
    $emp = new Employee;
    $resp = json_encode($emp->deleteWorker($empId));
    // echo $resp;
}elseif($_GET['upd']){
    $empInfo = $_GET['upd'];
    $empInfo = explode("/", $empInfo);
    $empInfo[0] = str_replace("_", " ", $empInfo[0]);
    $emp = new Employee;
    $resp = json_encode($emp->updateWorker($empInfo));
    echo print_r($resp);
    
}

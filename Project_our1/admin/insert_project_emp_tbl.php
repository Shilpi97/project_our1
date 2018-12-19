<?php
session_start();
$result="";

  require 'connection1.php';
  
$project_id=$_POST['project_id'];
$employee_id=$_POST['employee_name'];
$working_area_id=$_POST['working_area_name'];
  
 $data1 = array("project_id" => $project_id, "employee_id" => $employee_id, "working_area_id" => $working_area_id);

 $data_string = json_encode($data1);

 $user_insert = curl_init('http://localhost:3000/project_emp');                                                                      
curl_setopt($user_insert, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($user_insert, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($user_insert, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($user_insert, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     
$result=curl_exec($user_insert);

if($result)
{
      $msg="inserted successfully";
      echo $msg;
      exit();
}

else
{
	$msg="not successfully";
      echo $msg;
      exit();
}

?>
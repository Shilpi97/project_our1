<?php
session_start();
$name=$_SESSION['manager_id'];
if(isset($_POST['no_of_slot']))
{
  
  //require 'connection.php';
   $pname=$_POST['no_of_slot'];
    $datee=$_POST['n2'];
    $t1=$_POST["t1"];
} 

// Insert
$msg="";
 $data1 = array("project_name" => $pname, "manager_id" => $name, "start_date" => $datee,"description" => $t1);                                                                    
$data_string = json_encode($data1);                                                                                   
                                                                                                                     
$c = curl_init('http://localhost:3000/project_table');                                                                      
curl_setopt($c, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($c, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($c, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($c);


?>
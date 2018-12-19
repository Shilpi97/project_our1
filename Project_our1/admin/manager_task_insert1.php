<?php
session_start();
$result="";


  require 'connection1.php';
  require 'finalupload.php';
  
$one=1;  
$picname=$_FILES["fileToUpload"]["name"];
$emp=$_POST["hase"];
$daa=$_POST["has"];
$qry="UPDATE task_tbl SET employee_task_link='".$picname."' WHERE task_id='".$one."'  ";
  $rs1=mysqli_query($conn,$qry);                                                                                          
                                                     
if($rs1)
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

$q2="INSERT INTO `task_tbl`(`employee_id`, `manager_task_link`, `timecheck`, `manager_id`, `isactive`, `employee_task_link`) VALUES (35,'fh',$daa,31,0,'ftyf')"; $rs3=mysqli_query($conn,$q2);

$qry1="insert into notification_tbl (`notification_description`, `employee_id`, `manager_id`, `isactive`, `notification_type`) VALUES ('fff',$emp,31,3,'pending')" ;
  $rs2=mysqli_query($conn,$qry1);                                                                                          
                                                     
if($rs2)
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
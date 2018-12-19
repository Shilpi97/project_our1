<?php
session_start();
$result="";


  require 'connection.php';
  require 'finalupload.php';
  
$one=1;  
$picname=$_FILES["fileToUpload"]["name"];

$qry="UPDATE task_tbl SET manager_task_link='".$picname."' WHERE task_id='".$one."'  ";
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

?>
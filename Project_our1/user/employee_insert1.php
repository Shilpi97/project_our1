<?php
session_start();
$result="";
if(isset($_POST['user_firstname']) && $_POST['password']==$_POST['c_password'])
{
  require 'connection.php';
  require 'finalupload.php';
  $fname=$_POST['user_firstname'];
  $mname=$_POST['user_middlename'];
   $lname=$_POST['user_lastname'];
  $add=$_POST['address'];
  $city=$_POST['city_name'];
  $date_of_birth=$_POST['date_of_birth'];
$contact_number=$_POST['contact_number'];
$designation=$_POST['designation'];
$jdate=$_POST['jdate'];
$gen=$_POST['gen1'];
$user_id=$_POST['user_id'];
$password=$_POST['password'];
$picname=$_FILES["fileToUpload"]["name"];
$_SESSION['email_manager']=$user_id;
$_SESSION['contact']=$contact_number;
 $data1 = array("user_firstname" => $fname, "user_middlename" => $mname, "user_lastname" => $lname, "designation" => $designation, "joining_date" => $jdate, "email_id" => $user_id, "address" => $add, "city_id" => $city, "contact_number" => $contact_number, "gender" => $gen, "date_of_birth" => $date_of_birth, "password" => $password, "user_image" => $picname , "isactive" => 1);

 $data_string = json_encode($data1);

 $user_insert = curl_init('http://localhost:3000/user');                                                                      
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
}
?>
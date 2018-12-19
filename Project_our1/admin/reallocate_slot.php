<?php
session_start();
require 'common/header.php';
$id=$_REQUEST["id"];
$_SESSION['employee']=$id;
$managerid=$_SESSION['manager_id'];


$url1="http://localhost:3000/delete_select_slot/".$id."/".$managerid;
//$recordId="8";



 $curl = curl_init($url1);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// Make the REST call, returning the result
$response = curl_exec($curl);
if($response)
{
    header('location:updarereallocate_slot.php');
}

?>





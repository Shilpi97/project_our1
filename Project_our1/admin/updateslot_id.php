<?php
session_start();
require 'common/header.php';

$id1=$_REQUEST["id"];

echo $id." ".$id1;
?>
<html>
<head>


<title></title>
</head>
<body>
<?php


$data = array("employee_id" => 0, "isactive" => 0);
$data_json = json_encode($data);
$url1="http://localhost:3000/delete_select_slot/".$id1;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response  = curl_exec($ch);
curl_close($ch);
if($response)
{
    header("location:viewslot1.php");
}


?>

             <!-- /. PAGE INNER  -->
<?php require 'common/bottom.php'; ?>


?>





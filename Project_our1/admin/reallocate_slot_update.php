<?php
    
 session_start();
$name=$_SESSION['manager_id'];
$name1=$_SESSION['employee'];
$msg="";
$result1="";
$is=1;
$no_of_slot="";

if(isset($_POST['no_of_slot']))
{
  
  
   $starting_hour=$_POST['starting_slot_hour'];
    $no_of_slot=$_POST['no_of_slot'];
}    


set_time_limit(0);
$a="";
    
   $url="http://localhost:3000/starting_slot/".$starting_hour;
  
  $someArray =    json_decode(get_data($url), true);
  $temp=null; // Replace ... with your PHP Array
 foreach ($someArray as $key => $value) {
  //echo $value["slot_id"] ."<br>";
$a=$value["slot_id"];
   }
  
function get_data($url)
{
$ch = curl_init();
//$timeout = 500;
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}

//echo "<br>".$total_slot;

//insert into manager table
//$managerid=1;
//$emp=9; //ahiyaa eee emp je seesion thi avsee
for($i=0;$i<$no_of_slot;$i++)
{
 $data = array("employee_id" => $name1,"isactive" => 1);
$data_json = json_encode($data);
$c=$a+$i;

$url1="http://localhost:3000/allocate_slot_to_employee/".$c."/".$name;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response  = curl_exec($ch);
curl_close($ch);                                                                                                                  
}  



 if($response)
    {
      $msg="Allocate successfully";
      echo $msg;

    }
    else
    {
      $msg="not successfully";
      echo $msg;
      

    }





?>

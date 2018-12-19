<?php
set_time_limit(0);

//$uname = $_POST['uid_txt'];
//$pass = $_POST['pass_txt'];
if(isset($_POST['email_id']))
{
	$uname = $_POST['email_id'];
	$pass = $_POST['password'];
}


    
   $url="http://localhost:3000/employee_login_check";
  
  $someArray =    json_decode(get_data($url), true);
  $temp=null; // Replace ... with your PHP Array
 foreach ($someArray as $key => $value) {
  echo $value["email_id"] . ", " . $value["password"] . "<br>";
if($value["email_id"]==$uname && $value["password"]==$pass)
{
    header("location:../task_upload_employee.php");
}
else if($value["email_id"]!=$uname && $value["password"]!=$pass)
{
	header("location:../login_employee.php?er_ms=you have enter wrong user-id and password");
}
else if($value["email_id"]==$uname && $value["password"]!=$pass)
{
	header("location:../login_employee.php?er_ms=you have enter wrong password");
}

}
   
  


//   // Loop through Object
//  /// $someObject =   json_decode(get_data($url)); // Replace ... with your PHP Object
//   //foreach($someObject as $key => $value) {
//     //echo $value->empname . ", " . $value->empage . "<br>";
//   //}
// //echo($url);
// }
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



?>
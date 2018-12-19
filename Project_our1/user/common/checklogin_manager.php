<?php
session_start();

set_time_limit(0);

$uname = $_POST['uid_txt'];
$pass = $_POST['pass_txt'];
if(isset($_POST['email_id']))
{
	$uname = $_POST['email_id'];
	$pass = $_POST['password'];
}
require '../connection.php';
$qry = "SELECT * FROM user_tbl WHERE email_id='".$uname."' ";
	echo "$qry";
	$rs = mysqli_query($conn,$qry);
	if (mysqli_num_rows($rs) > 0)
	{
		$row = mysqli_fetch_assoc($rs);
		$_SESSION['manager_id']=$row['user_id'];
		
		//Coockies
		
		
	}

    
   $url="http://localhost:3000/manager_login_check";
  
  $someArray =    json_decode(get_data($url), true);
  $temp=null; // Replace ... with your PHP Array
 foreach ($someArray as $key => $value) {
  echo $value["email_id"] . ", " . $value["password"] . "<br>";
if($value["email_id"]==$uname && $value["password"]==$pass)
{
    header("location:../../admin/index1.php");
}
else if($value["email_id"]!=$uname && $value["password"]!=$pass)
{
	header("location:../login_manager.php?er_ms=you have enter wrong user-id and password");
}
else if($value["email_id"]==$uname && $value["password"]!=$pass)
{
	header("location:../login_manager.php?er_ms=you have enter wrong password");
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
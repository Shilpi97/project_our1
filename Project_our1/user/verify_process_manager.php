<?php session_start();

?>
<?php
 
$msg="";
$is=1;
$same="";
date_default_timezone_set("Asia/Kolkata");
if(isset($_POST['code_txt']) )
{
  require 'connection.php';

 $ver=$_POST['code_txt'];
 $contact=$_POST['email'];
 $ss="blocked";
 $is=2;
  
  $sel="SELECT * FROM verification";
  $rs=mysqli_query($conn,$sel);

  if(mysqli_num_rows($rs)>0)
  {
    while($data=mysqli_fetch_assoc($rs))
    {
      if($data['code']==$ver)
      {

    
      echo "login_manager.php";
      //echo "$msg";

    }
    else
    {
      
        echo "#";
    }
      
    }
  }
  else
  {
    echo "code not found";
  }
  

}
else
{
  echo "plz match";
}



 ?>
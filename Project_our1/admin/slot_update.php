<?php
    
 session_start();
$name=$_SESSION['manager_id'];
$msg="";
$result1="";
if(isset($_POST['starting_slot_hour']))
{
  
 // require 'connection.php';
   $starting_hour=$_POST['starting_slot_hour'];
    $starting_mintue=$_POST['starting_slot_min'];
     $ending_hour=$_POST['ending_slot_hour'];
      $ending_mintue=$_POST['ending_slot_min'];
//echo $starting_hour.":".$starting_mintue."  "."to"."  ".$ending_hour.":".$ending_mintue;

$start_concate=$starting_hour.":".$starting_mintue;
$end_concate=$ending_hour.":".$ending_mintue;
                                                                                                                 
                                                                                                                     


if($starting_hour<$ending_hour)
{
    if($starting_mintue<=$ending_mintue)
    {
         $t31=$ending_hour-$starting_hour;
         $t32=$ending_mintue-$starting_mintue;
    }
    else
    {
        $t31=$ending_hour-$starting_hour-1;
         $t32=60-($starting_mintue-$ending_mintue);
    }
    //echo $t31.":".$t32;
}
elseif($starting_hour=$ending_hour)
{
    if($starting_mintue<=$ending_mintue)
    {
         $t31=$ending_hour-$starting_hour;
         $t32=$ending_mintue-$starting_mintue;
       //  echo $t31.":".$t32;
    }
    else
    {
        echo "no slots available";
    }
    
}
else
{
    echo "no slots available";
}

$total_slot=$t31*6;
$total_slot+=$t32/10;


// delete first isactive zero

$managerid=1;
$url1="http://localhost:3000/delete_slot/".$name;
//$recordId="8";



 $curl = curl_init($url1);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// Make the REST call, returning the result
$response = curl_exec($curl);

//insert into manager table

 $data2 = array("manager_id" => $name, "start_time" => $start_concate, "end_time" => $end_concate,"total_appointment" => $total_slot);                                                                    
$data_string2 = json_encode($data2);                                                                                   
                                                                                                                     
$c2 = curl_init('http://localhost:3000/manage_appoint');                                                                      
curl_setopt($c2, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($c2, CURLOPT_POSTFIELDS, $data_string2);                                                                  
curl_setopt($c2, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($c2, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string2))                                                                       
);                                                                                                                   
                                                                                                                     
$result2 = curl_exec($c2);





$firstadded=$starting_hour.":".$starting_mintue;
 $data1 = array("manager_id" => $name, "slot_time" => $firstadded, "employee_id" => 0, "isactive" => 0);                                                                    
$data_string = json_encode($data1);                                                                                   
                                                                                                                     
$c = curl_init('http://localhost:3000/slot');                                                                      
curl_setopt($c, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($c, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($c, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($c);
for($i=0; $i<$total_slot-1; $i++)
{
    $starting_mintue+=10;
    if($starting_mintue==60)
    {
        $starting_hour++;
        $starting_mintue='00';
    }
    $store=$starting_hour.":".$starting_mintue;
   // echo "<br>".$store;
    $data2 = array("manager_id" => $name, "slot_time" => $store, "employee_id" => 0, "isactive" => 0);                                                                    
$data_string1 = json_encode($data2);                                                                                   
                                                                                                                     
$c1 = curl_init('http://localhost:3000/slot');                                                                      
curl_setopt($c1, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($c1, CURLOPT_POSTFIELDS, $data_string1);                                                                  
curl_setopt($c1, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($c1, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string1))                                                                       
);                                                                                                                   
                                                                                                                     
$result1 = curl_exec($c1);
 
}
 if($result1)
    {
      $msg="inserted successfully";
      echo $msg;

    }
    else
    {
      $msg="not successfully";
      echo $msg;
      

    }



}

?>

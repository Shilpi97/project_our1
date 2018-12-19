  <?php

    session_start();
// if(!isset($_SESSION['userid']))
// {
//   header("location:index.php");
// }

   require 'common/top.php';
    


 ?>


<html>
<head>
<script src="js/jquery.js" type="text/javascript"></script>
   <script type="text/javascript">
  $(document).ready(function() {
    
      $("#allocate_slot_form").on('submit',function(e){
        e.preventDefault();
        $.ajax({    //create an ajax request to load_page.php
            type: "POST",
            url: "allocate_slot_update.php",             
            data:new FormData(this), // "coun_id="+id, {}
            cache       : false,
            contentType : false,
            processData : false, //expect html to be returned                
            success: function(response){
          alert(response);
         // $('#display').html(response);         
            }
            

        });
      });
});
  </script>

<title></title>
</head>
<body>

        <div id="page-wrapper" >
            <div id="page-inner" class="back1">
            <div class="row">
            <div class="col-md-12">
           
 <div id="display">
   


 </div> 
            <h2>No of slots</h2>
               
                                          <div class="form-group">
                                          <form method="post" id="allocate_slot_form" >
                                          <div class="col-md-6">
                                           <input type="number" style="width:100%;" name="no_of_slot" min="1" max="24">
                                        </div>
    <br>
    
    <h2>Starts from</h2>
                                     <div class="col-md-6">
                                            
<select class="form-control" name="starting_slot_hour">
<?php
set_time_limit(0);
$date="";
date_default_timezone_set("Asia/Kolkata");

$hour=date("H");
$min=date("i");
//echo "The time is ".$hour." ".$min;




// $month = $date[0];
// $day   = $date[1];
// $year  = $date[2];
    $manager=31;
   $url="http://localhost:3000/slot/31";
  
  $someArray =json_decode(get_data($url), true);
  $temp=null; // Replace ... with your PHP Array
 foreach ($someArray as $key => $value) {
    
            $date = $value["slot_time"];
           // echo $date;
           $date = explode(':', $date);
            //  echo $hour;
            if($date[0]>$hour)
            {?>
              <option value=<?php echo $value["slot_time"] ?> ><?php echo $value["slot_time"] ?>

          <?php  } ?>
          <?php
         if ($date[0]==$hour)

           {
               if($date[1]>$min)
               {
                ?>
              <option value=<?php echo $value["slot_time"] ?> ><?php echo $value["slot_time"] ?>

          <?php  }
          
          } 
          }
          ?>
        

            

      
      <?php

   
  
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

   
    
   </select>


                                             </div>
                                      
                                     
                                             <br>
                                             
                                             <br>
            <br>
                                            
                        
                       <input type="submit" name="submit_allergy" id="allergy_id" class="btn btn-default" value="ADD"></input>
                        </form>
                        </div>
                    </div>
                </div>
              
               </div>
    </div>
             <!-- /. PAGE INNER  -->
<?php require 'common/bottom.php'; ?>


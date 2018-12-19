
<html>
<head>
<script src="js/jquery.js" type="text/javascript"></script>
   <script type="text/javascript">
  // $temp="";
//     $(document).ready(function() {
    
// //       $(".delete").click(function(e) {                
         
// //           e.preventDefault();
// //           var element = $(this);
// //           var del_id = element.attr("id");
         
// //           var qrystrng = 'id='+del_id;
         
// //           var retval=confirm("are you sure you want to delete? ");
// //                 if(retval==true)
// //                 {
// //                $.ajax({    //create an ajax request to load_page.php
// //                type: "POST",
// //                url: "laboratory_delete.php",             
// //                data:qrystrng,
// //               dataType: "html",  //expect html to be returned                
// //               success: function(response){
// //               window.location.href="laboratory_table.php"          
// //             }
            

// //         });
// //                 }
// //                 else
// //                 {
// //                     $.ajax({    //create an ajax request to load_page.php
// //                 type: "POST",
// //                 url: "laboratory_table.php",             
// //                  data:qrystrng,
// //                dataType: "html",  //expect html to be returned                
// //                  success: function(response){
                
// //                          window.location.href="laboratory_table.php";
// //                 //return true;
// //                           }   
// // });
// //             }

// //     });


//   $(".update").click(function(e) {                
       
//           e.preventDefault();
//           var element = $(this);
//           var update_id = element.attr("id");
         
//           var qrystrng = 'id='+update_id;
//            $.ajax({    //create an ajax request to load_page.php
//             type: "POST",
//             url: "reallocate_slot.php",             
//             data:qrystrng,
//             dataType: "html",  //expect html to be returned                
//             success: function(response){
             
//             }
            

//         });
//     });



//   });
 </script>

</head>
 <?php
  session_start();
// if(!isset($_SESSION['userid']))
// {
//   header("location:index.php");
// }

  require 'common/top.php';

        require 'connection1.php';

      //  $qry = "select employee_id,slot_time from slot_tbl where isactive=1 and manager_id=1";
          $qry = "select slot.slot_id,slot.employee_id,user.user_firstname,user_lastname,slot.slot_time from slot_tbl slot,user_tbl user where user.user_id=slot.employee_id and user.designation='employee' and slot.isactive=1 and slot.manager_id=31"; 
        $rs = mysqli_query($conn,$qry);
?>


        <div id="page-wrapper" >
            <div id="page-inner" class="back1">
                <div class="row">

                    <div class="col-md-12" style="overflow: auto;">
                    <h2>Slot Table</h2>
                    
                    <div>
                        <table border=2 width=100% style="
    font-size: 20px; margin-top: 20px;">
                        
                        <tr class="colorheading1">
                        <td class="">FirstName</td>
                         <td class="">LastName</td>
                          <td class="">Slot Time</td>
                    

                        <td class="">Reallocate</td>
                        <td class="">Free</td>
                        </tr>
                    
                                <?php
                                    if (mysqli_num_rows($rs) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($rs)) 
                                        {
                                           // $_SESSION['eslot']=$row["slot_id"];
                                           $vars=array('employee_id' =>$row["employee_id"], 'slot_id' =>$row["slot_id"]);
                                           $arr=http_build_query($vars);

                                           
                                                     echo "<tr>";
	                                        	echo "<td>".$row['user_firstname']."</td>";
                                                echo "<td>".$row['user_lastname']."</td>";
	                                        	echo "<td>".$row['slot_time']."</td> ";
                                          	echo '<td> <a href="updateemp_slot.php?'.$arr.'"> <button style="background-color:white;"><span class="" ></span></button></a></td>';
                                              echo '<td> <a href="updateslot_id.php?id='.$row["slot_id"].'"> <button style="background-color:white;"><span class="" ></span></button></a></td>';
                                              echo "<tr>";     

                             
                                            
                                                                                            
                                       }              
                                    }              
                                                    
                                   ?>                     
                                                   
                                                    

                                                
                                                   

                                                    
                                               

                                                   
                           
                        </table>

                    </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        <?php require 'common/bottom.php'; ?>





















 
 <html>
<head>
 <script src="js/jquery.js" type="text/javascript"></script>
   <script type="text/javascript">
  

    $temp="";
 


  </script>
</head>

  <?php
  $id="";
 session_start();

$name=$_SESSION['manager_id'];
$id1=$_REQUEST["id"];
  
 require 'common/top.php'; 

 require 'connection1.php';

        $qry = "SELECT * from project_tbl pt,working_area_tbl wa,project_emp_tbl pet,user_tbl u WHERE pet.project_id=$id1 and u.user_id=pet.employee_id and pet.working_area_id=wa.working_area_id";

        // echo $qry;
        $rs = mysqli_query($conn,$qry);

 ?>        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner" class="back1">
                <div class="row">

                    <div class="col-md-12">
                    <h2>Project Table</h2>
                     <!-- Advanced Tables -->
                    <div>
                        <table border=2 width=100% style="
    font-size: 31px; margin-top: 20px;">
                        
                        <tr class="colorheading">
                         <td class="extra_padding">Id</td>
                        <td class="extra_padding">Name</td>
                        <td class="extra_padding">working area</td>
                        
                        </tr>
                    
                                <?php
                                    if (mysqli_num_rows($rs) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($rs)) 
                                        {
                                 ?>
                                            
                                                <tr>
                                                    <td class="space_padding"><?php echo $row['project_id']; ?></td>
                                                    <td class="space_padding"><?php echo $row['project_name']; ?></td>
                                                     
<td class="space_padding"><?php echo $row['project_name']; ?></td>


                                                  
  
                                                </tr>
                                            
                                            
                                <?php
                                 } 
                                    } 
                                    else 
                                    {
                                        echo "0 results";
                                    }
                                ?>
                        </table>

                    </div>
                    <!--End Advanced Tables -->
                    </div>
                </div>
                 <!-- /. ROW  -->
                
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        <?php require 'common/bottom.php'; ?>





















 
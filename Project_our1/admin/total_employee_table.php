 <html>
<head>
 <script src="js/jquery.js" type="text/javascript"></script>
   <script type="text/javascript">
  

    $temp="";
  
$(".update").click(function(e) {                
        // alert("hi");
          e.preventDefault();
          var element = $(this);
          var update_id = element.attr("id");
         // alert(del_id);
          var qrystrng = 'id='+update_id;
           $.ajax({    //create an ajax request to load_page.php
            type: "POST",
            url: "employee_list.php",             
            data:qrystrng,
            dataType: "html",  //expect html to be returned                
            success: function(response){
              window.location.href="total_employee_table.php";
//          alert(response);          
            }
            

        });
    });

  });


  </script>
</head>

  <?php
 session_start();

$name=$_SESSION['manager_id'];
  
 require 'common/top.php'; 

 require 'connection1.php';

        $qry = "SELECT * FROM project_tbl WHERE manager_id=$name";
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
                        <td class="extra_padding">Employees</td>
                        <td class="extra_padding">Add Employee</td>
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
                                                     



                                                  
                                                  
 <?php echo '<td> <a href="employee_list.php?id='.$row["project_id"].'"> <button style="background-color:white;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a></td>'; ?>


                                                    <td class="space_padding1" style="padding-left: 25px !important;"> <a  class="btn btn-block1 btn-active btn-circle delete" href="#" id="<?php echo $row['project_id']; ?>"><i class="fa fa-plus fa-2x"></i></a></td>

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





















 
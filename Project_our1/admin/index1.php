
<?php
session_start();

// if(!isset($_SESSION['userid']))
// {
//   header("location:index.php");
// }
 require 'common/top.php';
 require 'connection1.php';
 // require 'connection.php';
$name=$_SESSION["manager_id"];


 

    

        $qry1 = "SELECT * FROM project_tbl WHERE manager_id= $name";
        $rs1 = mysqli_query($conn,$qry1);
        $count=mysqli_num_rows($rs1);
        if ($count > 0) 
        {
          $vc=mysqli_num_rows($rs1);
        }
        else
        {
          $vc=0;
        }



           $qry = "SELECT * FROM project_emp_tbl pemp,project_tbl pt WHERE pemp.project_id=pt.project_id and
           pt.manager_id='".$name."'";
        $rs = mysqli_query($conn,$qry);
        $count=mysqli_num_rows($rs);
        if ($count > 0) 
        {
          $vc1=mysqli_num_rows($rs);
        }
        else
        {
          $vc1=0;
        }


       

    

  ?>

       
 <body>

        <div id="page-wrapper" >
            <div id="page-inner" class="back12">
            <div class="row">
            <div class="col-md-12">
           
 <div id="display">
   


 </div> 
 <!-- notification -->


<?php

$sel="SELECT * FROM notification_tbl WHERE isactive=1";
  $rs=mysqli_query($conn,$sel);
  $cnt=0;

  if(mysqli_num_rows($rs)>0)
  {
    while($data=mysqli_fetch_assoc($rs))
    {
      
        $cnt++;
      
  
    }

  }



?>

<?php

$sel="SELECT * FROM notification_tbl WHERE isactive=2";
  $rs=mysqli_query($conn,$sel);
  $cnt1=0;

  if(mysqli_num_rows($rs)>0)
  {
    while($data=mysqli_fetch_assoc($rs))
    {
      
        $cnt1++;
      
  
    }

  }



?>

<?php

$sel="SELECT * FROM notification_tbl WHERE isactive=3";
  $rs=mysqli_query($conn,$sel);
  $cnt2=0;

  if(mysqli_num_rows($rs)>0)
  {
    while($data=mysqli_fetch_assoc($rs))
    {
      
        $cnt2++;
      
  
    }

  }



?>

<?php

$sel="SELECT * FROM notification_tbl WHERE isactive=4";
  $rs=mysqli_query($conn,$sel);
  $cnt3=0;

  if(mysqli_num_rows($rs)>0)
  {
    while($data=mysqli_fetch_assoc($rs))
    {
      
        $cnt3++;
      
  
    }

  }



?>

  








           <div style="color: blue;">
           <h2>Manager Dashboard </h2>
           </div>
           
           <div style="color: black;">
           <h4>Welcome to ATMS, Love to see you back. </h4>
           </div>


                <div class="col-md-3 col-sm-6 col-xs-6" style="width:33% !important; margin-left:145px !important;">           
      <div class="space panel panel-back noti-box"><a href="total_project_table.php">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-sitemap fa-folder"></i>
                </span>
                <div class="text-box">
                    <p class="main-text" style="color:#0f0452;"><?php echo "$vc"; ?></p>
                    <p class="text-muted" style="color:#0f0452;">Total Projects</p>
                </div>
             </div>
         </div>
                    <div class="col-md-3 col-sm-6 col-xs-6" style="width:33% !important;">           
      <div class="space panel panel-back noti-box"><a href="total_employee_table.php">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-sitemap fa-user-plus "></i>
                </span>
                <div class="text-box">
                    <p class="main-text" style="color:#0e079c;"><?php echo "$vc1"; ?></p>
                    <p class="text-muted" style="color:#0e079c;">Total Employee</p>
                </div>
             </div>
         </div>
                   
      

   <!--  next  line-->
  
         <div class="padd col-md-3 col-sm-12 col-xs-12" >  

<div class="panel panel-primary text-center no-boder bg-color-patient" style="margin-top: 30px !important">
                  <?php if($cnt>0){ ?>  <a href="#"><sup class="btn-danger" style="border-radius: 50%; background-color: red !important;  padding-left: 11px; padding-right: 11px; padding-top: 6px; border:3px solid; padding-bottom: 6px; margin-left: 198px; font-size: 15px;"><?php echo "$cnt";?></sup></a><?php } ?>
                                <div class="panel-body">

                        <a href="#" style="color: white;">
                            <i class="fa fa-file-o fa-5x" style="padding-bottom: 30px;"></i>
                           
                        </div>
                        <div class="panel-footer back-footer-patient">

                           Submitted Task
                            
                        </div>
                    </div>
</div>
                    <div class="padd col-md-3 col-sm-12 col-xs-12" >       
<div class="panel panel-primary text-center no-boder bg-color-doctor" style="margin-top: 30px !important">
                            <?php if($cnt1>0){ ?>  
                              <a href="doctor_table.php"><sup class="btn-danger" style="border-radius: 50%; background-color: red !important;  padding-left: 11px; padding-right: 11px; padding-top: 6px; padding-bottom: 6px; border:3px solid; margin-left: 198px; font-size: 15px;"><?php echo "$cnt1";?></sup></a>
                              <?php } ?>
                        <div class="panel-body">
                        <a href="allocate_slot.php" style="color: white;">
                            <i class="fa fa-link fa-5x" style="padding-bottom: 30px;"></i>
                            
                        </div>
                        <div class="panel-footer back-footer-doctor">
                           Meeting Request
                            
                        </div>
                    </div>
</div>
 <div class="padd col-md-3 col-sm-12 col-xs-12" >       
<div class="panel panel-primary text-center no-boder bg-color-medical" style="margin-top: 30px !important">
                            <?php if($cnt3>0){ ?>  
                         <a href="medical_table.php"><sup class="btn-danger" style="border-radius: 50%; background-color: red !important;  padding-left: 11px; padding-right: 11px; padding-top: 6px; padding-bottom: 6px; border:3px solid; margin-left: 198px; font-size: 15px; "><?php echo "$cnt3";?></sup></a>
                         <?php } ?>
                        <div class="panel-body">
                        <a href="medical_table.php" style="color: white;">
                            <i class="fa fa-globe fa-5x" style="padding-bottom: 30px;"></i>
                            
                        </div>
                        <div class="panel-footer back-footer-medical">
                           Pending Request 
                            
                        </div>
                    </div>
</div>
 <div class="padd col-md-3 col-sm-12 col-xs-12" >       
<div class="panel panel-primary text-center no-boder bg-color-lab" style="margin-top: 30px !important">
                             <?php if($cnt2>0){ ?>  
                        <a href="laboratory_table.php"><sup class="btn-danger" style="border-radius: 50%; background-color: red !important;  padding-left: 11px; padding-right: 11px; padding-top: 6px; padding-bottom: 6px; border:3px solid; margin-left: 198px; font-size: 15px;"><?php echo "$cnt2";?></sup></a>
                        <?php } ?>
                         <div class="panel-body">
                        <a href="laboratory_table.php" style="color: white;">
                            <i class="fa fa-clock-o fa-5x" style="padding-bottom: 30px;"></i>
                            
                        </div>
                        <div class="panel-footer back-footer-green">
                           Time Extention
                            
                        </div>
                    </div>
</div>


            </div>
            </div>
            </div>
            </div>

<?php require 'common/bottom.php'; ?>

         
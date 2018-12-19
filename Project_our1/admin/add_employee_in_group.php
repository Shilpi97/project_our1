<!DOCTYPE html>
<html lang="en">

<?php require "common/header.php"; ?>
 <?php require "common/top.php"; ?>
 <head>
<script src="js/jquery.js" type="text/javascript"></script>
   <script type="text/javascript">
  $(document).ready(function() {
    
      $("#manager_reg_form").on('submit',function(e){
        e.preventDefault();
        $.ajax({    //create an ajax request to load_page.php
            type: "POST",
            url: "insert_project_emp_tbl.php",             
            data:new FormData(this), // "coun_id="+id, {}
            cache       : false,
            contentType : false,
            processData : false, //expect html to be returned                
            success: function(response){
        alert(response);
        if(($.trim(response))=='inserted successfully')
          {
            //alert("mail already exist");
             window.location.href='#';
          }
        
          else
          {
            //alert("user name & Address may exist or image size may large");
             window.location.href=''+'#'+'';
          }
         
                 
            }
            

        });
      });
});
  </script>

<title></title>
</head>
<body>

  

 <div class="animationload">
<div class="loader">Loading...</div>
</div>
                
    
	

	<div class="post-wrapper-top clearfix">
		<div class="container">
			<div class="col-lg-12">
				<h2>Register Yourself</h2>
                <ul class="breadcrumb pull-right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login_manager.php">Login</a></li>
                </ul>
			</div>
		</div>
	</div><!-- end post-wrapper-top -->

	<div class="white-wrapper">
    	<div class="container">
        	<div class="general_row">
				<div class="custom_tab_2 row">

                    <div class="col-md-12">
                        <div class="tab-content">
                            <div class="tab-pane active">
                            <div class="doc">

                                <form role="form" method="post" action="#" data-parsley-validate id="manager_reg_form">
                                  <div class="form-group">
                                

                                  <label>Project Name<font color="red"> *</font></label>
                                  <input type="text" name="project_id" class="form-control" id="project_id" placeholder="Full Name (required)" required autofocus>
                                    </div>

                                    
                                  <div class="form-group">
                                    <label>Employee_name<font color="red"> *</font></label>
                              
                                      <?php
                                                require 'connection1.php';
                                                  $sel="SELECT * FROM user_tbl";
                                                    $rs=mysqli_query($conn,$sel);
                                                 if($rs)
                                                {
                                                    if(mysqli_num_rows($rs)>0)
                                                    {
                                            ?>
                                                <div class="form-group">
                                                
                                                <select class="form-control" name="employee_name">
                                                <option selected value="no selcect">Select working_area </option>
                                            <?php   
                                                while ($data=mysqli_fetch_assoc($rs)) 
                                                {
                                            ?>
                                                    <option value="<?php echo $data['user_id']; ?>"><?php echo $data['user_firstname']." ".$data['user_lastname'] ; ?>

                                                    </option>

                                            <?php
                                                }
                                                }
                                                }
                                                else
                                                {
                                                    echo "connection error";
                                                }
                                            ?>
                                             </select>
                                    </div>
                                   
                                   <div class="form-group">
                                    <label>working_area<font color="red"> *</font></label>
                              
                                      <?php
                                                require 'connection1.php';
                                                  $sel1="SELECT * FROM working_area_tbl";
                                                    $rs1=mysqli_query($conn,$sel1);
                                                 if($rs1)
                                                {
                                                    if(mysqli_num_rows($rs)>0)
                                                    {
                                            ?>
                                                <div class="form-group">
                                                
                                                <select class="form-control" name="working_area_name">
                                                <option selected value="no selcect">Select working_area </option>
                                            <?php   
                                                while ($data=mysqli_fetch_assoc($rs1)) 
                                                {
                                            ?>
                                                    <option value="<?php echo $data['working_area_id']; ?>"><?php echo $data['working_area_name']; ?>

                                                    </option>

                                            <?php
                                                }
                                                }
                                                }
                                                else
                                                {
                                                    echo "connection error";
                                                }
                                            ?>
                                             </select>
                                    </div>


                                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                  
                                </form>
                               </div></div></form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- footer -->
  <?php require "common/bottom.php"; ?>

  <?php require "common/footer.php"; ?>                          
                            
    
   
    
	

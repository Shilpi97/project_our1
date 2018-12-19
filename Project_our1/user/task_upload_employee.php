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
            url: "employee_task_insert.php",             
            data:new FormData(this), // "coun_id="+id, {}
            cache       : false,
            contentType : false,
            processData : false, //expect html to be returned                
            success: function(response){
        //alert(response);
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





<script>
function myFunction() {
    alert("send request successfully");
}
</script>









  

 <div class="animationload">
<div class="loader">Loading...</div>
</div>
                
    
	

	<div class="post-wrapper-top clearfix">
		<div class="container">
			<div class="col-lg-12">
				<h2></h2>
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
                              <?php
                                require 'connection.php';
                                  $des=null; $qry="select * from task_tbl where employee_id=35"; $rs1=mysqli_query($conn,$qry); if(mysqli_num_rows($rs1)>0) { while($data=mysqli_fetch_assoc($rs1)) { $des=$data['timecheck']; } } date_default_timezone_set("Asia/Kolkata"); $start_date = new DateTime("now"); $since_start = $start_date->diff(new DateTime($des));echo "Remaining Time:";  echo $since_start->h.' :'; echo $since_start->i.' :'; echo $since_start->s.'<br><br>'; 

                                 ?> 
                                  <div class="form-group">
                                    <label for="exampleInputFile">Upload File <font color="red"> *</font></label>
                                    
                                    <input type="file" name="fileToUpload">
                                    
                                   
                                  </div>

                                  

                                     
                                   
                                      </div></div>
                                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                  <button type="submit" onclick="myFunction()" style="margin-right:300px;" name="send_request"
                                  id="demo" class="btn btn-primary">send_request</button>
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
<div style="margin-top: 100px !important;">
  <?php require "common/bottom.php"; ?>

  <?php require "common/footer.php"; ?>                          
                            
    </div>
   
    
	

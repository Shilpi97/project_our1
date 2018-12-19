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
            url: "managerregistration_insert.php",             
            data:new FormData(this), // "coun_id="+id, {}
            cache       : false,
            contentType : false,
            processData : false, //expect html to be returned                
            success: function(response){
        //alert(response);
        if(($.trim(response))=='mail already exist')
          {
            alert("mail already exist");
             window.location.href='#';
          }
         else if(($.trim(response))=='mail_contact.php')
          {
            alert("inserted successfully");
             window.location.href='mail_contact.php';
          }
          else
          {
            alert("user name & Address may exist or image size may large");
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
                            	<div class="big-title">
                            	<h3>Manager Information</h3>
                                </div>
                                <form role="form" method="post" action="#" data-parsley-validate id="manager_reg_form">
                                  <div class="form-group">
                                

                                  <label>First Name<font color="red"> *</font></label>
                                  <input type="text" name="user_firstname" class="form-control" id="full_name" placeholder="Full Name (required)" required autofocus data-parsley-pattern="^[a-zA-Z\s]*$" title="only character" pattern="^[a-zA-Z\s]*$">
                                    </div>

                                    <div class="form-group">
                                

                                  <label>Middle Name<font color="red"> *</font></label>
                                  <input type="text" name="user_middlename" class="form-control" id="full_name" placeholder="Full Name (required)" required autofocus data-parsley-pattern="^[a-zA-Z\s]*$" title="only character" pattern="^[a-zA-Z\s]*$">
                                    </div>
                                    <div class="form-group">
                                

                                  <label>Last Name<font color="red"> *</font></label>
                                  <input type="text" name="user_Lastname" class="form-control" id="full_name" placeholder="Full Name (required)" required autofocus data-parsley-pattern="^[a-zA-Z\s]*$" title="only character" pattern="^[a-zA-Z\s]*$">
                                    </div>

                                  <div class="form-group">    
                                  <label>Address<font color="red"> *</font></label>
                                  <input type="text" class="form-control" name="address" id="Address" placeholder="Resident Address (required)" required autofocus data-parsley-pattern="^[a-zA-Z0-9 ,\s]*$" title="only character" pattern="^[a-zA-Z0-9 ,\s]*$">
                                  </div>

                                  <div class="form-group">
                                    <label>City<font color="red"> *</font></label>
                              
                                      <?php
                                                require 'connection.php';
                                                  $sel="SELECT * FROM city";
                                                    $rs=mysqli_query($conn,$sel);
                                                 if($rs)
                                                {
                                                    if(mysqli_num_rows($rs)>0)
                                                    {
                                            ?>
                                                <div class="form-group">
                                                
                                                <select class="form-control" name="city_name">
                                                <option selected value="no selcect">Select city name </option>
                                            <?php   
                                                while ($data=mysqli_fetch_assoc($rs)) 
                                                {
                                            ?>
                                                    <option value="<?php echo $data['city_id']; ?>"><?php echo $data['city_name']; ?>

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
                                    <label for="text"> Date of birth<font color="red"> *</font></label>
                                    <input type="text" class="form-control" name="date_of_birth" id="phone_number" placeholder="date of birth (required)" required autofocus data-parsley-pattern="^[0-9]{8,12}" title="only Number" pattern="^[0-9]{8,12}">
                                    </div>

                                    <div class="form-group">
                                    <label for="text">Contact Number<font color="red"> *</font></label>
                                    <input type="text" class="form-control" name="contact_number" id="phone_number" placeholder="Phone Number (required)" required autofocus data-parsley-pattern="^[0-9]{8,12}" title="only Number" pattern="^[0-9]{8,12}">
                                    </div>
                                    <div class="form-group">
                                    <label>Designation<font color="red"> *</font></label>
                                  <input type="text" name="designation" class="form-control" id="full_name" placeholder="Full Name (required)" required autofocus data-parsley-pattern="^[a-zA-Z\s]*$" title="only character" pattern="^[a-zA-Z\s]*$">
                                    </div>

                                    <div class="form-group">
                                    <label for="text"> Joining date<font color="red"> *</font></label>
                                    <input type="text" class="form-control" name="jdate" id="phone_number" placeholder="date of birth (required)" required autofocus data-parsley-pattern="^[0-9]{8,12}" title="only Number" pattern="^[0-9]{8,12}">
                                    </div>


                                    <div class="form-group">
                                          <label >Gender<font color="red"> *</font></label>
                                    <br><input type="radio" name="gen1" value="1" required> Male
                                     <input type="radio" name="gen1" value="2" required> Female
                                     </div>

                                     
                                  
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">User Id<font color="red"> *</font></label>
                                    <input type="email" name="user_id" class="form-control" id="exampleInputEmail1" placeholder="Enter User Id" required>
                                  </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Password<font color="red"> *</font></label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                                  </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1"> Confirm Password<font color="red"> *</font></label>
                                    <input type="password" name="c_password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                                  </div>

                                     
                                   
                                      </div></div>
                                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                  <button type="reset" name="reset" class="btn btn-default" style="color: #48c0de">Reset</button>
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
                            
    
   
    
	

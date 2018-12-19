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
            url: "manager_task_insert1.php",             
            data:new FormData(this), // "coun_id="+id, {}
            cache       : false,
            contentType : false,
            processData : false, //expect html to be returned                
            success: function(response){
        //alert(response);
        if(($.trim(response))=='inserted successfully')
          {
            //alert("mail already exist");
             window.location.href='index1.php';
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
                
    

	<div id="page-wrapper" >
            <div id="page-inner" class="back1">
            <div class="row">
            <div class="col-md-12">
           
 <div id="display">
   


 </div> 	
                              <form role="form" method="post" action="#" data-parsley-validate id="manager_reg_form">

                                  <div class="form-group">
                                    <label for="exampleInputFile">Upload File <font color="red"> *</font></label>
                                    
                                    <input type="file" name="fileToUpload">
                                    
                                   
                                  </div>
                                  <br>
                                  <br>
                                  <div class="form-group">
                                    <label for="exampleInputFile">Enter Employee<font color="red"> *</font></label>
                                    
                                    <input type="text" name="hase">
                                    
                                   
                                  </div>
                                   <div class="form-group">
                                    <label for="exampleInputFile">Enter Date and time<font color="red"> *</font></label>
                                    
                                    <input type="datetime-local" name="has">
                                    
                                   
                                  </div>

                                     
                                   
                                      
                                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                  </form>
                                 </div>
                    </div>
                </div>
              
               </div>
    </div>
<!-- footer -->
  <?php require "common/bottom.php"; ?>

  <?php require "common/footer.php"; ?>                          
                            
    
   
    
	

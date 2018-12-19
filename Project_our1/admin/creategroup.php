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
            url: "insertgroup.php",             
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
            <h2>Create Your Project</h2>
               
                                          <div class="form-group">
                                          <form method="post" id="allocate_slot_form" >
                                          <div class="col-md-6">
                                         <label>Enter Project Name</label>
                                           <input type="text" style="width:100%;" name="no_of_slot" >
                                           <label>Enter Project Starting Date</label>
                                           <input type="date" style="width:100%;" name="n2" >
                                            <label>Enter Description</label>
                                           <textarea name="t1"></textarea>
                                        </div>
    <br>
    
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


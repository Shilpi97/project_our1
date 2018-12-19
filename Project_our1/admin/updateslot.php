  <?php

    session_start();
$name=$_SESSION['manager_id'];

   require 'common/top.php';
    


 ?>


<html>
<head>
<script src="js/jquery.js" type="text/javascript"></script>
   <script type="text/javascript">
  $(document).ready(function() {
    
      $("#slot_form1").on('submit',function(e){
        e.preventDefault();
        $.ajax({    //create an ajax request to load_page.php
            type: "POST",
            url: "slot_update.php",             
            data:new FormData(this), // "coun_id="+id, {}
            cache       : false,
            contentType : false,
            processData : false, //expect html to be returned                
            success: function(response){
          if(response)
          {
          window.location.href="viewslot.php";
          }
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
            <h2>Starting Time</h2>
               
                                          <div class="form-group">
                                          <form method="post" id="slot_form1" >
                                           
               
               <div class="col-md-6">
                                            <select class="form-control" name="starting_slot_hour">
                                                <option selected value="no selcect">Select Hour </option>
                                                <option value="0">00</option>
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                                <option value="5">05</option>
                                                <option value="6">06</option>
                                                <option value="7">07</option>
                                                <option value="8">08</option>
                                                <option value="9">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                              
                                             </select>
                                             </div>
                                      
                                     <div class="col-md-6">     
<select class="form-control" name="starting_slot_min">
                                                <option selected value="no selcect">Select Mintue</option>
                                            <option value="00">00</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                             </select>
</div>
                                             <br>
                                             
<br>
                                              <h2> Ending Time</h2>
               <div class="col-md-6">
                                            <select class="form-control" name="ending_slot_hour">
                                                <option selected value="no selcect">Select Hour </option>
                                                   <option value="0">00</option>
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                                <option value="5">05</option>
                                                <option value="6">06</option>
                                                <option value="7">07</option>
                                                <option value="8">08</option>
                                                <option value="9">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                              
                                              
                                             </select>
                                       </div>
                                          <div class="col-md-6">
<select class="form-control" name="ending_slot_min">
                                                <option selected value="no selcect">Select Mintue</option>
                                            <option value="00">00</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                             </select>
</div>
                                             <br>
                                             <br>
            <br>
                                            
                        
                       <input type="submit" name="submit_allergy" id="allergy_id" class="btn btn-default" value="Update"></input>
                        </form>
                        </div>
                    </div>
                </div>
              
               </div>
    </div>
             <!-- /. PAGE INNER  -->
<?php require 'common/bottom.php'; ?>


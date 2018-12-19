
<?php
session_start();
require 'connection1.php';
$as='active';
$id=$_POST['id'];
$st="SELECT * from project_tbl pt,working_area_tbl wa,project_emp_tbl pet WHERE pt.project_id=pet.project_id and pet.working_area_id=wa.working_area_id";
$rs=mysqli_query($conn,$st);

  if(mysqli_num_rows($rs)>0)
  {
    $data=mysqli_fetch_assoc($rs);
    
      if($data['status']==$as)
	  {
      	$qry="UPDATE allergy SET status='blocked', isactive=2 WHERE allergy_id=$id";
		$rs=mysqli_query($conn,$qry);
      }
      else
      {
      	$qry="UPDATE allergy SET status='active', isactive=1 WHERE allergy_id=$id";
      	
		$rs=mysqli_query($conn,$qry);

      }
    }
  
?>
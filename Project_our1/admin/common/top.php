<?php require 'header.php'; 
//$name=$_SESSION['userid'];
?>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../admin/index1.php">Home</a> 
            </div>
  <div style="color: blue;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> 
            Welcome  &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="img/asd.png" class="user-image img-responsive"/>
					</li>
				
					<!--<li  > 
                        <a class="active-menu"  href="index1.php"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                    </li>-->
                    <li>
                        <a  href="index1.php"><i
                        ></i>&nbsp;&nbsp;Dashboard</a>
                         
                    </li>
                    <li>
                        <a  href="#"><i ></i>&nbsp;Group<span class="fa arrow"></span></a>
                        
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="creategroup.php">Create Group</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a  href="task_upload_manager1.php"><i></i>Allocate Task</a>
                       
                    </li>
                    
                       
                   
                      <li>
                        <a  href="laboratory_table.php"><i></i>&nbsp;Slots<span class="fa arrow"></span></a
                        >
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="slot.php">Manage Slots</a>
                            </li>
                        </ul>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="updateslot.php">Update Slots</a>
                            </li>
                        </ul>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="viewslot1.php">View Slots</a>
                            </li>
                        </ul>
                        
                    </li>
                   
						
                      
                       
                   

                       	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->



<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panorama — Admin</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <link href="assets/css/panorama-theme.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <style>
        :root{
            --blue:#2F80ED; --blue-2:#48A7FF; --sky:#E9F5FF;
            --badge:#1EC8FF; --text:#0B4F8A; --muted:#6C91B5;
        }
        body{background:#F2F8FF;}
        #wrapper,#page-wrapper,#page-inner{background:#F2F8FF !important}
        .top-navbar{background:linear-gradient(90deg,#4FC3FF,#AEE8FF)!important;border:0!important;box-shadow:none!important;}
        .top-navbar .navbar-brand{color:#fff !important;font-weight:700;letter-spacing:.5px}
        .navbar-default .navbar-nav>li>a{color:#fff !important}
        .navbar-default.navbar-side,.navbar-side,.sidebar-collapse,#main-menu,#main-menu>li,#main-menu>li>a{background:#fff !important}
        #main-menu>li>a{color:var(--text) !important;font-weight:600;padding:14px 20px;border-left:4px solid transparent}
        #main-menu>li>a.active-menu,#main-menu>li>a:hover{background:var(--sky) !important;color:var(--text) !important;border-left-color:var(--blue) !important}
        #main-menu>li+li>a{border-top:1px solid #E6F0FF}
        .page-header{border:0;color:var(--text);margin-top:20px}
        .page-header small{color:var(--muted)}
        .panel{border:0;border-radius:10px;overflow:hidden;box-shadow:0 6px 18px rgba(13,76,140,.06)}
        .panel-heading{background:var(--blue);color:#fff}
        .panel-primary>.panel-heading{background:var(--blue)}
        .panel-info>.panel-heading{background:var(--blue-2)}
        .panel-danger>.panel-heading{background:var(--blue)}
        .panel-footer.back-footer-blue{background:var(--sky);color:var(--text)}
        .btn-primary{background:var(--blue);border-color:var(--blue)}
        .btn-default{background:#fff;border-color:#D7E8FF;color:var(--text)}
        .badge{background:var(--badge);color:#003A66}
        .table>thead>tr>th{color:var(--text);font-weight:600;background:#F7FBFF;border-bottom:1px solid #E6F0FF}
        .table>tbody>tr>td,.table>tbody>tr>th{border-top:1px solid #EEF5FF}
        nav.navbar.navbar-default.top-navbar .navbar-brand{color:#0B4F8A!important;text-shadow:none!important}
    
    </style>
</head>
<body>
    <div id="wrapper">
        
        <nav class="navbar navbar-default top-navbar" role="navigation"
     style="background:linear-gradient(90deg,#4FC3FF,#AEE8FF)!important;border:0!important;box-shadow:none!important;">
            <div class="navbar-header" style="background:transparent!important;background-image:none!important;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">PANORAMA</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    <li>
                        <a class="active-menu" href="messages.php"><i class="fa fa-desktop"></i> News Letters</a>
                    </li>
					<li>
                        <a href="roombook.php"><i class="fa fa-bar-chart-o"></i>Room Booking</a>
                    </li>
                    <li>
                        <a href="Payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                    </li>
                
                    <li>
                        <a href="logout.php" ><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                    


                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           News letters<small> panel</small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
				 <?php
				include('db.php');
				$mail = "SELECT * FROM `contact`";
				$rew = mysqli_query($con,$mail);
				
			   ?>
				 <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h3>Send The News Letters to Followers</h3>
						<?php
						while($rows = mysqli_fetch_array($rew))
						{
								$app=$rows['approval'];
								if($app=="Allowed")
								{
									
								}
						}
						?>
                        <p></p>
                        <p>
						<div class="panel-body">
                            <button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">
                              Send New News Letters
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Compose News Letter</h4>
                                        </div>
										<form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Title</label>
                                            <input name="title" class="form-control" placeholder="Enter Title">
											</div>
										</div>
										<div class="modal-body">
                                            <div class="form-group">
                                            <label>Subject</label>
                                            <input name="subject" class="form-control" placeholder="Enter Subject">
											</div>
                                        </div>
										<div class="modal-body">
										<div class="form-group">
										  <label for="comment">News</label>
										  <textarea name="news" class="form-control" rows="5" id="comment"></textarea>
										</div>
										 </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											
                                           <input type="submit" name="log" value="Send" class="btn btn-primary">
										  </form>
										   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
							<?php
							if(isset($_POST['log']))
							{	
								$log ="INSERT INTO `newsletterlog`(`title`, `subject`, `news`) VALUES ('$_POST[title]','$_POST[subject]','$_POST[news]')";
								if(mysqli_query($con,$log))
								{
									echo '<script>alert("New Room Added") </script>' ;
											
								}
								
							}
							
								
							?>
                          
                        </p>
						
                    </div>
                </div>
            </div>
               <?php
				
				$sql = "SELECT * FROM `contact`";
				$re = mysqli_query($con,$sql);
				
			   ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
											<th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Date</th>
											<th>Status</th>
											<th>Approval</th>
											<th>Remove</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
										while($row = mysqli_fetch_array($re))
										{
										
											$id = $row['id'];
											
											if($id % 2 ==1 )
											{
												echo"<tr class='gradeC'>
													<td>".$row['fullname']."</td>
													<td>".$row['phoneno']."</td>
													<td>".$row['email']."</td>
													<td>".$row['cdate']."</td>
													<td>".$row['approval']."</td>
													<td><a href=newsletter.php?eid=".$id ." <button class='btn btn-primary'> <i class='fa fa-edit' ></i> Permission</button></td>
													<td><a href=newsletterdel.php?eid=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
												</tr>";
											}
											else
											{
												echo"<tr class='gradeU'>
													<td>".$row['fullname']."</td>
													<td>".$row['phoneno']."</td>
													<td>".$row['email']."</td>
													<td>".$row['cdate']."</td>
													<td>".$row['approval']."</td>
													<td><a href=newsletter.php?eid=".$id." <button class='btn btn-primary'> <i class='fa fa-edit' ></i> Permission</button></td>
													<td><a href=newsletterdel.php?eid=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete </button></td>		
												</tr>";
											
											}
										
										}
										
									?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            
                </div>
               
            </div>
        
               
    </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>

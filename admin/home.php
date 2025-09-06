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
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <link href="assets/css/panorama-theme.css" rel="stylesheet" />
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        :root{
            --blue:#2F80ED;
            --blue-2:#48A7FF;
            --sky:#E9F5FF;
            --badge:#1EC8FF;
            --text:#0B4F8A;
            --muted:#6C91B5;
        }
        body{background:#F2F8FF;}
        /* Top bar */
        .top-navbar{background:var(--blue) !important;border:0;box-shadow:0 2px 10px rgba(0,0,0,.06)}
        .top-navbar .navbar-brand,.top-navbar .navbar-brand:hover{color:#fff !important;font-weight:700;letter-spacing:.5px}
        .navbar-default .navbar-nav>li>a{color:#fff !important}
        .navbar-default .navbar-nav>li>a:hover{opacity:.9}
        /* Sidebar */
        .navbar-default.navbar-side{background:#fff;border-right:1px solid #E6F0FF}
        #main-menu>li>a{color:var(--text);font-weight:600;padding:14px 20px;border-left:4px solid transparent}
        #main-menu>li>a.active-menu,#main-menu>li>a:hover{background:var(--sky);color:var(--text);border-left-color:var(--blue)}
        /* Page heading */
        .page-header{border:0;color:var(--text);margin-top:20px}
        .page-header small{color:var(--muted)}
        /* Panels/cards */
        .panel{border:0;border-radius:10px;overflow:hidden;box-shadow:0 6px 18px rgba(13,76,140,.06);margin-bottom:24px}
        .panel-heading{background:var(--blue);color:#fff;padding:14px 18px}
        .panel-primary>.panel-heading{background:var(--blue)}
        .panel-info>.panel-heading{background:var(--blue-2)}
        .panel-danger>.panel-heading{background:var(--blue)}
        .panel-footer.back-footer-blue{background:var(--sky);color:var(--text)}
        /* Buttons/badges */
        .btn-primary{background:var(--blue);border-color:var(--blue)}
        .btn-default{background:#fff;border-color:#D7E8FF;color:var(--text)}
        .badge{background:var(--badge);color:#003A66}
        /* Tables */
        .table>thead>tr>th{color:var(--text);font-weight:600;background:#F7FBFF;border-bottom:1px solid #E6F0FF}
        .table>tbody>tr>td,.table>tbody>tr>th{border-top:1px solid #EEF5FF}
        /* Accordion spacing */
        .panel-group .panel + .panel{margin-top:16px}
        /* Content container */
        #page-inner{padding-top:15px}

/* Force sidebar to white */
.navbar-default.navbar-side,
.navbar-side,
.sidebar-collapse,
#main-menu,
#main-menu > li,
#main-menu > li > a {
	background:#fff !important;
}

/* Text and icons */
#main-menu > li > a {
	color:#0B4F8A !important;
	border-left:4px solid transparent;
}

/* Active/hover state */
#main-menu > li > a.active-menu,
#main-menu > li > a:hover {
	background:#E9F5FF !important;
	color:#0B4F8A !important;
	border-left-color:#2F80ED !important;
}

/* Remove any inherited dark backgrounds */
#wrapper,
#page-wrapper,
#page-inner {
	background:#F2F8FF !important;
}

/* Divider lines for neat sections */
#main-menu > li + li > a {
	border-top:1px solid #E6F0FF;
}

/* Brand text color: sky blue */
.top-navbar .navbar-brand{
    color:#4FC3FF !important; /* sky blue */
}

/* Half-width cards placed side-by-side */
.panel-half{
    display:inline-block;
    width:48%;
    vertical-align:top;
}
/* spacing between the two halves */
.panel-half + .panel-half{ margin-left:4%; }

/* Stack on small screens */
@media (max-width: 992px){
    .panel-half{ width:100%; display:block; margin-left:0; }
}

/* Sky-blue top bar (replaces black) */
.navbar-default.top-navbar,
.top-navbar,
.top-navbar .navbar-header {
	background: linear-gradient(90deg,#4FC3FF,#AEE8FF) !important;
	border: 0 !important;
	box-shadow: none !important;
}

/* Brand text stays readable on the light bar */
.top-navbar .navbar-brand{
	color:#0B4F8A !important;
	text-shadow:none !important;
}
    </style>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
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
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    <li>
                        <a href="messages.php"><i class="fa fa-envelope"></i> Newsletter</a>
                    </li>
                    <li>
                        <a href="roombook.php"><i class="fa fa-bed"></i> Room Booking</a>
                    </li>
                    <li>
                        <a href="payment.php"><i class="fa fa-credit-card"></i> Payments</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                   


                    
					</ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dashboard <small></small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				<?php
						include ('db.php');
$sql_new = "SELECT COUNT(*) AS new_count FROM roombook WHERE stat='Not Conform'";
$res_new = mysqli_query($con, $sql_new);
$row_new = mysqli_fetch_assoc($res_new);
$c = $row_new['new_count'];

$sql_booked = "SELECT COUNT(*) AS booked_count FROM roombook WHERE stat='Conform'";
$res_booked = mysqli_query($con, $sql_booked);
$row_booked = mysqli_fetch_assoc($res_booked);
$r = $row_booked['booked_count'];
$sql_followers = "SELECT COUNT(*) AS followers_count FROM contact";
$res_followers = mysqli_query($con, $sql_followers);
$row_followers = mysqli_fetch_assoc($res_followers);
$f = $row_followers['followers_count'];
				?>

					<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion" style="display:flex;gap:2%;flex-wrap:wrap;">
							
							<div class="panel panel-info panel-half">
                                    <div class="panel-heading">
                                        <h4 class="panel-title" style="margin:0;">
                                            New Room Bookings
                                            <span class="badge"><?php echo $c; ?></span>
                                        </h4>
                                    </div>
                                    <div class="panel-body" style="min-height:70px;">
                                    </div>
                                </div>
                                <div class="panel panel-primary panel-half">
                                    <div class="panel-heading">
                                        <h4 class="panel-title" style="margin:0;">
                                            Booked Rooms
                                            <span class="badge"><?php echo $r; ?></span>
                                        </h4>
                                    </div>
                                    <div class="panel-body" style="min-height:70px;">
                                    </div>
                                </div>
                                <div class="panel panel-danger panel-half">
                                    <div class="panel-heading">
                                        <h4 class="panel-title" style="margin:0;">
                                            Followers
                                            <span class="badge"><?php echo $f; ?></span>
                                        </h4>
                                    </div>
                                    <div class="panel-body" style="min-height:70px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- Charts Section -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Monthly Statistics</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <canvas id="bookingsChart" height="250"></canvas>
                    </div>
                    <div class="col-md-6">
                        <canvas id="followersChart" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
				<div class='panel-body'>
                            <button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
                              Update 
                            </button>
                            <div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='myModalLabel'>Change the User name and Password</h4>
                                        </div>
										<form method='post>
                                        <div class='modal-body'>
                                            <div class='form-group'>
                                            <label>Change User name</label>
                                            <input name='usname' value='<?php echo $fname; ?>' class='form-control' placeholder='Enter User name'>
											</div>
										</div>
										<div class='modal-body'>
                                            <div class='form-group'>
                                            <label>Change Password</label>
                                            <input name='pasd' value='<?php echo $ps; ?>' class='form-control' placeholder='Enter Password'>
											</div>
                                        </div>
										
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
											
                                           <input type='submit' name='up' value='Update' class='btn btn-primary'>
										  </form>
										   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
				
				<!--DEMO END-->
				
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    // Chart data - replace with your actual data
    const monthlyBookingsData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Booked Rooms',
            data: [12, 19, 8, 15, 24, 18, 22, 17, 21, 25, 20, 23],
            backgroundColor: 'rgba(47, 128, 237, 0.2)',
            borderColor: 'rgba(47, 128, 237, 1)',
            borderWidth: 2,
            tension: 0.4
        }]
    };

    const monthlyFollowersData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Followers',
            data: [18, 25, 20, 22, 30, 28, 32, 30, 35, 40, 38, 42],
            backgroundColor: 'rgba(255, 138, 72, 0.2)',
            borderColor: 'rgba(255, 138, 72, 1)',
            borderWidth: 2,
            tension: 0.4
        }]
    };
    const chartConfig = {
        type: 'line',
        data: {},
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Monthly Statistics'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };
    document.addEventListener('DOMContentLoaded', function() {
        const bookingsCtx = document.getElementById('bookingsChart').getContext('2d');
        const bookingsChart = new Chart(bookingsCtx, {
            ...chartConfig,
            data: monthlyBookingsData
        });

        const followersCtx = document.getElementById('followersChart').getContext('2d');
        const followersChart = new Chart(followersCtx, {
            ...chartConfig,
            data: monthlyFollowersData
        });
    });
</script>

</body>

</html>
<?php 
				session_start();
					include ("includes/db.php"); //Establishing connection with our database
				 
					$error = ""; //Variable for storing our errors.
					if(isset($_POST["submit"]))
					{ 
						
						if(empty($_POST["username"]) || empty($_POST["password"]))
						{ 
						$error = "username & password are required.";
						}
						else
						{
						// Define $username and $password
						 $username=$_POST['username'];  
						$password=$_POST['password'];
						 
						// To protect from MySQL injection
						$username = stripslashes($username);  
						$password = stripslashes($password);
						$username = mysqli_real_escape_string($db, $username);
						$password = mysqli_real_escape_string($db, $password);
						//$password = md5($password);
						//Check username and password from database
						$sql="SELECT username,register_id,city_id FROM tbl_registration WHERE username='$username' and password='$password'";   
						$result=mysqli_query($db,$sql);
						if (!$result) {
										printf("Error: %s\n", mysqli_error($db));
										exit();
									}
						$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
						
						//echo $row['UserName']; exit;
						//If username and password exist in our database then create a session.
						//Otherwise echo error.
						 
							if(mysqli_num_rows($result) == 1)
							{
								$_SESSION['name'] = $row['username'];
								$_SESSION['registerid'] = $row['register_id'];  
								$_SESSION['cityid'] = $row['city_id'];
								// Initializing Session
								if($_SESSION['registerid']==1)
								{
									?>
								<script type="text/javascript">
								window.location.href = 'dashboard.php';
								</script>
								<?php
									//header("location:userpanel/admin.php");
							    }
								else
								{
								?>
								<script type="text/javascript">
								window.location.href = 'dashboard.php';
								</script>
								<?php
								//header("location:userpanel/index.php"); // Redirecting To Other Page
								//$error = "Logged.";
								}
							}
							else
							{
								$error = "Incorrect username or password.";
							}
							//echo $_SESSION['name']; die;
						}
					}
					
			?>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>OrganicPandit Login</title>

		<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<!--<link rel="stylesheet" href="assets/css/bootstrap.min.css" />-->
		<!--<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />-->
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/library/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/library/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/library/owl.carousel.css">
		<link rel="stylesheet" type="text/css" href="css/md-font.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
 <!-- HEADER -->
    <header id="header" class="header">
        <div class="container">

            <!-- LOGO -->
            <div class="logo"><a href="#"><!--<img src="images/logo.png" alt="">--><h4>OrganicPandit</h4></a></div>
            <!-- END / LOGO -->

            <!-- NAVIGATION -->
            <nav class="navigation">
                <div class="open-menu">
                    <span class="item item-1"></span>
                    <span class="item item-2"></span>
                    <span class="item item-3"></span>
                </div>

                <!-- SEARCH BOX -->
                <div class="search-box">
                    <i class="icon md-search"></i>
                    <div class="search-inner">
                        <form>
                            <input type="text" placeholder="key words">
                        </form>
                    </div>
                </div>
                <!-- END / SEARCH BOX -->

                <!-- LIST ACCOUNT INFO -->
                <!-- END / LIST ACCOUNT INFO -->

            </nav>
            <!-- END / NAVIGATION -->

        </div>
    </header>
		
<!-- PAGE WRAP -->
	<div id="page-wrap" style=" background-image: url('css/logo.jpg');">
		<div class="container">
			<div class="row"><br>
				<div class="">
				 <!-- LOGIN -->
							<!-- FORM -->
						<form name="form1" class="form-horizontal" method="post" action="">
						<div class="row">
						<br><br></br>
							<div class="col-md-4">
								</div>
							<center><div class="col-md-4">
								<div class="form-login">
									<div class="form-group">
										<h2 class="text-uppercase">sign in</h2>
										<div class="error" style="color:#d9534f;"><?php echo $error; ?></div>
										<div class="form-email">
											<input type="text" placeholder="Username" name="username">
										</div>
										<div class="form-password">
											<input type="password" placeholder="Password" name="password">
										</div>
										<!--<div class="form-check">
											<input type="checkbox" id="check">
											<label for="check">
											<i class="icon md-check-2"></i>
											Remember me</label>
											<a href="forgotpass.php">Forgot password?</a>
										</div>-->
										<div class="form-submit-1">
											<button type="submit" id="sub" name="submit" class="mc-btn btn-style-1">Sign In</button>
										</div>
								</div>
							</div>
						</div></center>
					</div>
				</form>
							<!-- END / FORM -->
				<!-- END / LOGIN -->
				</div>	
			</div>
	</div>
</div>
<!---end page wrap--->
    <!-- FOOTER -->
    <footer id="footer" class="footer">

        <div class="second-footer">
            <div class="container">
                <div class="contact">
                    <div class="email">
                        <i class="icon md-email"></i>
                        <a href="http://organicpandit.com/">OrganicPandit</a>
                    </div>
                </div>
                <p class="copyright">Copyright © . All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!-- END / FOOTER -->
	<!-- Load jQuery -->
	
</body>
</html>
				<?php 
				//session_start();
					include ("includes/db.php"); //Establishing connection with our database
				 
					$error = ""; //Variable for storing our errors.
					if(isset($_POST["submit"]))
					{ 
						?>
						<script type="text/javascript">
						window.location.href = 'userpanel/index.php';
						</script>
						<?php
						
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
						$sql="SELECT register_id,username FROM tbl_registration WHERE username='$username' and password='$password'";   
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
								
								$_SESSION['registerid'] = $row['register_id'];  
								//$_SESSION['login_user_id'] = $row['username'];
								// Initializing Session
								if($_SESSION['registerid']==1)
								{
									?>
								<script type="text/javascript">
								window.location.href = 'addcategory.php';
								</script>
								<?php
									//header("location:userpanel/admin.php");
							    }
								else
								{
								?>
								<script type="text/javascript">
								window.location.href = 'addcategory.php';
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
						}
					}
					
			?>
			
			
			
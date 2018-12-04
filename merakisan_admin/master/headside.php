
<?php
	
	if(empty($_SESSION['registerid']))
	{
			?>
			<script type="text/javascript">
			window.location.href = './index.php';
			</script>
			<?php
	}
	?>


<style>
.navbar {
    background: #007700 none repeat scroll 0 0 !important;
     }
	 
.ace-nav > li.light-blue > a {
	background-color: #000000 !important;
}	 
</style>

	
		
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							Organicpandit
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<!---<img class="nav-user-photo" src="profile/<?php echo $profile;?>" alt="Admin Photo" />--->
								<span class="user-info" style="text-transform: capitalize;">
									<small>Welcome,</small>
								<?php echo $name;?> <!--Display User Name -->
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close" style="width: 160px; left: 514px; right: auto; top: 122px;">
							<?php if($_SESSION['registerid'] == 1)
							{ ?>
								<li>
									<a href="profile.php">
										<i class="ace-icon fa fa-user"></i>
										Change Password
									</a>
								</li>
							<?php } ?>	
								<li class="divider"></li>

								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		
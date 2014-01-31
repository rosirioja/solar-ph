<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sample</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />

		<script src="js/jquery-2.0.0.min.js"></script>	
		<script src="js/Chart.js"></script>
		<script src="js/bootstrap-alert.js"></script>
		<script src="js/bootstrap-button.js"></script>
		<script src="js/bootstrap-carousel.js"></script>
		<script src="js/bootstrap-collapse.js"></script>
		<script src="js/bootstrap-dropdown.js"></script>
		<script src="js/bootstrap-fileupload.min.js"></script>
		<script src="js/bootstrap-modal.js"></script>
		<script src="js/bootstrap-paginator.min.js"></script>
		<script src="js/bootstrap-popover.js"></script>
		<script src="js/bootstrap-scrollspy.js"></script>
		<script src="js/bootstrap-tab.js"></script>	
		<script src="js/bootstrap-transition.js"></script>
		<script src="js/bootstrap-typeahead.js"></script>
		<script src="js/jquery.pnotify.min.js"></script>
		<script src="js/jquery.slimscroll.min.js"></script>
	</head>

	<body>
		<div>

			<!-- header -->
			<div class="row-fluid header">
				<div class="span12">
					<div class="pull-left header-left">
						<h1><a href="/">Solar Monitoring</a></h1>
						<blockquote>"You can't manage what you don't measure."</blockquote>
					</div>
					<div class="pull-right header-right">
						<div class="pull-right header-user">
							<!-- php CELINE MAE user -->
							<strong><a href="#">HI, CELINE MAE.</a></strong>
							&nbsp; &nbsp;
							<!-- logout link route -->
							<strong><a href="/logout" class="signout">SIGN OUT</a></strong>
						</div>
						<br />
						<div class="pull-right header-nav">
							<!-- corrent href -->
							<ul class="nav nav-pills">
							<li><a href="/home">Home</a></li>
							<li><a href="#">Solar Panel</a></li>
							<li><a href="#">Battery Banks</a></li>
							<li><a href="#">Report</a></li>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Settings</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div> 
			<!-- end of header -->

			<!-- Current Status -->
			<div class="row-fluid row-status">
				<div class="current span12">
					<div class="letterS">
						<img id="letter" src="images/letter3.png" alt="" width="100">
					</div>
					<!-- php codes -->
					<div class="status">
						<h4>System Current Status:</h4>
						<!-- corrent wattage -->
						<h3 class="watt">Accumulating 5,000w</h3>
						<p>As of: <?php date_default_timezone_set('Asia/Manila'); echo date('l F d, Y'); ?> &nbsp; <?php echo date('h:i A'); ?></p>
					</div>
				</div>
			</div>
			<!-- end of Current Status -->

			<!-- body -->
			<div class="row-fluid whole">
				
				<!-- Solar Panel -->
				<div class="span4 span-box">
					<div class="box1">
						<div class="box1_bot">
							<div class="pad">
								<div class="pad1">
									<div class="box1_top">
										<div class="title">
											<img id="solar" src="images/solar.ico">
											&nbsp;<b>Solar Panel</b>
										</div>						
									</div>
									<!-- corrent image and values -->
									<img src="images/sun.png">&nbsp;
									Wattage Rating: 40 watts &nbsp;
									<img src="images/temperature_3.png">&nbsp;
									Temperature: 26 &deg;C <br/>
									<div id="sp-graph" class="wrapper"></div>
									<!-- corrent href -->
									<div class="button">
										<a href="/solarpanel" class="btn btn-primary btn-med"><i class="icon-zoom-in"></i> Larger View</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end of solar panel -->

				<!-- Battery Banks -->
				<div class="span4">
					<div class="box1">
						<div class="box1_bot">
							<div class="pad">
									<div class="pad1">
										<div class="box1_top">
											<div class="title">
												<img id="battery" src="images/battery.png">&nbsp;
												<b>Battery Banks</b>
											</div>												
										</div>
										<!-- correct image and values -->	
										<img src="images/battery_3.png">
										Percentage: 95% &nbsp; &nbsp; &nbsp;
										<img id="power" src="images/power.png">
										Power Accumulated: 50 watts <br/>
										<div id="bb-graph" class="wrapper"></div>
										<!-- correct href -->
										<div class="button">
											<a href="/batterybank" class="btn btn-primary btn-med"><i class="icon-zoom-in"></i> Larger View</a>
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end of battery banks -->

				<!-- System Mode -->
				<div class="span4 span-box1">
					<div class="box1">
						<div class="box1_bot">
							<div class="pad">
								<div class="pad1">
									<div class="box1_top">
										<div class="title">
											<img id="systemmode" src="images/settings.ico">&nbsp;
											<b>System Mode</b>
										</div>													
									</div>
									<!-- corrent image and value -->
									<div class="row-fluid">
										<div class="span6 mode">
											<img src="images/radio-button_on.png">&nbsp;
											Automatic <br />
											<img src="images/radio-button_off.png">&nbsp;
											Manual 
										</div>
										<div class="span6 connection">
											<img src="images/power_on.png">&nbsp;
											SP-CC Connection<br/>
											<img src="images/bulb_on.png">&nbsp;
											BB-Load Connection<br/>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span10 legend offset2">
											<b>Legend:</b> <br/>
											SP - Solar Panel <br/>
											CC - Controller <br/>
											BB - Battery Bank <br/>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end of system mode -->

			</div>
			<!-- end of body -->

			<!-- footer -->
			<div class="row-fluid footer">
				<div class="span6 copyright">
					COPYRIGHT © 2013 SOLAR-GROUP. ALL RIGHTS RESERVED. </div>
				<div class="span6 links">
					<ul class=" nav nav-pills pull-right">
						<li><a>Partners</a></li>
						<li><a>Contact Us</a></li>
						<li><a>Policy</a></li>
						<li><a>Terms Of Use</a></li>
						<li><a>Links</a></li>
					</ul>
				</div>
			</div>
			<!-- end of footer -->

		</div> 
		<!-- end of bigger div -->
	</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#bb-graph').load('batterybank.php');
		$('#sp-graph').load('solarpanel.php');
	});
</script>
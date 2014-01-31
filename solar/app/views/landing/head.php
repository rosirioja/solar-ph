<!-- header -->
<div class="row-fluid header">
	<div class="span12">

		<!-- logo of the website -->
		<div class="pull-left header-left">
			<h1><a href="/">Solar Monitoring</a></h1>
			<blockquote>"You can't manage what you don't measure."</blockquote>
		</div>

		<!-- header information -->
		<div class="pull-right header-right">
			<div class="pull-right header-user">
				<!-- php CELINE MAE user -->
				<strong><a href="#">Hi, <?php echo $username; ?>.</a></strong>
				&nbsp; &nbsp;
				<!-- logout link route -->
				<strong><a href="/logout" class="signout">SIGN OUT</a></strong>
			</div>
			<br />

			<!-- navigation -->
			<div class="pull-right header-nav">
				<!-- corrent href -->
				<ul class="nav nav-pills">
				<li><a href="/">Home</a></li>
				<li><a href="/solarpanel">Solar Panel</a></li>
				<li><a href="/batterybank">Battery Banks</a></li>
				<li><a href="/report">Report</a></li>
				<li><a href="/aboutus">About Us</a></li>
				<li><a href="/settings">Settings</a></li>
				</ul>
			</div>
		</div>
	</div>
</div> 
<!-- end of header -->

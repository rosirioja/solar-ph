
<!-- Current Status -->
<div class="row-fluid row-status">
	<div class="current span12">
		<div class="letterS">
			<img id="letter" src="assets/images/letter3.png" alt="" width="100">
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
	
	<?php
		$temp = 0;
		$power = 0;

		foreach ($data1 as $row) {
			# code...
			$temp = $row->temperature;
			$power = $row->power;
		}

	?>
	<!-- Solar Panel -->
	<div class="span4 span-box">
		<div class="box1">
			<div class="box1_bot">
				<div class="pad">
					<div class="pad1">
						<div class="box1_top">
							<div class="title">
								<img id="solar" src="assets/images/solar.ico">
								&nbsp;<b>Solar Panel</b>
							</div>						
						</div>
						<img src="assets/images/sun.png">
						Wattage Rating: <?php echo $power; ?>W
						<img src=
						<?php 
							if($temp <= 15){
								echo("assets/images/temperature_1.png");
							}elseif ($temp <= 20) {
								echo("assets/images/temperature_2.png");
							}elseif ($temp <= 25) {
								echo("assets/images/temperature_3.png");
							}elseif ($temp <= 30) {
								echo("assets/images/temperature_4.png");
							}
							else{
								echo("assets/images/temperature_5.png");
							}
						?>
						>
						Temperature: <?php echo $temp; ?>&deg;C <br/>
						<div class="sp-graph">magload ka nman</div>
						<!-- corrent href -->
						<div class="button">
							<a href="/solarpanel" class="btn btn-info btn-med"><i class="icon-zoom-in"></i> Larger View</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end of solar panel -->

<?php
	$voltage = 0;
	$bbpower = 0;

		foreach ($data2 as $row) {
			# code...
			$voltage = $row->voltage;
			$bbpower = $row->power;
		}
		$temp = 	($temp);
		$voltage = ($voltage/14.0)*100;

?>
	<!-- Battery Banks -->
	<div class="span4">
		<div class="box1">
			<div class="box1_bot">
				<div class="pad">
						<div class="pad1">
							<div class="box1_top">
								<div class="title">
									<img id="battery" src="assets/images/battery.png">&nbsp;
									<b>Battery Banks</b>
								</div>												
							</div>
							<!-- correct image and values -->	
							<img src=
							<?php
								if($voltage <= 25){
									echo("assets/images/battery_1.png");
								}elseif ($voltage <= 50) {
									echo("assets/images/battery_2.png");
								}elseif ($voltage <= 75) {
									echo("assets/images/battery_3.png");
								}else{
									echo("assets/images/battery_4.png");
								}
							?>
							>
							Percentage: <?php echo $voltage; ?>% 
							<img id="power" src="assets/images/power.png">
							Power Accumulated: <?php echo $power; ?>W <br/>
							<div id="bb-graph" class="wrapper">
							</div>
							<!-- correct href -->
							<div class="button">
								<a href="/batterybank" class="btn btn-info btn-med"><i class="icon-zoom-in"></i> Larger View</a>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end of battery banks -->

<?php
	$sysmode="";
	$spccmode="";
	$bbloadmode="";
	$automatic="";
	$manual="";
	$spccpic="";
	$bbloadpic="";

	foreach ($data3 as $row) {
		# code...
		$sysmode = $row->systemmode;
		$spccmode = $row->spcc;
		$bbloadmode = $row->bbload;
	}

	if($sysmode == 'A'){
		$automatic = "assets/images/radio-button_on.png";
		$manual = "assets/images/radio-button_off.png";
	}else{
		$automatic = "assets/images/radio-button_off.png";
		$manual = "assets/images/radio-button_on.png";
	}

	if($spccmode == 'N'){
		$spccpic = "assets/images/power_on.png";
	}elseif ($spccmode == "F") {
		$spccpic = "assets/images/power_off.png";
	}else{
		$spccpic = "assets/images/power_off.png";
	}

	if($bbloadmode == 'N'){
		$bbloadpic = "assets/images/bulb_on.png";
	}elseif ($bbloadmode == "F") {
		$bbloadpic = "assets/images/bulb_off.png";
	}else{
		$bbloadpic = "assets/images/bulb_off.png";
	}

?>
	<!-- System Mode -->
	<div class="span4 span-box1">
		<div class="box1">
			<div class="box1_bot">
				<div class="pad">
					<div class="pad1">
						<div class="box1_top">
							<div class="title">
								<img id="systemmode" src="assets/images/settings.ico">&nbsp;
								<b>System Mode</b>
							</div>													
						</div>
						<!-- corrent image and value -->
						<div class="row-fluid">
							<div class="span6 mode">
								<img src=<?php echo $automatic; ?>>&nbsp;
								Automatic <br />
								<img src=<?php echo $manual; ?>>&nbsp;
								Manual 
							</div>
							<div class="span6 connection">
								<img src=<?php echo $spccpic; ?>>&nbsp; 
								SP-CC Connection<br/>
								<img src=<?php echo $bbloadpic; ?>>&nbsp;
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

<!-- SHOULD BE ABLE TO LOAD GRAPHS! -->
<script type="text/javascript">
	$(document).ready(function(){
		
		$('.sp-graph').on('load', function(){
		 alert("rosi graph");

		});

		/*$('#sp-graph').load('{{ URL::route("spgraph") }}');*/
	/*	$('#sp-graph').click(function(e){
    $.ajax({
      url: "spgraph",
      context: document.body
    }).done(function(fragment) { 
      $("#sp-graph").html(fragment);
    });
});*/
	});
</script>
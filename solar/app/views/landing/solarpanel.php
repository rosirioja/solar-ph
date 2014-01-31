<div class="row-fluid row-graph">
	<div class="span3 offset1">
		<!-- button -->
		<div class="well">
			<p>Sort By:</p>
			<br/>
			<select class="form-control time-select">
				<option data-time="hour">Hour</option>
				<option data-time="day">Day</option>
				<option data-time="month">Month</option>
				<option data-time="year">year</option>
			</select>
			<br/> <br/> 

			<p>Graph By:</p>
			<button type="button" class="btn btn-success btn-sm voltage-button">Voltage</button>
			<br/> <br/> 
			<button type="button" class="btn btn-success btn-sm current-button">Current</button>
			<br/> <br/> 
			<button type="button" class="btn btn-success btn-sm power-button">Power</button>
			<br/> <br/> 
			<button type="button" class="btn btn-success btn-sm temp-button">Temperatue</button>
			<br/>

		</div>
	</div>

	<div class="span6 well">

		<!-- getting datas from the database and forming them into string array -->
		<div>
			<?php

				$voltagelist = "[";
				$currentlist = "[";
				$powerlist = "[";
				$templist = "[";
				$maxvolt = 0;
				$maxcurrent = 0;
				$maxpower = 0;
				$maxtemp = 0;

				foreach ($data1 as $row) {

					$volt = $row->voltage;
					$current = $row->current;
					$power = $row->power;
					$temp = $row->temperature;

					if ($volt > $maxvolt){
						$maxvolt = $volt;
					}

					if ($current > $maxcurrent){
						$maxcurrent = $current;
					}

					if ($power > $maxpower){
						$maxpower = $power;
					}

					if ($temp > $maxtemp){
						$maxtemp = $temp;
					}

					$voltagelist .= $volt.',';
					$currentlist .= $current.',';
					$powerlist .= $power.',';
					$templist .= $temp.',';

				}

				$voltagelist .= "]";
				$currentlist .= "]";
				$powerlist .= "]";
				$templist .= "]";
			?>
		</div>

		<!-- graph -->
		<div class="graph-div">
			<canvas id="canvas" height="450" width="600"></canvas>
		</div>

		<!-- label -->
		<div>
		 <br/>
			<p class='graph-label'></p>
			<p class='time-label'></p>
		</div>

	</div>

	<div class="span2"></div>
</div>
<div class="body6">
	<div class="body7">


	</div>
</div>

<script type="text/javascript">

	/*getting the string array*/
	var voltdata = <?php echo $voltagelist; ?>;
	var currentdata = <?php echo $currentlist; ?>;
	var powerdata = <?php echo $powerlist; ?>;
	var tempdata = <?php echo $templist; ?>

	/*default values for the graph*/
	var data = voltdata;
	var time = ["12:00AM", "1:00AM", "2:00AM", "3:00AM", "4:00AM", "5:00AM", "6:00AM", "7:00AM", "8:00AM", "9:00AM", "10:00AM", "11:00AM", "12:00NN", "1:00PM", "2:00PM", "3:00PM", "4:00PM", "5:00PM", "6:00PM", "7:00PM","8:00PM", "9:00PM", "10:00PM", "11:00PM"];
	$('.time-label').html('<center>this <?php echo date("M d, Y"); ?></center >'); 
	var stepwidth;
	graph(); 

	/*selecting other battery banks characteristics*/
	$('.voltage-button').click(function(){
		data = voltdata;
		graph();
	});				

	$('.current-button').click(function(){
		data = currentdata;
		graph();
	});

	$('.power-button').click(function(){
		data = powerdata;
		graph();
	});

	$('.temp-button').click(function(){
		data = tempdata;
		graph();
	});

	/*selecting time frames for the graph*/
	$('.time-select').change(function(){

		selectedtime = $(this).find("option:selected").data("time");

		switch (selectedtime){

			case "hour":
				time = ["12:00AM", "1:00AM", "2:00AM", "3:00AM", "4:00AM", "5:00AM", "6:00AM", "7:00AM", "8:00AM", "9:00AM", "10:00AM", "11:00AM", "12:00NN", "1:00PM", "2:00PM", "3:00PM", "4:00PM", "5:00PM", "6:00PM", "7:00PM","8:00PM", "9:00PM", "10:00PM", "11:00PM"];
				$('.time-label').html('<center>this <?php echo date("M d, Y"); ?></center>'); 
				graph();
			break;

			case "day":
				time = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
				$('.time-label').html('<center>this Week 4 of <?php echo date("M Y"); ?></center>'); 
				graph();
			break;

			case "month":
				time = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
				$('.time-label').html('<center>this year <?php echo date("Y"); ?></center>'); 
				graph();
			break;

			case "year":
				time = ["2010", "2011", "2012", "2013", "2014"];
				$('.time-label').html(''); 
				graph();
			break;	
		}

	});

	/*the graph being created*/
	function graph(){

		/*computation for the stepwidth*/

		switch (data){

		case voltdata:
		maxvolt = <?php echo $maxvolt; ?>;
		stepwidth = Math.ceil(maxvolt / 5);
		$('.graph-label').html("<center>Graph of Solar Panel's Voltage (in Volts) </center>");
		break;

		case currentdata:
		maxcurrent = <?php echo $maxcurrent; ?>;
		stepwidth = Math.ceil(maxcurrent / 5);
		$('.graph-label').html("<center>Graph of Solar Panel's Current (in MilliAmperes) </center>");
		break;

		case powerdata:
		maxpower = <?php echo $maxpower; ?>;
		stepwidth = Math.ceil(maxpower / 5);
		$('.graph-label').html("<center>Graph of Solar Panel's Power (in Watts) </center>");
		break;

		case tempdata:
		maxtemp = <?php echo $maxtemp; ?>;
		stepwidth = Math.ceil(maxtemp / 5);
		$('.graph-label').html("<center>Graph of Solar Panel's Temperature (in Celsius) </center>");
		break;
		}

		/*charts.js part*/
		var lineChartData = {
			labels : time,
			datasets : [
				{
					fillColor : "rgba(151,187,205,0.5)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					data : data
				}
			]
		}

		var options = {
			scaleOverlay : false,

			scaleOverride : true,
			scaleSteps : 5,
			scaleStepWidth : stepwidth,
			scaleStartValue : 0,

			scaleLineColor : "rgba(0,0,0,.1)",
			scaleLineWidth : 1,
			scaleShowLabels : true,
			scaleLabel : "<%=value%>",
			scaleFontFamily : "'Arial'",
			scaleFontSize : 12,
			scaleFontStyle : "normal",
			scaleFontColor : "#666",
			scaleShowGridLines : true,
			scaleGridLineColor : "rgba(0,0,0,.05)",
			scaleGridLineWidth : 1,
			bezierCurve : true,
			pointDot : true,
			pointDotRadius : 4,
			pointDotStrokeWidth : 2,
			datasetStroke : true,
			datasetStrokeWidth : 2,
			datasetFill : true,
			animation : true,
			animationSteps : 60,
			animationEasing : "easeOutQuart",
			onAnimationComplete : null
		}

		var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData, options);
	}

</script>

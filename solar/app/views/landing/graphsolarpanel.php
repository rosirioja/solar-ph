<div class="row-fluid row-graph1">

	<div class="span12">
		
		<!-- getting datas from the database and formig them into string array -->
			<?php

			$powerlist = "[";
			$maxpower = 0;

			foreach ($data1 as $row) {
			
				$power = $row->power;

				if ($power > $maxpower){
					$maxpower = $power;
				}

				$powerlist .= $power.',';
			}

			$powerlist .= "]";

			?>
		
		<!-- graph -->
		<div class="graph-div row-justgraph well">
			<canvas id="canvas1" height="250" width="400"></canvas>
		</div>

	</div>
	
</div>


<script type="text/javascript">

	$(document).ready(function(){

		/*getting the string array*/
		var powerdata = <?php echo $powerlist; ?>;

		/*default values for the graph*/
		var data = powerdata;
		var time = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "","", "", "", ""];	

			/*computation for the stepwidth*/
					maxpower = <?php echo $maxpower; ?>;
					stepwidth = Math.ceil(maxpower / 5);
			
			/*charts.js part*/

			var lineChartData = {

				labels: time,
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
				bezierCurve : false,
				pointDot : false,
				pointDotRadius : 4,
				pointDotStrokeWidth : 2,
				datasetStroke : true,
				datasetStrokeWidth : 4,
				datasetFill : false,
				animation : true,
				animationSteps : 60,
				animationEasing : "easeOutQuart",
				onAnimationComplete : null
			}

			var myLine = new Chart(document.getElementById("canvas1").getContext("2d")).Line(lineChartData, options);


	});
</script>

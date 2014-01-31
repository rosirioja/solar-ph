<!DOCTYPE html>

<html lang="en">
	<head>
		<title><?php echo $title; ?></title>
		<meta charset="utf-8">
		<meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
		
		<!-- for the graph -->
		<style>
			canvas{
			}
		</style>
		
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-responsive.css"  type="text/css"/>

		<script src="assets/js/jquery-2.0.0.min.js"></script>
		<script src="assets/js/jquery-migrate-1.2.0.min.js"></script>	
		<script src="assets/js/bootstrap.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>	
		<script src="assets/js/Chart.js"></script>
		<script src="assets/js/bootstrap-alert.js"></script>
		<script src="assets/js/bootstrap-button.js"></script>
		<script src="assets/js/bootstrap-carousel.js"></script>
		<script src="assets/js/bootstrap-collapse.js"></script>
		<script src="assets/js/bootstrap-dropdown.js"></script>
		<script src="assets/js/bootstrap-fileupload.min.js"></script>
		<script src="assets/js/bootstrap-modal.js"></script>
		<script src="assets/js/bootstrap-paginator.min.js"></script>
		<script src="assets/js/bootstrap-popover.js"></script>
		<script src="assets/js/bootstrap-scrollspy.js"></script>
		<script src="assets/js/bootstrap-tab.js"></script>	
		<script src="assets/js/bootstrap-transition.js"></script>
		<script src="assets/js/bootstrap-typeahead.js"></script>
		<script src="assets/js/jquery.pnotify.min.js"></script>
		<script src="assets/js/jquery.slimscroll.min.js"></script>
	</head>

	<body>
		<div class="head"><?php echo $head; ?></div>
		<div class="body"><?php echo $body; ?></div>
		<div class="foot"><?php echo $foot; ?></div>
	</body>
</html>

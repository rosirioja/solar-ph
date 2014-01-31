<!DOCTYPE html>

<html lang="en">
	<head>
		<title>Solar.ph</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<script src="assets/js/jquery-2.0.0.min.js"></script>
		<script src="assets/js/jquery-migrate-1.2.0.min.js"></script>	
		<script src="assets/js/bootstrap.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>	

		<link href="assets/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/bootstrap-responsive.css"  type="text/css"/>
		<link rel="stylesheet" href="assets/css/login.css" type="text/css" media="all">
	</head>

	<body>
		<div class="container-fluid">
			
			<!-- logo of the website -->
			<div class="row-fluid row-logo">
					<div class="span6 offset3">
				<center>
						<h1><a href="" id="logo">First</a></h1>
			<!-- log in part -->
			 <form class="form-signin login-form" method="post" action="">
        <input name="username" type="text" class="form-control" placeholder="Username" autofocus>
        <input name="password" type="password" class="form-control" placeholder="Password">
        <button class="btn btn-lg btn-success btn-block login-button" type="submit">Sign in</button>
      </form>
				</center>
					</div>

					<div class="span3"></div>
			</div>

		</div>
	</body>

</html>


<script type="text/javascript">
	$(document).ready(function(){

		$('.login-button').click(function(e){
			e.preventDefault();
			
			$.ajax({
				url: "/check/user",
				type: "post",
				data: $(".login-form").serialize(),
				success: function(data){
					if (data == "true"){
						location.href = "/";
					}else{
						location.href = "/login";
					}
				}
			});

		});
	});
</script>

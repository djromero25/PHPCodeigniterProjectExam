<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=.1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Welcome</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
	<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<body>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.1.4.min-2.js"); ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
	<style>
	.error{
		color: red;
	}
	</style>
	<div class="container">
		<div class="row">
			<div class="column-md-6">
				<fieldset>
					<legend><?= $data['alias']?>'s profile</legend>
					<dl class="dl-horizontal">
					  <dt>Name:</dt>
					  <dd><?= $data['name'] ?></dd>
					  <dt>Email Address:</dt>
					  <dd><?= $data['email'] ?></dd>
					</dl>
				</fieldset>
			</div>
			<div class="column-md-6">
				<a href="/">Home</a>
				<a href="/users/logoff">Logout</a>
			</div>
		</div>	
	</div>
</body>
</html>
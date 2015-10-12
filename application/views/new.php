<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=.1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Registration</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/datepicker.css"); ?>" />
	<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<body>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.1.4.min-2.js"); ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/bootstrap-datepicker.js"); ?>"></script>
    <script type="text/javascript">
		$(document).ready(function(){
			$('#datepicker1').datepicker();
		});
	</script>
	<style>
	.error{
		color: red;
	}
	</style>
	<div class="container">
<?php
if($this->session->flashdata('errors'))
{
	echo $this->session->flashdata('errors');
}?>	
		<div class="row">
			<h1>Welcome</h1>
			<div class="col-md-6">
				<form method="post" action="/create_user" class="form-horizontal">
					<fieldset>
						<legend>Register</legend>
						<div class="form-group">
							<label for="first_name" class="col-md-4 control-label">Name:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="name">
							</div>
						</div>
						<div class="form-group">
							<label for="alias" class="col-md-4 control-label">Alias:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="alias">
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-md-4 control-label">Email:</label>
							<div class="col-md-8">
								<input type="email" class="form-control" name="email">
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-md-4 control-label">Password:</label>
							<div class="col-md-8">
								<input type="password" class="form-control" name="password">
							</div>
						</div>
						<div class="form-group">
							<label for="confirm" class="col-md-4 control-label">Confirm Password:</label>
							<div class="col-md-8">
								<input type="password" class="form-control" name="confirm">
							</div>
						</div>
						<div class="form-group">
							<label for="confirm" class="col-md-4 control-label">Birth Date (MM/DD/YYYY):</label>
							<div class='input-group date' id='datepicker1' data-provide="datepicker">
								<input type='text' class="form-control datepicker" name="birth_date">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-4 col-md-8">
								<input type="submit" value="Register">
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="col-md-6">
				<form method="post" action="/login" class="form-horizontal">
					<fieldset>
						<legend>Login</legend>
						<div class="form-group">
							<label for="email" class="col-md-2 control-label">Email:</label>
							<div class="col-md-10">
								<input type="text" class="form-control" name="email">
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-md-2 control-label">Password:</label>
							<div class="col-md-10">
								<input type="password" class="form-control" name="password">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-2 col-md-10">
								<input type="submit" value="Login">
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
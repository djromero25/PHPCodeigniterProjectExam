<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=.1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>All Products - Semi-RESTful Route Demo</title>

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
	</style>
	<div class="container">
		<h1>Hello, <?=$this->session->userdata('alias')?>!</h1>
		<div class="row">
<?php
if($friends[0]['friend_id'] == null)
{?>
			<h3>You don't have any friends yet.</h3>
<?php
}
else
{?>
			<h4>Here is a list of your friends.</h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Alias</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
<?php
	foreach ($friends as $row)
	{?>
					<tr>
						<td><?= $row['alias'] ?></td>
						<td>
							<a href="/show_user/<?= $row['friend_id'] ?>">View Profile</a>
							<a href="/destroy_friend/<?= $row['friend_id'] ?>">Remove as Friend</a>
						</td>
					</tr>
<?php
	}?>
				</tbody>
			</table>
		</div>
<?php
}?>
		<div class="row">
			<h4>Other users not on your friends list.</h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Alias</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
<?php
foreach ($non_friends as $row)
{?>
					<tr>
						<td>
							<a href="/show_user/<?= $row['user_id'] ?>"><?= $row['alias'] ?></a>
						</td>
						<td>
							<form method="post" action="/create_friend/<?= $row['user_id'] ?>" class="form-inline">
								<input type="submit" value="Add as Friend">
							</form>
						</td>
					</tr>
<?php
}?>
				</tbody>
			</table>
		</div>
		<a href="/logoff">Logout</a>
	</div>
</body>
</html>
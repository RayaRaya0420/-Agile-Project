<?php

session_start();

?>

<!doctype html>
<html>
<head>
<title>Peer Assessment</title>
<meta charset="utf-8">
<meta name="viewport" content="widlabel=device-widlabel, initial-scale=1">
<link rel="stylesheet" href="css/style.css" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
	<header>
		<div class="pull-left">Agile Scrum Team <br/>Peer Assessment</div>
		<div class="pull-right">
			<?php		
			if (isset($_SESSION['student_no'])) {
				echo '<p class="status">You are logged in! ' . $_SESSION['student_fname'] . ' ' . $_SESSION['student_lname'] . '</p>';
				echo '<form action="php/logout.inc.php" method="post"><button type="submit" name="logout_submit">Logout</button></form>';
			} else {
				echo '<p class="status" style="margin-top: 20px;">You are logged out!</p>';
			}
			?>
			
		</div>
	</header>
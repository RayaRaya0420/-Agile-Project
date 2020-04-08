<?php

require "header.php";
require "php/dbh.inc.php";
if (isset($_SESSION['student_no'])) {
	
?>

<div class="container">
	<br>
	<h3>Peer Assessment Submited!</h3>
	<br>
	<form action="php/logout.inc.php" method="post">
		<button class="logout-submit" type="submit" name="logout_submit">Logout</button>
	</form>
	<br>
</div>

<?php

} else {
	header("Location: login.php");
}

?>
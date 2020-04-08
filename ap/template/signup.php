<?php

require "header.php";

?>

	<br>
	<fieldset class="signup">
		<form class="signupform" action="php/signup.inc.php" method="post">
			<h2>Signup</h2>
			<hr>
			<p class="signuperror">
				<?php
				if (isset($_GET['error'])) {
					if ($_GET['error'] == emptyfields) {
						echo '***Fill in all fields***';
					}
					else if ($_GET['error'] == wrongnumber) {
						echo '***Invalid student number***';
					}
				}
				?>
			</p><br>
			<p>Student Number</p><input type="text" name="student_no"><span class="focus-bg"></span>
			<p>First Name</p><input type="text" name="student_fname"><span class="focus-bg"></span>
			<p>Last Name</p><input type="text" name="student_lname"><span class="focus-bg"></span>			
			<p>Group Number</p><input type="text" name="group_id"><span class="focus-bg"></span>
			<p>Password</p><input type="password" name="pwd"><span class="focus-bg"></span>

			<button type="submit" name="signup_submit">Signup</button>
			
		</form>
	</fieldset>
	<br>

<?php

require "footer.php";

?>
<?php

require "header.php";

?>

	<br>
	
	<fieldset class="login">
		<form class="loginform" action="php/login.inc.php" method="post">
			<h2>Log in</h2>
			<hr>

			<label class="loginerror">
				<?php
				if (isset($_GET['error'])) {
					if ($_GET['error'] == emptyfields) {
						echo '***Fill in all fields***';
					} else if ($_GET['error'] == wrongpwd) {
						echo '***Invalid password***';
					}
				} elseif (isset($_GET['seccess'])) {
					echo 'Registration successful, please login.';
				}
				?>
			</label><br>
			<p>Student Number</p><input type="text" name="student_no"><span class="focus-bg"></span>
			<p>Password</p><input type="password" name="pwd"><span class="focus-bg"></span>

			<button type="submit" name="login_submit">Login</button>
			<button type="submit" name="signup_submit">Signup</button>
			
		</form>
		<br>
	</fieldset>
<br>

<?php

require "footer.php";

?>
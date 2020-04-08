<?php
if (isset($_POST['signup_submit'])){
	
	require "dbh.inc.php";
	
	$student = $_POST['student_no'];
	$fname = $_POST['student_fname'];
	$lname = $_POST['student_lname'];
	$group = $_POST['group_id'];
	$password = $_POST['pwd'];
	$hashpwd = password_hash($password, PASSWORD_DEFAULT);

	if (empty($student) || empty($fname) || empty($lname)  || empty($group) || empty($password)){
		header("Location: ../signup.php?error=emptyfields");
		exit();
	}
	else{
		$sql = mysqli_query($link, "SELECT * FROM `students` WHERE student_no = ". $student .";");
		if (mysqli_num_rows($sql) > 0) {
			header("Location: ../signup.php?error=wrongnumber");
			exit();
		}
		else {
			$sql = "INSERT INTO `students` (student_no, student_fname, student_lname, group_id, password) 
					VALUES ('". $student . "', '" . $fname. "', '" . $lname . "', '" . $group . "', '" . $hashpwd . "')";
			$stmt = mysqli_stmt_init($link);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: ../signup.php?error=sqlerror");
				exit();
			} else {
				$result = $link->query($sql);
				header("Location: ../login.php?seccess");
				exit();
			}
		}
	}	
}

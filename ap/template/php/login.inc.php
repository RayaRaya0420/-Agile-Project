<?php
if (isset($_POST['login_submit'])){
	
	require "dbh.inc.php";

	$student = $_POST['student_no'];
	$password = $_POST['pwd'];

	if (empty($student) || empty($password)){
		header("Location: ../login.php?error=emptyfields&student_no=".$student);
		exit();
	}
	else {
		$sql = mysqli_query($link, "SELECT * FROM `students` WHERE student_no = ". $student);
		if ($row = mysqli_fetch_assoc($sql)) {
			$check = password_verify($password, $row['password']);
			if ($check == false) {
				header("Location: ../login.php?error=wrongpwd");
				exit();
			} elseif ($check == true) {
				session_start();
				$_SESSION['student_no'] = $row['student_no'];
				$_SESSION['student_fname'] = $row['student_fname'];
				$_SESSION['student_lname'] = $row['student_lname'];
				$_SESSION['group_id'] = $row['group_id'];
				if (strlen($row['student_no']) == 6) {
					header("Location: ../output.php");
					exit();
				} else {
					header("Location: ../survey.php");
					exit();
				}
			}
		}
	}
}
else{
	header("Location ../login.php");
	exit();
}
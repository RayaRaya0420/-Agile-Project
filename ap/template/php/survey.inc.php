<?php
session_start();
require "dbh.inc.php";


if (isset($_POST['survey_submit'])){

	$answers = $_POST['answer'];
	foreach ($answers as $key => $value) {
		$items = explode (",", $value);
		$array[] = $items;
	}

	function insert($array, $link){
		if (is_array($array)) {

			$sql = mysqli_query($link, "SELECT * FROM `students` WHERE group_id = ". $_SESSION['group_id'] .";");
			if ( (count($array)) !== ((mysqli_num_rows($sql)-1)*8) ){
				header("Location: ../survey.php?error=emptyanswer");
				exit();
			} else {
				foreach ($array as $row => $value) {
					$student = mysqli_real_escape_string($link, $value[0]);
					$valued = mysqli_real_escape_string($link, $value[1]);
					$question = mysqli_real_escape_string($link, $value[2]);
					$answer = mysqli_real_escape_string($link, $value[3]);
					$sql = "INSERT INTO `data` (student_no, value_s, question_id, 	answer_id) VALUES ('". $student . "', '" . $valued . "', '	" . $question . "', '" 	. $answer . "')";
					mysqli_query($link, $sql);
				}
				header("Location: ../finish.php");
				exit();
			}			
		} else {
			header("Location: ../survey.php?error=emptyanswer");
			exit();
		}
	}
	insert($array, $link);
}
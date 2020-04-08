<?php

require "dbh.inc.php";

if (isset($_POST['survey_output'])) {
	header('Content-type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('Student Number', 'Valued Student', 'Question ID', 'Answer ID', 'Submit Date'));
	$sql = mysqli_query($link, "SELECT student_no, value_s, question_id, answer_id, date(date) AS date FROM `data` WHERE LENGTH(`student_no`)=8");
	while ($row = mysqli_fetch_assoc($sql)) {
		fputcsv($output, $row);
	}
	fclose($output);
}
?>
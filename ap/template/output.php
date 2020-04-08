<?php

require "header.php";
require "php/dbh.inc.php";

if (isset($_SESSION['student_no'])) {
	$sql = mysqli_query($link, "SELECT student_no, value_s, question_id, answer_id, date(date) AS date FROM `data` WHERE LENGTH(`student_no`)=8");
	
	?>
	<br>
	<div class="container">
		<br>
		<form method="post" action="php/output.inc.php">
			<input type="submit" name="survey_output" class="action-button" value="	CSV Export">
		</form>
		<br>
		<table style="margin: auto;">
			<tr>
				<th width="25%">Student Number</th>
				<th width="25%">Valued Student</th>
				<th width="18%">Question ID</th>
				<th width="18%">Answer ID</th>
				<th width="24%">Submit Date</th>
			</tr>
			<?php
			while ( $row = mysqli_fetch_array($sql)) 
			{
			?>
			<tr>
				<td><?php echo $row["student_no"] ?></td>
				<td><?php echo $row["value_s"] ?></td>
				<td><?php echo $row["question_id"] ?></td>
				<td><?php echo $row["answer_id"] ?></td>
				<td><?php echo $row["date"] ?></td>
			</tr>
	
		<?php	
		}	
		?>
		</table>
		<br>
	</div>

<?php

} else {
	header("Location: login.php");
}	
require "footer.php";

?>
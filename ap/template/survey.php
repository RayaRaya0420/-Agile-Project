<?php

require "header.php";
require "php/dbh.inc.php";

if (isset($_SESSION['student_no'])) {

?>

<div class="container">
	<main>
		<form id="msform" action="php/survey.inc.php" method="post">   
			<ul id="progressbar">
				<li class="active">Planning<br>Meeting</li>
				<li>Daily Scrum<br>Meeting</li>
				<li>Client<br>Meeting</li>
				<li>Retrospective<br>Meeting</li>
				<li>Coding<br>Activities</li>
				<li>Non-coding<br>Activities</li>
				<li>Merged<br>Work</li>
				<li>Working<br>Agreement</li>
			</ul>
			
			<?php
			
			$sqlq = mysqli_query($link, "SELECT * FROM `question`");
			if ($sqlq -> num_rows > 0){
				while ($rowq = mysqli_fetch_assoc($sqlq)){
					echo '<fieldset class="questionForm" data-question="' . $rowq["question_id"] . '">';
					echo '<h3>' . $rowq["question_id"] . '. ' . $rowq["question_body"] . '</h3>';

					if (isset($_GET['error'])) {
						if ($_GET['error'] == emptyanswer) {
							echo '<p class="error">***Empty answer(s)***</p>';
						}
					}
						
					$sqlg = mysqli_query($link, "SELECT * FROM `students` WHERE group_id = " . $_SESSION['group_id']);
					while ($rowg = mysqli_fetch_assoc($sqlg)){
						echo '<div class="row">';
						if ($rowg['student_no'] !== $_SESSION['student_no']) {
							echo '<label class="student">'. $rowg['student_no'] . '</label>';

							$sqla = mysqli_query($link, "SELECT q.question_id AS id, a.answer_body AS answer FROM `q-a` AS qa, `question` AS q,`answer` AS a WHERE q.question_id = qa.question_id and a.answer_id = qa.answer_id");	
							$i = 0;
							while ($rowa = mysqli_fetch_assoc($sqla)) {
								if ($rowa['id'] == $rowq["question_id"]) {
									$i++;
									$student = $_SESSION['student_no'];
									$valued = $rowg['student_no'];
									$question = $rowq["question_id"];
									echo '<label class="choice"><input id="answer" type="radio" name="answer[' . $student . $valued . $question . $i . ']" value="' . $student . ',' . $valued . ',' . $question . ',' . $i . '"/>' . $rowa['answer'] . '<span class="checkmark"></span></label>';
								}
							}
						}
						echo '</div>';
					}
					if ($rowq['question_id'] !== '1') {
						echo '<input type="button" name="previous" class="previous action-button" value="Previous"/>';
					}
					if ($rowq['question_id'] == '8') {
						echo '<input type="submit" name="survey_submit" class="action-button" value="Submit" />';
					} else {
						echo '<input type="button" name="next" class="next action-button" value="Next" />';
					}
					echo '</fieldset>';	
				}
			}
			
			
		?>

			<br>
		</form><!-- msform -->
	
</main>
</div><!--container-->

<?php

} else {
	header("Location: login.php");
}	

require "footer.php";

?>
<?php
session_start();
?>

<?php
if (isset($_SESSION['student_no'])) {
	if (strlen($_SESSION['student_no']) == 8) {
		echo '<footer><div class="pull-left">Total: 8 questions</div></footer>';
	} else {
		echo '<footer><div class="pull-left">&nbsp</div></footer>';
	}
} else {
	echo '<footer><div class="pull-left">&nbsp</div></footer>';
}
?>

	<script src="https://code.jquery.com/jquery-1.11.0.min.js" integrity="sha256-spTpc4lvj4dOkKjrGokIrHkJgNA0xMS98Pw9N7ir9oI=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
	<script src="js/App.js"></script>
</body>
</html>

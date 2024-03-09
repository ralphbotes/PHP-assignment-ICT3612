<?php
	class AssignmentRecord {
		// Constants for assignment weight
		const ASS_1_WEIGHT = 0.1;
		const ASS_2_WEIGHT = 0.1;
		const ASS_3_WEIGHT = 0.8;

		// Initiate private class variables
		private $studentNumber;
		private $Ass1;
		private $Ass2;
		private $Ass3;

		public function __construct($studentNumber, $Ass1, $Ass2, $Ass3) {
			$this->studentNumber = $studentNumber;
			$this->Ass1 = $Ass1;
			$this->Ass2 = $Ass2;
			$this->Ass3 = $Ass3;
		}

		public function __toString() {
			return ($this->studentNumber.",".$this->Ass1.",".$this->Ass2.",".$this->Ass3);
		}

		public function getYearMark() {
			return ($this->Ass1 * self::ASS_1_WEIGHT + $this->Ass2 * self::ASS_2_WEIGHT + $this->Ass3 * self::ASS_3_WEIGHT);
		}
	}

	class FullRecord extends AssignmentRecord {
		private $examMark;

		public function __construct($studentNumber, $Ass1, $Ass2, $Ass3, $Exam) {
			$this->studentNumber = $studentNumber;
			$this->Ass1 = $Ass1;
			$this->Ass2 = $Ass2;
			$this->Ass3 = $Ass3;
			$this->Exam = $Exam;
			$examMark = $this->Exam;

			// Call AssignmentRecord construct to finish initialization
			parent::__construct($studentNumber, $Ass1, $Ass2, $Ass3);
		}

		public function __toString() {
			return (parent::__toString() . "," . $this->Exam);
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Task 3</title>
	</head>
	
	<body>
		<?php include 'menu.inc'; ?>
		<h1>Task 3</h1>
		<?php 
			// Set new object FullRecord
			echo("<strong>Set new object FullRecord with values: </strong>123456,70,80,50,55<br><br>");
			$fullRecord = new FullRecord(123456,70,80,50,55);
			// Get year mark
			echo("<strong>Get Year Mark:</strong> " . $fullRecord->getYearMark() . "<br>");
			// Get string values
			echo("<strong>Get String values:</strong> " . $fullRecord);
		?>
		<iframe src="task3.txt" height="400" scrolling="yes" width="1200px">
			<p>Your browser does not support iframes.</p>
		</iframe>
	</body>
</html>
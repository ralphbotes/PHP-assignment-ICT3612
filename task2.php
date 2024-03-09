<?php
	class Square {
		// Initiate private class variables
		

		public function __construct($lengthOfSide) {
			$this->lengthOfSide = $lengthOfSide;
			$this->name = "Square";
		}

		public function getLengthOfSide() {
			return $this->lengthOfSide;
		}

		public function setLengthOfSide($value) {
			$this->lengthOfSide = $value;
		}

		public function getName() {
			return $this->name;
		}

		public function getArea() {
			return ($this->lengthOfSide * $this->lengthOfSide);
		}

		public function getPerimeter() {
			return (4 * $this->lengthOfSide);
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Task 2</title>
	</head>
	
	<body>
		<?php include 'menu.inc'; ?>
		<h1>Task 2</h1>
		<?php
			// Set new object Square
			echo("<strong>Set new object Square with length of one side as 4</strong><br><br>");
			$square = new Square(4);

			// Get name of object
			echo("<strong>Get object name:</strong> " . $square->getName());

			// Get length of one side of object
			echo("<br><strong>Get length of one side of object:</strong> " . $square->getLengthOfSide());

			// Change length of one side of object
			echo("<br><br><strong>Change length of one side of object to 6</strong>" . $square->setLengthOfSide(6));

			// Get length of one side of object
			echo("<br><strong>Get length of one side of object:</strong> " . $square->getLengthOfSide());

			// Get area of object
			echo("<br><br><strong>Get area of object:</strong> " . $square->getArea());

			// Get perimeter of object
			echo("<br><br><strong>Get perimeter of object:</strong> " . $square->getPerimeter());
		?>
		<iframe src="task2.txt" height="400" scrolling="yes" width="1200px">
			<p>Your browser does not support iframes.</p>
		</iframe>
	</body>
</html>
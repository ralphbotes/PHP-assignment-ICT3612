<?php
	// Task 1 (a) function boolToText()
	function boolToText($boolValue, $formatDisplayed = 1) {
		// Initiate local variable
		$returnValue;
		// Use switch for second param for 1, 2, 3, and default
		switch ($formatDisplayed) {
			case 1:
				// Set return variable value for 1
				if ($boolValue == 0) {
					$returnValue = "False";
				} else {
					$returnValue = "True";
				}
				break;
			case 2:
				// Set return variable value for 2
				if ($boolValue == 0) {
					$returnValue = "No";
				} else {
					$returnValue = "Yes";
				}
				break;
			case 3:
				// Set return variable value for 3
				if ($boolValue == 0) {
					$returnValue == "Negative";
				} else {
					$returnValue = "Positive";
				}
				break;
			default:
			// Set return variable value for any other value
				if ($boolValue == 0) {
					$returnValue = 0;
				} else {
					$returnValue = 1;
				}
		}
		return $returnValue;
	}

	// Task 1 (b) function numNumeral()
	function numNumeral() {
		// Get number of paramaters
		$numberOfParams = func_get_args();
		
		// Initiate local variable
		$total = func_num_args();
		$numOfNumerals = 0;

		foreach ($numberOfParams as $number) {
			if (is_numeric($number)) {
				$numOfNumerals += 1;
			}
		}
		echo("Total number of arguments: " . $total . ", total number of numerals in these arguments: " . $numOfNumerals);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Task 1</title>
	</head>
	
	<body>
		<?php include 'menu.inc'; ?>
		<h1>Task 1</h1>
		<p>////////////////////////////// Task1 (a) //////////////////////////<br>
		<strong>boolToText(1)</strong>:&emsp;&ensp;&ensp;<?php echo(boolToText(1)); ?><br>
		<strong>boolToText(0, 2):</strong>&emsp;<?php echo(boolToText(0, 2)); ?><br>
		<strong>boolToText(1, 3):</strong>&emsp;<?php echo(boolToText(1, 3)); ?><br>
		<strong>boolToText(0, 5):</strong>&emsp;<?php echo(boolToText(0, 5)); ?>
		</p>

		<p>////////////////////////////// Task1 (b) //////////////////////////<br>
		<strong>numNumeral("Thando", 23, "Busi", 40):</strong><br><?php numNumeral("Thando", 23, "Busi", 40); ?><br>
		<strong>numNumeral("Mutsa"):</strong><br><?php numNumeral("Mutsa"); ?>
		</p>
		<iframe src="task1.txt" height="400" scrolling="yes" width="1200px">
			<p>Your browser does not support iframes.</p>
		</iframe>
	</body>
</html>
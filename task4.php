<?php
	////////////////////////////// Task4 (a) //////////////////////////
	Class Validate {
		// Regular expression for only lowercase letters
		private static $regExpLower = "^[a-z_\-]+$^";
		// Regular expression for only digits of between 6 and 8 digits
		private static $regExpDigits = "^([0-9]{6}|[0-9]{7}|[0-9]{8})$^";

		public static function valUsername($value) {
			$match = preg_match(self::$regExpLower, $value);
			if ($match == 1) {
				// True
				return "True";
			} else {
				// False
				return "False";
			}
		}

		public static function valPassword($value) {
			$match = preg_match(self::$regExpDigits, $value);
			if ($match == 1) {
				// True
				return "True";
			} else {
				// False
				return "False";
			}
		}
	}
	////////////////////////////// Task4 (b) //////////////////////////
	function pregMatchString($value) {
		// Return 1 if a match was found and 0 if no match was found
		return (preg_match("/^[01]?\d\/[0-3]\d\/\d{4}$/", $value));
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Task 4</title>
	</head>
	
	<body>
		<?php include 'menu.inc'; ?>
		<h1>Task 4</h1>
		<p>////////////////////////////// Task4 (a) //////////////////////////<br>
		<?php 
			// Create new Validate object
			echo("<strong>Create new Validate object:</strong><br><br> ");
			$validate = new Validate();

			// Validate username, check if all are lowercase letters
			echo("<strong>Validate:</strong> UseRNamE = " . $validate->valUsername("UseRNamE") . "<br>");
			echo("<strong>Validate:</strong> username = " . $validate->valUsername("username") . "<br><br>");
		
			// Validate password, check if all digits between 6 and 8
			echo("<strong>Validate:</strong> 1234567 = " . $validate->valPassword(1234567) . "<br>");
			echo("<strong>Validate:</strong> 1234 = " . $validate->valPassword(1234) . "<br>");		
		?>
		</p>

		<p>////////////////////////////// Task4 (b) //////////////////////////<br>
		<?php 
			// Run the function to display return values
			// Valid match for 02/24/1993
			echo("<strong>02/24/1993 :</strong>" . pregMatchString("02/24/1993") . "<br>");
			// Invalid match for 02/24/93
			echo("<strong>02/24/93 :</strong>" . pregMatchString("02/24/93") . "<br>");
		?>
		</p>
		<iframe src="task4.txt" height="400" scrolling="yes" width="1200px">
			<p>Your browser does not support iframes.</p>
		</iframe>
	</body>
</html>
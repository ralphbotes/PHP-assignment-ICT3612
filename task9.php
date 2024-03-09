<?php
	////////////////////////////// Task9 (b) //////////////////////////
	// Connect to database
	require_once('model/database.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Task 9</title>
	</head>
	
	<body>
		<?php include 'menu.inc'; ?>
		<h1>Task 9</h1>
		<p>
		////////////////////////////// Task9 (a) //////////////////////////
		</p>
		<p><strong>Problem:</strong><br>
		A yearly kayak fishing competition is held in Witsand, Western Cape. This competition allows<br>
		for contestants to compete in a series of fishing and kayaking skill events held over a course<br>
		of 3 days. After the 3 days, the winner is the contestant who accumulated the most points<br>
		during the competition.<br><br>
		Any contestant is allowed to compete, but a contestant can only take<br>
		the win and the trophy once every 5 years. After a 5-year period, the contestant is able to win<br>
		and take the trophy again. If a contestant has won within the 5-year waiting period, the prize<br>
		should automatically fall to the runner-up.
		</p>
		<p><strong>Solution:</strong><br>
		An online database application is required to keep track of each contestant and the winners.<br>
		This is to allow for easy competition registration, as well keeping track of the winners and the<br>
		years they won. Using contestant ID numbers will ensure no problems arise and the 5 year waiting<br>
		period rule is strictly obayed.
		</p>
		<p>
		////////////////////////////// Task9 (b) //////////////////////////<br>
		<a href="controller/index.php?action=list_contestants">Go to Witsand Kayak Fishing Competition Page</a><br><br>
		</p>
		<iframe src="task9.txt" height="400" scrolling="yes" width="1200px">
			<p>Your browser does not support iframes.</p>
		</iframe>
	</body>
</html>
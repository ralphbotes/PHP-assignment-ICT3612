<?php
////////////////////////////// Task3 code //////////////////////////
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
////////////////////////////// Task8 (a) //////////////////////////
function writeToFile(array $FullRecordsArray) {
	// Open the text file
	$fullRecordsFile = fopen("fullrecords.txt", "w");

	foreach($FullRecordsArray as $FullRecord) {
		// Write array to text file
		$txt = $FullRecord . "\n";
		fwrite($fullRecordsFile, $txt);
	}
	// Close the text file
	fclose($fullRecordsFile);
}

////////////////////////////// Task8 (b) //////////////////////////
function readFromFile() {
	$TextArray = array();
	$FullRecordsArray[] = array();
	$file = "fullrecords.txt";
	// Open the text file
	$fullRecordsFile = fopen($file, "rb");
	
	// Read each line and add to FullRecordsArray
	while (!feof($fullRecordsFile)) {
		// Get record
		$fullRecord = fgets($fullRecordsFile);
		// Check if record is true
		if ($fullRecord === false) continue;
		// Remove spaces
		$fullRecord = trim($fullRecord);
		// Check length and substring of record
		if (strlen($fullRecord) == 0 || substr($fullRecord, 0, 1) == '#') continue;
		// All good, add record to array
		$TextArray[] = $fullRecord;
	}
	
	// Close the text file
	fclose($fullRecordsFile);

	// Initiate counter for loop
	$count = 0;
	// For each string value in the array, create a $FullRecord object
	foreach ($TextArray as $record) {
		$tempStringArray = explode(",",$record);
		// convert array elements to int
		$stuNum = intval($tempStringArray[0]);
		$Assign1 = intval($tempStringArray[1]);
		$Assign2 = intval($tempStringArray[2]);
		$Assign3 = intval($tempStringArray[3]);
		$ExamMrk = intval($tempStringArray[4]);
		
		// Add new object
		$FullRecordsArray[$count] = new FullRecord($stuNum,$Assign1,$Assign2,$Assign3,$ExamMrk);
		$count++;
	}
	// Return the array containing the objects
	return $FullRecordsArray;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Task 8</title>
	</head>
	
	<body>
		<?php include 'menu.inc'; ?>
		<h1>Task 8</h1>
		<p>////////////////////////////// Task8 (a) //////////////////////////<br>
		
		An array named $FullRecordsArray is created for data:<br>
		<?php 
			$FullRecordsArray = array();
		?>
		
		9 new $fullRecord objects are created and added to the array<br>
		<?php 
			// Array with FullRecords objects
			$FullRecordsArray[0] = new FullRecord(123456,70,80,50,55);
			$FullRecordsArray[1] = new FullRecord(123457,34,35,10,52); 
			$FullRecordsArray[2] = new FullRecord(123458,15,53,49,66);
			$FullRecordsArray[3] = new FullRecord(123459,56,73,74,82); 
			$FullRecordsArray[4] = new FullRecord(123460,93,83,44,41);
			$FullRecordsArray[5] = new FullRecord(123461,14,34,75,62); 
			$FullRecordsArray[6] = new FullRecord(123462,100,100,98,89);
			$FullRecordsArray[7] = new FullRecord(123463,46,67,50,36);
			$FullRecordsArray[8] = new FullRecord(123464,89,89,79,56);
		?>
		
		The $FullRecordsArray is filled with the objects strings returned when called<br>

		The $FullRecordsArray is passed to the writeToFile() function and the text file is created<br>
		<?php 	
			// Initiate function to write array to fullrecords.txt
			writeToFile($FullRecordsArray);
		?>
		
		This data is written to a text file named fullrecords.txt<br><br>

		Click on the following link to download the fullrecords.txt file<br>
		-><a href="fullrecords.txt">Download</a>
		</p>
		
		<p>////////////////////////////// Task8 (b) //////////////////////////<br>
		Read data from the fullrecords.txt file<br>
		<?php 
			// Call function to get items from text file, set into array and
			// use each item in that array to create new $FullRecords objects.
			// Then return the $FullRecordsArray
			$FullRecordsArray = readFromFile();
			
			// Get string values for each $FullRecord object in $FullRecordsArray
			foreach ($FullRecordsArray as $FullRecord) {
				echo($FullRecord . "<br>");
			}
		?>
		</p>
		<iframe src="task8.txt" height="400" scrolling="yes" width="1200px">
			<p>Your browser does not support iframes.</p>
		</iframe>
	</body>
</html>
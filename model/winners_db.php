<?php
    function getWinners() {
        // Returns an array of Winners
        global $db;
        $query = 'SELECT * FROM Winners';
        $statement = $db->prepare($query);
        $statement->execute();
        $Winners = $statement->fetchAll();
        $statement->closeCursor();
        return $Winners;
    }

    function getWinner($WinnerID) {
        // Returns a Winner if one exists
        global $db;
        $query = 'SELECT * FROM Winners WHERE WinnerID = :WinnerID';
		$statement = $db->prepare($query);
        $statement->bindValue(':WinnerID', $WinnerID);
		$statement->execute();
		$Winner = $statement->fetch();
		$statement->closeCursor();
		return $Winner;
    }

    function checkWinner($WinnerID,$ContestantID,$CurrentWinYear,$ModifyActive = false) {
        // Returns a contestant if one exists
        global $db;
        $query = 'SELECT * FROM Winners WHERE ContestantID = :contestantID';
		$statement = $db->prepare($query);
        $statement->bindValue(':contestantID', $ContestantID);
		$statement->execute();
		$Winner = $statement->fetchAll();
		$statement->closeCursor();

        // Contestant has won before, check if year is valid
        if (!empty($Winner) && $ModifyActive = false) {
            $WinnerWinYear = $Winner['WinYear'];
            if (($CurrentWinYear - $WinnerWinYear) <= 5) {
                // Still in waiting period
                //return ("Contestant has won in the past 5 years. Select runner-up" . '<a href="javascript:history.back()">Try again</a>');
            } else {
                // Year is valid. Not in waiting period
                //return Null;
            }
        } else if($ModifyActive = true && $WinnerID <> -1) {
            // Currently in modified mode.
            // Check if year isnt used by another record other than the current one.
            global $db;
            $query = 'SELECT * FROM Winners WHERE (WinYear = :WinYear AND WinnerID <> :WinnerID)';
            $statement = $db->prepare($query);
            $statement->bindValue(':WinYear', $CurrentWinYear);
            $statement->bindValue(':WinnerID', $WinnerID);
            $statement->execute();
            $WinYears = $statement->fetchAll();
            $statement->closeCursor();

            if (count($WinYears) > 0) {
                return ("Year already used. " . '<a href="javascript:history.back()">Try again</a>');
            } else {
                // All good, can take the win
                return Null;
            }

        } else {
            // All good, can take the win
            return Null;
        }
    }

    function checkWinnerYear($WinYear) {
        // Returns a contestant if year exists
        global $db;
        $query = 'SELECT * FROM Winners WHERE WinYear = :WinYear';
		$statement = $db->prepare($query);
        $statement->bindValue(':WinYear', $WinYear);
		$statement->execute();
		$Winner = $statement->fetch();
		$statement->closeCursor();
		return $Winner;
    }

    function deleteWinner($WinnerID) {
        global $db;
        $query = "DELETE FROM Winners WHERE WinnerID=:WinnerID";
		$statement = $db->prepare($query);
        $statement->bindValue(':WinnerID', $WinnerID);
		$statement->execute();
		$statement->closeCursor();
    }

    function getWinnerMaxID() {
        global $db;
        $query = "SELECT MAX(WinnerID) AS MaxWinnerID FROM Winners";
		$statement = $db->prepare($query);
		$statement->execute();
        $MaxWinnerID = $statement->fetch();
        $statement->closeCursor();
        return ($MaxWinnerID['MaxWinnerID'] + 1);
    }

    function setWinner($ContestantID,$WinningPoints,$WinYear) {
        // Add a new Winner
        global $db;

        // Get new winner id
        $MaxWinnerID = getWinnerMaxID();

        $query = "INSERT INTO Winners(ContestantID,WinnerID,WinningPoints,WinYear) VALUES (:contestantID, :WinnerID, :WinningPoints, :WinYear)";
		$statement = $db->prepare($query);
        $statement->bindValue(':contestantID', $ContestantID);
        $statement->bindValue(':WinnerID', $MaxWinnerID);
        $statement->bindValue(':WinningPoints', $WinningPoints);
        $statement->bindValue(':WinYear', $WinYear);
		$statement->execute();
		$statement->closeCursor();
        return true;
    }

    function checkUpdatedWinner($WinnerID,$WinYear) {
        // Check if year already used by another record
        global $db;
        $query = "SELECT WinnerID FROM Winners WHERE WinYear = :WinYear";
		$statement = $db->prepare($query);
        $statement->bindValue(':WinYear', $WinYear);
		$statement->execute();
        $Winners = $statement->fetchAll();
        $statement->closeCursor();

        if (count($Winners) > 0) {
            return ("Year already used. " . '<a href="javascript:history.back()">Try again</a>');
        } else {
            return true;
        }
    }
    
    function modifyWinner($WinnerID,$ContestantID,$WinningPoints,$WinYear) {
        // Add a new Winner
        global $db;
        $query = "UPDATE Winners SET ContestantID=:contestantID, WinningPoints=:WinningPoints, WinYear=:WinYear WHERE WinnerID=:WinnerID";
		$statement = $db->prepare($query);
        $statement->bindValue(':contestantID', $ContestantID);
        $statement->bindValue(':WinnerID', $WinnerID);
        $statement->bindValue(':WinningPoints', $WinningPoints);
        $statement->bindValue(':WinYear', $WinYear);
		$statement->execute();
		$statement->closeCursor();
        return true;
    }
?>
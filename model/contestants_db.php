<?php
    function getContestants() {
        // Returns an array of contestantID's
        global $db;
        $query = 'SELECT * FROM Contestant';
		$statement = $db->prepare($query);
		$statement->execute();
		$contestants = $statement->fetchAll();
		$statement->closeCursor();
		return $contestants;
    }

    function getContestant($contestantID) {
        // Returns a contestant if one exists
        global $db;
        $query = 'SELECT * FROM Contestant WHERE ContestantID = :contestantID';
		$statement = $db->prepare($query);
        $statement->bindValue(':contestantID', $contestantID);
		$statement->execute();
		$contestant = $statement->fetch();
		$statement->closeCursor();
		return $contestant;
    }

    function addContestant($contestantID,$Email,$FirstName,$LastName,$Tel) {
        // Registers a new contestant
        global $db;

        // First check if already in database
        $query = 'SELECT * FROM Contestant WHERE ContestantID = :contestantID';
		$statement = $db->prepare($query);
        $statement->bindValue(':contestantID', $contestantID);
		$statement->execute();
		$contestant = $statement->fetch();
		$statement->closeCursor();
		$result = $contestant;
        if ($result != Null) {
            return false;
        } else {
            $query = "INSERT INTO Contestant(ContestantID,FirstName,LastName,Tel,Email) VALUES (:contestantID, :FirstName, :LastName, :Tel, :Email)";
            $statement = $db->prepare($query);
            $statement->bindValue(':contestantID', $contestantID);
            $statement->bindValue(':FirstName', $FirstName);
            $statement->bindValue(':LastName', $LastName);
            $statement->bindValue(':Email', $Email);
            $statement->bindValue(':Tel', $Tel);
            $statement->execute();
            $statement->closeCursor();
            return true;
        }
    }

    function modifyContestant($contestantID,$Email,$FirstName,$LastName,$Tel) {
        // Registers a new contestant
        global $db;
        $query = "UPDATE Contestant SET FirstName=:FirstName, LastName=:LastName, Tel=:Tel, Email=:Email WHERE ContestantID=:contestantID";
		$statement = $db->prepare($query);
        $statement->bindValue(':contestantID', $contestantID);
        $statement->bindValue(':FirstName', $FirstName);
        $statement->bindValue(':LastName', $LastName);
        $statement->bindValue(':Email', $Email);
        $statement->bindValue(':Tel', $Tel);
		$statement->execute();
		$statement->closeCursor();
        return true;
    }

    function deleteContestant($contestantID) {
        // Returns an array of contestantID's
        global $db;
        $query = "DELETE FROM Contestant WHERE ContestantID=:contestantID";
		$statement = $db->prepare($query);
        $statement->bindValue(':contestantID', $contestantID);
		$statement->execute();
		$statement->closeCursor();
    }
?>
<?php
    require('../model/database.php');
    require('../model/contestants_db.php');
    require('../model/winners_db.php');

    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'list_contestants';
        }
    }
    //----------------------------Contestants section--------------------------------
    if ($action == 'list_contestants') {        // list_contestants action
        $contestants = getContestants();
        include('../view/contestant_list.php');         // contestant_list view
    } else if ($action == 'show_add_contestant_form') {    // show_add_form action
        include('../view/contestant_add.php');          // add_contestant form
    } else if ($action == 'add_contestant') {   // 
        // Get data from fields
        $ContestantID = trim($_POST["contestant_id"]);
        $FirstName = trim($_POST["first_name"]);
        $LastName = trim($_POST["last_name"]);
        $Email = trim($_POST["email"]);
        $Tel = trim($_POST["tel"]);

        // Check if all valid
        // Validate ContestantID
        if(empty($ContestantID)){
            echo("Please enter a contestant id. " . '<a href="javascript:history.back()">Try again</a>');
        } else if(!preg_match('/^[0-9]{13}+$/', $ContestantID)){
            echo("Please enter a valid contestant id of 13 numbers. " . '<a href="javascript:history.back()">Try again</a>');
        } 

        // Validate FirstName
        else if(empty($FirstName)){
            echo("Please enter a first name. " . '<a href="javascript:history.back()">Try again</a>');
        } else if(!filter_var($FirstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            echo("Please enter a valid first name. Only alphabetic characters accepted. " . '<a href="javascript:history.back()">Try again</a>');
        } 
        
        // Validate LastName
        else if(empty($LastName)){
            echo("Please enter a last name." . '<a href="javascript:history.back()">Try again</a>');
        } else if(!filter_var($LastName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            echo("Please enter a valid last name. Only alphabetic characters accepted. " . '<a href="javascript:history.back()">Try again</a>');
        }

        // Validate Tel
        else if(empty($Tel)){
            echo("Please enter a telephone number." . '<a href="javascript:history.back()">Try again</a>');
        } else if(!preg_match('/^[0-9]{10}+$/', $Tel)){
            echo("Please enter a valid telephone number. Only 10 numeric characters accepted. " . '<a href="javascript:history.back()">Try again</a>');
        }

        // Validate Email
        else if(empty($Email)){
            echo("Please enter a email." . '<a href="javascript:history.back()">Try again</a>');
        } else if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            echo("Please enter a valid email." . '<a href="javascript:history.back()">Try again</a>');
        } else {
            $result = addContestant($ContestantID,$Email,$FirstName,$LastName,$Tel);
            if ($result == true) {
                header("Location: .?contestant_id=$ContestantID");
            } else {
                echo("Contestant already exists." . '<a href="javascript:history.back()">Try again</a>');
            }
        }
    }  else if($action == 'delete_contestant') {
        $ContestantID = filter_input(INPUT_POST,'contestant_id');
        if ($ContestantID == NULL) {
            echo("Error. Could not delete contestant.");
        } else {
            deleteContestant($ContestantID);
            header("Location: .?contestant_id=$ContestantID");
        }
    }  else if($action == 'modify_contestant_form') {
        // Get hidden input value
        $ContestantID = $_POST["contestant_id"];

        $FirstName = trim($_POST["first_name"]);
        $LastName = trim($_POST["last_name"]);
        $Email = trim($_POST["email"]);
        $Tel = trim($_POST["tel"]);

        // Validate FirstName
        if(empty($FirstName)){
            echo("Please enter a first name." . '<a href="javascript:history.back()">Try again</a>');
        } else if(!filter_var($FirstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            echo("Please enter a valid first name. Only alphabetic characters accepted. " . '<a href="javascript:history.back()">Try again</a>');
        } 
        
        // Validate LastName
        else if(empty($LastName)){
            echo("Please enter a last name." . '<a href="javascript:history.back()">Try again</a>');
        } else if(!filter_var($LastName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            echo("Please enter a valid last name. Only alphabetic characters accepted. " . '<a href="javascript:history.back()">Try again</a>');
        }

        // Validate Tel
        else if(empty($Tel)){
            echo("Please enter a telephone number." . '<a href="javascript:history.back()">Try again</a>');
        } else if(!preg_match('/^[0-9]{10}+$/', $Tel)){
            echo("Please enter a valid telephone number. Only 10 numeric characters accepted. " . '<a href="javascript:history.back()">Try again</a>');
        }

        // Validate Email
        else if(empty($Email)){
            echo("Please enter a email." . '<a href="javascript:history.back()">Try again</a>');
        } else if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            echo("Please enter a valid email." . '<a href="javascript:history.back()">Try again</a>');
        }

        else {
            $result = modifyContestant($ContestantID,$Email,$FirstName,$LastName,$Tel);
            if ($result == true) {
                header("Location: .?contestant_id=$ContestantID");
            } else {
                echo("An error occurred while writing contestant updated data to the database." . '<a href="javascript:history.back()">Try again</a>');
            }
        }
    }  else if($action == 'modify_contestant') {
        $ContestantID = filter_input(INPUT_POST,'contestant_id');
        include('../view/contestant_modify.php');
    }
    //----------------------------Winners section--------------------------------
    else if ($action == 'list_winners') {        // list_winners action
        $Winners = getWinners();
        include('../view/winners_list.php');         // winners_list view
    } else if ($action == 'show_add_winner_form') {    // show_add_winner_form action
        include('../view/winner_add.php');          // winner_add form
    } else if ($action == 'add_winner') {   // 
        // Get data from fields
        $ContestantID = trim($_POST["contestant_id"]);
        $WinYear = trim($_POST["win_year"]);
        $WinningPoints = trim($_POST["winning_points"]);

        // Check if all valid
        // Validate ContestantID
        if(empty($ContestantID)){
            echo("Please enter a contestant id. " . '<a href="javascript:history.back()">Try again</a>');
        } else if(!preg_match('/^[0-9]{13}+$/', $ContestantID)){
            echo("Please enter a valid contestant id of 13 numbers. " . '<a href="javascript:history.back()">Try again</a>');
        }

        // Validate WinningPoints
        else if(empty($WinningPoints)){
            echo("Please enter the winning points." . '<a href="javascript:history.back()">Try again</a>');
        } else if(!preg_match('/^[0-9]+$/', $WinningPoints)){
            echo("Please enter valid winning points. Only numeric characters accepted. " . '<a href="javascript:history.back()">Try again</a>');
        }

        // Validate WinYear
        else if(empty($WinYear)){
            echo("Please enter the win year." . '<a href="javascript:history.back()">Try again</a>');
        } else if(!preg_match('/^[0-9]{4}+$/', $WinYear)){
            echo("Please enter a valid win year. Only 4 numeric characters accepted. " . '<a href="javascript:history.back()">Try again</a>');
        }

        // Validate year not already used
        else if(!empty(checkWinnerYear($WinYear))){
            echo("This year has an assigned winner. Choose a new year. " . '<a href="javascript:history.back()">Try again</a>');
        }

        // Validate Winner not in waiting period
        // Pass -1 as $WinnerID to checkWinner() to indicate no new winner
        else if(!empty(checkWinner(-1,$ContestantID,$WinYear))){
            echo("Winner has won in last 5 years, choose runner-up. " . '<a href="javascript:history.back()">Try again</a>');
        }

        else {
            $result = setWinner($ContestantID,$WinningPoints,$WinYear);
            if ($result == true) {
                header("Location: .?action=list_winners");
            } else {
                echo("Error adding winner." . '<a href="javascript:history.back()">Try again</a>');
            }
        }
    }  else if($action == 'delete_winner') {
        $WinnerID = filter_input(INPUT_POST,'winner_id');
        if ($WinnerID == NULL) {
            echo("Error. Could not delete winner.");
        } else {
            deleteWinner($WinnerID);
            header("Location: .?action=list_winners");
        }
    } else if ($action == 'modify_winner_form') {   // 
        // Get data from fields
        $WinnerID = trim($_POST["winner_id"]);
        $ContestantID = trim($_POST["contestant_id"]);
        $WinYear = trim($_POST["win_year"]);
        $WinningPoints = trim($_POST["winning_points"]);

        // Check if all valid
        // Validate ContestantID
        if(empty($ContestantID)){
            echo("Please enter a contestant id. " . '<a href="javascript:history.back()">Try again</a>');
        } else if(!preg_match('/^[0-9]{13}+$/', $ContestantID)){
            echo("Please enter a valid contestant id of 13 numbers. " . '<a href="javascript:history.back()">Try again</a>');
        }

        // Validate WinYear
        else if(empty($WinYear)){
            echo("Please enter the win year." . '<a href="javascript:history.back()">Try again</a>');
        } else if(!preg_match('/^[0-9]{4}+$/', $WinYear)){
            echo("Please enter a valid win year. Only 4 numeric characters accepted. " . '<a href="javascript:history.back()">Try again</a>');
        }

        // Validate WinningPoints
        else if(empty($WinningPoints)){
            echo("Please enter the winning points." . '<a href="javascript:history.back()">Try again</a>');
        } else if(!preg_match('/^[0-9]+$/', $WinningPoints)){
            echo("Please enter valid winning points. Only numeric characters accepted. " . '<a href="javascript:history.back()">Try again</a>');
        }

        // Check if winner details clash
        else if(checkUpdatedWinner($WinnerID,$WinYear) <> true) {
            // Winner exists, check if winner has won in the past 5 years
            echo("Winner has won in the past 5 years. Still in waiting period. Select a new winner. " . '<a href="javascript:history.back()">Try again</a>');
        }

        // Validate Winner not in waiting period
        else if(checkWinner($WinnerID,$ContestantID,$WinYear,true) != Null){
            echo(checkWinner($WinnerID,$ContestantID,$WinYear,true));
        }
        
        else {

            $result = modifyWinner($WinnerID,$ContestantID,$WinningPoints,$WinYear);
            if ($result == true) {
                header("Location: .?action=list_winners");
            } else {
                echo("An error occurred while writing winner updated data to the database." . '<a href="javascript:history.back()">Try again</a>');
            }
        }
    }  else if($action == 'modify_winner') {
        $WinnerID = filter_input(INPUT_POST,'winner_id');
        include('../view/winner_modify.php');
    }
?>
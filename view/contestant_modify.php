<?php include('../view/header.php'); 
    $Contestant = getContestant($ContestantID);
    $FirstName = $Contestant['FirstName'];
    $LastName = $Contestant['LastName'];
    $Email = $Contestant['Email'];
    $Tel = $Contestant['Tel'];
?>
<main>
    <h1>Modify Contestant</h1>
    <form action="../controller/index.php" method="post">
        <input type="hidden" name="action" value="modify_contestant_form" />
        <input type="hidden" name="contestant_id" value="<?php echo($ContestantID); ?>" />
        <br>

        <label>ID Number:</label>
        <label><?php echo($ContestantID); ?></label>
        <br>

        <label>First name:</label>
        <input type="text" name="first_name" value="<?php echo($FirstName); ?>" />
        <br>

        <label>Last name:</label>
        <input type="text" name="last_name" value="<?php echo($LastName); ?>" />
        <br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo($Email); ?>" />
        <br>

        <label>Tel:</label>
        <input type="tel" name="tel" value="<?php echo($Tel); ?>" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" name="modify_contestant_form" value="Save" />
        <br>
    </form>
    <p>
        <a href="../controller/index.php?action=list_contestants">View Contestants List</a>
    </p>
</main>
<?php include('../view/footer.php'); ?>
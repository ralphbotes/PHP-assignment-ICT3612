<?php include('../view/header.php'); 
    $Winner = getWinner($WinnerID);
    $ContestantID = $Winner['ContestantID'];
    $WinYear = $Winner['WinYear'];
    $WinningPoints = $Winner['WinningPoints'];
?>
<main>
    <h1>Modify Winner</h1>
    <form action="../controller/index.php" method="post">
        <input type="hidden" name="action" value="modify_winner_form" />
        <input type="hidden" name="winner_id" value="<?php echo($WinnerID); ?>" />
        <br>

        <label>ID Number:</label>
        <label><?php echo($WinnerID); ?></label>
        <br>

        <label>Contestant ID number:</label>
        <input type="number" name="contestant_id" value="<?php echo($ContestantID); ?>" />
        <br>

        <label>Win Year:</label>
        <input type="number" name="win_year" value="<?php echo($WinYear); ?>" />
        <br>

        <label>Winning points:</label>
        <input type="number" name="winning_points" value="<?php echo($WinningPoints); ?>" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" name="modify_winner_form" value="Save" />
        <br>
    </form>
    <p>
        <a href="../controller/index.php?action=list_winners">View Winners List</a>
    </p>
</main>
<?php include('../view/footer.php'); ?>
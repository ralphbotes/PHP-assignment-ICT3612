<?php include('../view/header.php'); ?>
<main>
    <h1>Add Winner</h1>
    <form action="../controller/index.php" method="post">
        <input type="hidden" name="action" value="add_winner" />
        <br>

        <label>Contestant ID Number:</label>
        <input type="number" name="contestant_id" />
        <br>

        <label>Win Year:</label>
        <input type="text" name="win_year" />
        <br>

        <label>Win points:</label>
        <input type="number" name="winning_points" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" name="Add Winner" />
        <br>
    </form>
    <p>
        <a href="../controller/index.php?action=list_winners">View Winners List</a>
    </p>
</main>
<?php include('../view/footer.php'); ?>
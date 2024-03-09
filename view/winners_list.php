<?php include("../view/header.php"); ?>
<main>
    <p>
        <a class="selection" href="?action=show_add_contestant_form">+ Add Contestant</a>
        <a class="selection" href="?action=show_add_winner_form">+ Add Winner</a>
        <a class="selection" href="?action=list_contestants">View Contestants</a>
        <a class="selection" href="?action=list_winners">View Winners</a><br><br>
    </p>
    <!-- Display the contestants -->
    <table>
        <tr>
            <th>Winner ID</th>
            <th>Contestant ID</th>
            <th>Win Year</th>
            <th>Points</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($Winners as $Winner) : ?>
        <tr>
            <td><?php echo($Winner['WinnerID']); ?></td>
            <td><?php echo($Winner['ContestantID']); ?></td>
            <td><?php echo($Winner['WinYear']); ?></td>
            <td><?php echo($Winner['WinningPoints']); ?></td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_winner" />
                    <input type="hidden" name="winner_id" value="<?php echo($Winner['WinnerID']); ?>" />
                    <input type="submit" value="Delete" />
                </form>
            </td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="modify_winner" />
                    <input type="hidden" name="winner_id" value="<?php echo($Winner['WinnerID']); ?>" />
                    <input type="submit" value="Modify" />
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table><br>
</main>
<?php include("../view/footer.php"); ?>
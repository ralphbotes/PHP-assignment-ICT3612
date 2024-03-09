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
            <th>Contestant ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Tel</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($contestants as $contestant) : ?>
        <tr>
            <td><?php echo($contestant['ContestantID']); ?></td>
            <td><?php echo($contestant['FirstName']); ?></td>
            <td><?php echo($contestant['LastName']); ?></td>
            <td><?php echo($contestant['Email']); ?></td>
            <td><?php echo($contestant['Tel']); ?></td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_contestant" />
                    <input type="hidden" name="contestant_id" value="<?php echo($contestant['ContestantID']); ?>" />
                    <input type="submit" value="Delete" />
                </form>
            </td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="modify_contestant" />
                    <input type="hidden" name="contestant_id" value="<?php echo($contestant['ContestantID']); ?>" />
                    <input type="submit" value="Modify" />
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table><br>
</main>
<?php include("../view/footer.php"); ?>
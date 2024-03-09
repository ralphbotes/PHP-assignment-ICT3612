<?php include('../view/header.php'); ?>
<main>
    <h1>Add Contestant</h1>
    <form action="../controller/index.php" method="post">
        <input type="hidden" name="action" value="add_contestant" />
        <br>

        <label>ID Number:</label>
        <input type="number" name="contestant_id" />
        <br>

        <label>First name:</label>
        <input type="text" name="first_name" />
        <br>

        <label>Last name:</label>
        <input type="text" name="last_name" />
        <br>

        <label>Email:</label>
        <input type="email" name="email" />
        <br>

        <label>Tel:</label>
        <input type="tel" name="tel" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" name="Add Contestant" />
        <br>
    </form>
    <p>
        <a href="../controller/index.php?action=list_contestants">View Contestants List</a>
    </p>
</main>
<?php include('../view/footer.php'); ?>
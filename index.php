<?php
    if(isset($_POST['submit'])) {
        echo 'form submitted';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP Validation</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <div class="new-user">
        <h2>Create a new user</h2>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
            <label for="username">Username</label>
            <input type="text" name="username">

            <label for="email">Email</label>
            <input type="text" name="email">

            <input type="submit" value="Add a new user" name="submit" class="btn">
        </form>
    </div>
</body>
</html>
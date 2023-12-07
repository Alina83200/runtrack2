<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
    <label for="username">username:</label>
    <input type="text" name="username" id="username" required><br>

    <label for="password">password:</label>
    <input type="password" name="password" id="password" required><br>

    <input type="submit" value="Se connecter">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username == 'John' && $password == 'Rambo') {
        echo 'C’est pas ma guerre';
    } else {
        echo 'Votre pire cauchemar';
    }
}
?>
</body>
</html>
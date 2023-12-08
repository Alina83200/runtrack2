<?php
/*
Créez un formulaire de connexion qui contient un input de type de text nommé
“prenom” et un bouton submit nommé “connexion”. Lorsque l’on valide le formulaire, le
prénom est ajouté dans un cookie. Si un utilisateur a déjà entré son prénom, n'affichez
plus le formulaire de connexion. A la place, écrivez “Bonjour prenom !” et ajouter un
bouton “Déconnexion” nommé “deco”. Lorsque l’utilisateur se déconnecte, il faut à
nouveau afficher le formulaire de connexion.
 */

//Проверяем, было ли отправлено имя через форму 
if (isset($_POST["prenom"])) {
    $prenom = $_POST["prenom"];
    //Сохраняем имя в куки  
    setcookie('prenom', $prenom, time() + 3600);
    header("Location: " . $_SERVER['PHP_SELF']); 
} else {
    setcookie('prenom', '', time() - 3600); //Если пользователь решил выйти, удаляем куку
}
//Проверяем, есть ли уже сохраненное имя в куках
//Если есть, показываем приветствие и кнопку "Déconnexion'
if (isset($_COOKIE['prenom'])) {
    echo "Bonjour " . $_COOKIE['prenom'] . " ! ";
    echo "<form action='' method='POST'>
    <input type='hidden' name='logout' value='true'>
    <input type='submit' name='deco' value='Déconnexion'>
    </form>";
}
else {
    //Иначе, показываем форму входа
    echo "<form action='' method='POST'>
    <label for='prenom'>Prénom:</label>
    <input type='text' name='prenom' id='prenom' required>
    <input type='submit' name='Connexion' value='Connexion'>
    </form>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
</body>

</html>
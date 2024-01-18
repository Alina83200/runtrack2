<?php

include('User-pdo.php');

$user = new Userpdo();
//тест метода register (регістрація)
$result = $user->register("Alina83", "alina*", "efimskaja@gmail.com", "Alina", "YEFIMOVA");

echo "<br/>";
echo "Update debug <br/>";
var_dump($result);
echo "<br/>";

//тест з'єднання
$connected = $user->connect("Alina83", "alina*");
if ($connected) {
    echo "Utilisateur connecté\n";
} else {
    echo "Echec de la connexion\n";
}
echo "<br/>";
echo "Login: " . $user->getLogin() . "\n";
echo "<br/>";
echo "Email: " . $user->getEmail() . "\n";
echo "<br/>";

//тест обновлення інформації
$user->update("Tom14", "newpassword", "thomas_updated@gmail.com", "Thomas Updated", "DUPONT Updated");
$allInfo = $user->getAllInfos();
var_dump($allInfo);

//тест poз'єднання
$user->disconnect();
if ($user->isConnected()) {
    echo "Utilisateur toujours connecté\n";
} else {
    echo "Utilisateur déconnecté\n";
}

//тест видалення інформації
$user->delete();
if ($user->isConnected()) {
    echo "Utilisateur toujours connecté\n";
} else {
    echo "Utilisateur supprimé et déconnecté\n";
}

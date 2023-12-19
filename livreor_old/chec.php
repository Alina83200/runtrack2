<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
$login = filter_var(trim($_POST["login"]),
FILTER_SANITIZE_STRING);
$password =filter_var(trim($_POST["password"]),
FILTER_SANITIZE_STRING);

if(mb_strlen($login) < 4 || mb_strlen($login)>90)  { echo
    "Valle de login invalide";
    exit();}
    elseif (mb_strlen($password) < 2 || mb_strlen($password)>8)  {echo
    "Valle de password invalide (a 2 du 8 simbol)"; 
    exit();}
  
   $mysql = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

   $result = $mysql->query("SELECT * FROM 'utilisateur' WHERE 'ligin'='$login'AND 'password'='$password'");
   $user =$result->fetch_assoc();
   if(count($user) == 0){
    echo "Utilisateur non troouvé";
    exit();
  }
    //print_r($user);
    //exit();
  setcookie('user', $user['login'], time() + 3600,'/');
  $mysql->close();

  header('Location:/');
 }
  ?>      
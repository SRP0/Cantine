<?php
session_start();
if (isset($_SESSION['id'])){
    header("Location: main.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
<form method="post" action="Traitement_Inscription_Eleve.php">
<select>
    <?php
    $bdd = new PDO("mysql:host=localhost;dbname=Cantine","root","");
    $req = $bdd->prepare('SELECT * FROM eleve WHERE classe = :classe');
    $req->execute(['email' => $_POST['login'], 'mdp' => $_POST['mdp']]);
    $result = $req->fetch();
    ?>
</select>
  <label>Nom : <input type="text" name="nom"></label>
    <br>
  <label>Prenom : <input type="text" name="prenom"></label>
    <br>
  <label>Email : <input type="email" name="email"></label>
    <br>
  <label>Mot de passe : <input type="password" name="mdp"></label>
    <br>
  <input type="submit" value="Valider">
</form>
<a href="main.php">Retour</a>
</body>
</html>
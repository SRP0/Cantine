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
<form method="post" action="Traitement_Inscription_Utilisateur.php">
<select>
    <?php
    $bdd = new PDO("mysql:host=localhost;dbname=cantine","root","");
    $req = $bdd->prepare('SELECT * FROM utilisateur');
    $req->execute(['mail' => $_POST['login'], 'motdepasse' => $_POST['motdepasse']]);
    $result = $req->fetch();
    ?>
</select>
  <label>Nom : <input type="text" name="nom"></label>
    <br>
  <label>Prenom : <input type="text" name="prenom"></label>
    <br>
  <label>Email : <input type="mail" name="mail"></label>
    <br>
  <label>Mot de passe : <input type="password" name="motdepasse"></label>
    <br>
  <input type="submit" value="Valider">
</form>
<a href="main.php">Retour</a>
</body>
</html>
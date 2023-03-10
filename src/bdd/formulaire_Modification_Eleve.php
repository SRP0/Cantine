<?php
session_start();
if (isset($_SESSION['id'])){
    header("Location: formulaire_Connexion_Eleve");
}
$bdd = new PDO("mysql:host=localhost;dbname=Cantine","root","");
$req = $bdd->prepare("SELECT * FROM eleve WHERE classe = :classe");
$req->execute(['id'=>$_GET["id_eleve"]]);
$res = $req->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modification</title>
</head>
<body>
<form method="post" action="Traitement_Modification_Eleve.php">
  <label>Nom : <input type="text" name="nom" value="<?=$res['nom']?>"></label>
    <br>
  <label>Prenom : <input type="text" name="prenom" value="<?=$res['prenom']?>"></label>
    <br>
  <label>Email : <input type="email" name="email" value="<?=$res['email']?>"></label>
    <br>
  <input type="hidden" name="id" value="<?=$res["id_eleve"]?>">
    <br>
    <input type="submit" value="Sauvegarder">
</form>
<a href="main.php">Retour</a>
</body>
</html>
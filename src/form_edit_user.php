<?php
session_start();
if (isset($_SESSION['id'])){
    header("Location: formulaire_Connexion_Utilisateur");
}
$bdd = new PDO("mysql:host=localhost;dbname=cantine","root","");
$req = $bdd->prepare("SELECT * FROM utilisateur");
$req->execute(['id'=>$_GET["id_utilisateur"]]);
$res = $req->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification</title>
</head>
<body>
<form method="post" action="Traitement_Modification_Utilisateur.php">
  <label>Nom : <input type="text" name="nom" value="<?=$res['nom']?>"></label>
    <br>
  <label>Prenom : <input type="text" name="prenom" value="<?=$res['prenom']?>"></label>
    <br>
  <label>Email : <input type="mail" name="mail" value="<?=$res['mail']?>"></label>
    <br>
  <input type="hidden" name="id" value="<?=$res["id_utilisateur"]?>">
    <br>
    <input type="submit" value="Sauvegarder">
</form>
<a href="main.php">Retour</a>
</body>
</html>

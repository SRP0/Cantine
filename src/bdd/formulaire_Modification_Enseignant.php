<?php
session_start();
if (isset($_SESSION['id'])){
    header("Location: formulaire_Connexion_Enseignant");
}
$bdd = new PDO("mysql:host=localhost;dbname=Cantine","root","");
$req = $bdd->prepare("SELECT * FROM enseignant WHERE id_enseignant = :id");
$req->execute(['id'=>$_GET['id_enseignant']]);
$res = $req->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enseignant</title>
</head>
<body>
<form method="post" action="Traitement_Modification_Enseignant.php">
  <label>Nom : <input type="text" name="nom" value="<?=$res['nom']?>"></label>
  <label>Prenom : <input type="text" name="prenom" value="<?=$res['prenom']?>"></label>
  <label>Email : <input type="email" name="email" value="<?=$res['email']?>"></label>
  <input type="hidden" name="id" value="<?=$res["id_enseignant"]?>">
  <input type="submit" value="Sauvegarder">
</form>
<a href="main.php">Retour</a>
</body>
</html>
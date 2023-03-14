<?php
session_start();
if (isset($_SESSION['id'])){
    header("Location: formulaire_Connexion_Utilisateur");
}
$bdd = new PDO("mysql:host=localhost;dbname=cantine","root","");
$req = $bdd->prepare("SELECT * FROM utilisateur WHERE id_utilisateur = :id");
$req->execute(['id'=>$_GET['id_utilisateur']]);
$res = $req->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suppression</title>
</head>
<body>
<form method="post" action="Traitement_Suppression_Utilisateur.php">
    <label>Etes vous sur de vouloir supprimer cet utilisateur ? (<?=$res["id_utilisateur"]?>) <?=$res["prenom"]?></label>
    <br>
    <input type="hidden" name="id" value="<?=$res["id_utilisateur"]?>">
    <br>
    <input type="submit" value="Oui">
    <br>
    <input type="submit" value="Non" formaction="main.php">
    <br>
</form>
<a href="main.php"></a>
</body>
</html>
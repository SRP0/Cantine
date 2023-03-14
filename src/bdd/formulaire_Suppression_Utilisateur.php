<?php
session_start();
if (isset($_SESSION['id'])){
    header("Location: formulaire_Connexion_Eleve");
}
$bdd = new PDO("mysql:host=localhost;dbname=Cantine","root","");
$req = $bdd->prepare("SELECT * FROM eleve WHERE id_eleve = :id");
$req->execute(['id'=>$_GET['id_eleve']]);
$res = $req->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suppression</title>
</head>
<body>
<form method="post" action="Traitement_Suppression_Eleve.php">
    <label>etes vous sur de vouloir supprimer cette élève (<?=$res["id_eleve"]?>) <?=$res["prenom"]?></label>
    <br>
    <input type="hidden" name="id" value="<?=$res["id_eleve"]?>">
    <br>
    <input type="submit" value="Oui">
    <br>
    <input type="submit" value="Non" formaction="main.php">
    <br>
</form>
<a href="main.php"></a>
</body>
</html>
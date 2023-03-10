<?php
$bdd = new PDO("mysql:host=localhost;dbame=Cantine","root","");
session_start();
if (isset($_SESSION['id'])){
    header("Location: ");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>
    Bonjour
</h1>

<a href="formulaire_Inscription_Eleve.php">Ajouter</a>
<form method="get">
<select name="id_eleve">
    <?php
    $req = $bdd->prepare("SELECT * FROM eleve WHERE id_eleve <> :id");
    $req->execute(['id' => $_SESSION['id']]);
    $res = $req->fetchAll();
    foreach ($res as $eleve){

        ?>
    <option value="<?=$eleve["id_eleve"]?>"><?=$eleve["nom"]?> <?=$eleve['prenom']?></option>
    <?php
    }
    ?>
</select>
    <input type="submit" formaction="formulaire_Modification_Eleve.php" value="Modifier">
    <input type="submit" formaction="formulaire_Suppression_Eleve.php" value="Supprimer">
</form>
<table>
    <tr>
        <th>id</th>
        <th>nom</th>
        <th>prenom</th>
        <th>email</th>
    </tr>
    <?php
    foreach ($res as $eleve){
        ?>
    <tr>
        <td><?=$eleve['id_eleve'] ?></td>
        <td><?=$eleve['nom'] ?></td>
        <td><?=$eleve['prenom'] ?></td>
        <td><?=$eleve['email'] ?></td>
        <td>
            <form method="get">
                <input type="hidden" name="id_eleve" value="<?=$eleve["id_eleve"] ?>">
                <input type="submit" formaction="formulaire_Modification_Eleve.php" value="Modifier">
                <input type="submit" formaction="formulaire_Suppression_Eleve.php" value="Supprimer">
            </form>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<a href="deconnecter.php">Deconnecter</a>
</body>
</html>

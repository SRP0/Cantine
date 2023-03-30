<?php
$bdd = new PDO("mysql:host=localhost;dbname=cantine","root","");
session_start();
if (isset($_SESSION['id'])){
    header("Location: ");
    exit();
}
require_once "Utilisateur.php";
require_once "Repas.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Main</title>
</head>
<body>
<h1>
    Bonjour
</h1>

<a href="traitements">Ajouter</a>
<form method="get">
<select name="id_utilisateur">
    <?php
    $req = $bdd->prepare("SELECT * FROM utilisateur WHERE id_utilisateur <> :id");
    $req->execute(['id' => $_SESSION['id']]);
    $res = $req->fetchAll();
    foreach ($res as $utilisateur){

        ?>
    <option value="<?=$utilisateur["id_utilisateur"]?>"><?=$utilisateur["nom"]?> <?=$utilisateur['prenom']?></option>
    <?php
    }
    ?>
</select>
    <input type="submit" formaction="form_edit_user.php" value="Modifier">
    <input type="submit" formaction="form_delete_user.php" value="Supprimer">
</form>
<table>
    <tr>
        <th>id</th>
        <th>nom</th>
        <th>prenom</th>
        <th>email</th>
    </tr>
    <?php
    foreach ($res as $utilisateur){
        ?>
    <tr>
        <td><?=$utilisateur['id_utilisateur'] ?></td>
        <td><?=$utilisateur['nom'] ?></td>
        <td><?=$utilisateur['prenom'] ?></td>
        <td><?=$utilisateur['mail'] ?></td>
        <td>
            <form method="get">
                <input type="hidden" name="id_utilisateur" value="<?=$utilisateur["id_utilisateur"] ?>">
                <input type="submit" formaction="form_edit_user.php" value="Modifier">
                <input type="submit" formaction="form_delete_user.php" value="Supprimer">
            </form>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<a href="deco_user.php">Deconnecter</a>
</body>
</html>

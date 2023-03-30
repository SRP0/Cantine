<?php
session_start();
if (isset($_SESSION['id'])){
    header('Location: main.php');
    exit();
}
$bdd = new PDO("mysql:host=localhost;dbname=cantine","root","");
if (isset($_POST['id'])){
    $req = $bdd->prepare("DELETE FROM utilisateur WHERE id_utilisateur=:id");
    $req->execute(
        [
            "id" => $_POST["id"]
        ]);
    header("Location: main.php");
    exit();
}else{
    header("Location: main.php?id_utilisateur".$_POST["id"]);
    exit();
}
?>
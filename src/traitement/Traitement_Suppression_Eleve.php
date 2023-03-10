<?php
session_start();
if (isset($_SESSION['id'])){
    header('Location: main.php');
}
$bdd = new PDO("mysql:host=localhost;dbname=Cantine","root","");
if (isset($_POST['id'])){
    $req = $bdd->prepare("DELETE FROM eleve WHERE id_eleve=:id");
    $req->execute(
        [
            "id" => $_POST["id"]
        ]);
    header("Location: main.php");
}else{
    header("Location: supprimer.php?id_eleve=".$_POST["id"]);
}
?>
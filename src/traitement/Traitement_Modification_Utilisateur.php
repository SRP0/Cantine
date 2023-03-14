<?php
session_start();
if (!isset($_SESSION['id'])){
    header('Location: main.php');
}
$bdd = new PDO("mysql:host=localhost;dbname=cantine","root","");
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['motdepasse'])
){
    $req = $bdd->prepare("UPDATE utilisateur SET nom=:nom, prenom=:prenom, mail=:mail, motdepasse=:motdepasse WHERE id_utilisateur=:id");
    $req->execute(
        [
            "mail"=>$_POST['mail'],
            "nom"=>$_POST['nom'],
            "prenom"=>$_POST['prenom'],
            "mdp"=>$_POST['mdp'],
            "id"=>$_POST['id'],
        ]);
    header("Location: main.php");
}else{
    header("Location: modifier.php?id_utilisateur=".$_POST['id']);
}
?>
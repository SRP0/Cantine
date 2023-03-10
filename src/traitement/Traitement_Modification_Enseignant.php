<?php
session_start();
if (!isset($_SESSION['id'])){
    header('Location: main.php');
}
$bdd = new PDO("mysql:host=localhost;dbname=Cantine","root","");
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp'])
){
    $req = $bdd->prepare("UPDATE enseignant SET nom=:nom, prenom=:prenom, email=:email, mdp=:mdp WHERE id_enseignant=:id");
    $req->execute(
        [
            "email"=>$_POST['email'],
            "nom"=>$_POST['nom'],
            "prenom"=>$_POST['prenom'],
            "mdp"=>$_POST['mdp'],
            "id"=>$_POST['id'],
        ]);
    header("Location: main.php");
}else{
    header("Location: modifier.php?id_enseignant=".$_POST['id']);
}
?>
<?php
if (isset($_SESSION['id'])){
    header("Location: ../../inscription.html");
}
try
{
    $bdd = new PDO("mysql:host=localhost;dbname=cantine","root","");
} catch (Exception $e){
    die('Erreur : '. $e->getMessage());
}
$req = $bdd->prepare('INSERT INTO utilisateur (nom, prenom, email, mdp)
  VALUES(:nom, :prenom, :email, :mdp)');

$req->execute(array(
    "nom"=>$_POST['nom'],
    "prenom"=>$_POST['prenom'],
    "email"=> $_POST['email'],
    "mdp"=> $_POST['mdp'],
));

echo "L'utilisateur a bien été ajouté !";



// Connexion à la base de données
//$host = "localhost";
//$utilisateur = "utilisateur";
//$motdepasse = "motdepasse";
//$serveur = "cantine_db";


// Réception des données du formulaire
//$nom = $_POST["nom"];
//$prenom = $_POST["prenom"];
//$classe = $_POST["classe"];
//$email = $_POST["email"];
//$motdepasse = motdepasse_hash($_POST["motdepasse"], MOTDEPASSE_DEFAULT);

?>
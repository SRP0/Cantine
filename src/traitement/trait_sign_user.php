<?php
if (isset($_SESSION['id'])){
    header("Location: inscription.html");
}
try
{
    $bdd = new PDO("mysql:host=localhost;dbname=cantine","root","");
} catch (Exception $e){
    die('Erreur : '. $e->getMessage());
}
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$classe = $_POST["classe"];
$email = $_POST["mail"];
$motdepasse = motdepasse_hash($_POST["motdepasse"], MOTDEPASSE_DEFAULT);

$req = $bdd->prepare('INSERT INTO utilisateur (nom, prenom, mail, motdepasse)
  VALUES(:nom, :prenom, :mail, :motdepasse)');

$req->execute(array(
    'nom' => $nom,
    'prenom' => $prenom,
    'mail' => $email,
    'mdp' => $motdepasse,
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
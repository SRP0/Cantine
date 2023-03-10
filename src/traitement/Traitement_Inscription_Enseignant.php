<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=Cantine","root","");
} catch (Exception $e){
    die('Erreur : '. $e->getMessage());
}
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$classe = $_POST["classe"];
$email = $_POST["email"];
$motdepasse = motdepasse_hash($_POST["motdepasse"], MOTDEPASSE_DEFAULT);

$req = $bdd->prepare('INSERT INTO enseignant (nom, prenom, classe, email, motdepasse)
  VALUES(:nom, :prenom, :classe, :email, :motdepasse)');

$req->execute(array(
    'nom' => $nom,
    'prenom' => $prenom,
    'classe' => $classe,
    'email' => $email,
    'mdp' => $motdepasse,
));

echo "L'enseignant a bien ete ajouter !";
?>
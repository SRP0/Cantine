<?php
if (isset($_POST['login']) && isset($_POST['mdp'])) {
    $bdd = new PDO("mysql:host=localhost;dbname=Cantine","root","");
    $req = $bdd->prepare('SELECT * FROM enseignant WHERE email = :email AND mdp = :mdp');
    $req->execute(['email' => $_POST['login'], 'mdp' => $_POST['mdp']]);
    $result = $req->fetch(MYSQLI_ASSOC);

    if (!empty($result)){
        session_start();
        $_SESSION['user'] = $result['id_enseignant'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['nom'] = $result['nom'];
        $_SESSION['prenom'] = $result['prenom'];
        header("Location: traitement.php");
    }else{
        header("Location: formulaire_Connexion_Enseignant.html");
    }
    function add_enseignants($conn, $nom, $prenom, $class_id)
    {

        $sql = "INSERT INTO enseignants (nom, prenom, class_id) VALUES ('$nom', '$prenom','$class_id')";
        return mysqli_query($conn, $sql);
    }

    function get_enseignant_by_id($conn, $id)
    {
        $sql = "SELECT * FROM enseignants WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    function update_enseignant($conn, $id, $nom, $prenom, $class_id)
    {
        $sql = "UPDATE enseignants SET nom='$nom', prenom='$prenom', class_id='$class_id' WHERE id=$id";
        return mysqli_query($conn, $sql);
    }

    function delete_enseignant($conn, $id)
    {
        $sql = "DELETE FROM enseignants WHERE id=$id";
        return mysqli_query($conn, $sql);

    }
}
?>
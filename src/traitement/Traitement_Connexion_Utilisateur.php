<?php
if (isset($_POST['login']) && isset($_POST['mdp'])) {
    $bdd = new PDO("mysql:host=localhost;dbname=Cantine","root","");
    $req = $bdd->prepare('SELECT * FROM utilisateur WHERE mail = :mail AND mdp = :motdepasse');
    $req->execute(['mail' => $_POST['login'], 'motdepasse' => $_POST['motdepasse']]);
    $result = $req->fetch();

    if (!empty($result['id_utilisateur'])){
        session_start();
        $_SESSION['user'] = $result['id_utilisateur'];
        $_SESSION['mail'] = $result['mail'];
        $_SESSION['nom'] = $result['nom'];
        $_SESSION['prenom'] = $result['prenom'];
        header("Location: main.php");
    }else{
        header("Location: formulaire_Connexion_Utilisateur.html");
    }
}else{
    header("Location: Formulaire_Connexion_Utilisateur.html");
}
// Connexion à la base de données
//$host = "localhost";
//$utilisateur = "database_utilisateur";
//$motdepasse = "database_motdepasse";
//$serveur = "cantine_db";

// Fonction pour ajouter un élève
/**function add_eleve($conn, $nom, $prenom, $class_id)
{
    $sql = "INSERT INTO eleves (nom, prenom, class_id) VALUES ('$nom', '$prenom', $class_id)";
    return mysqli_query($conn, $sql);
}

// Fonction pour obtenir un élève par ID
function get_eleve_by_id($conn, $id)
{
    $sql = "SELECT * FROM eleves WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

// Fonction pour mettre à jour un élève
function update_eleve($conn, $id, $nom, $prenom, $class_id)
{
    $sql = "UPDATE eleves SET nom='$nom', prenom='$prenom', class_id=$class_id WHERE id=$id";
    return mysqli_query($conn, $sql);
}

// Fonction pour supprimer un élève
function delete_eleve($conn, $id)
{
    $sql = "DELETE FROM eleves WHERE id=$id";
    return mysqli_query($conn, $sql);
}

// Fonction pour ajouter une classe
function add_class($conn, $type)
{
    $sql = "INSERT INTO classes (type) VALUES ('$type')";
    return mysqli_query($conn, $sql);
}

// Fonction pour obtenir une classe par ID
function get_class_by_id($conn, $id)
{
    $sql = "SELECT * FROM classes WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

// Fonction pour mettre à jour une classe
function update_class($conn, $id, $type)
{
    $sql = "UPDATE classes SET type='$type' WHERE id=$id";
    return mysqli_query($conn, $sql);
}

// Fonction pour supprimer une classe
function delete_class($conn, $id)
{
    $sql = "DELETE FROM classes WHERE id=$id";
    return mysqli_query($conn, $sql);
}


function add_menu($conn, $date, $reference, $libelle)
    {
        $sql = "INSERT INTO menus (date, reference, libelle) VALUES ('$date', '$reference', '$libelle')";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function get_menus($conn)
    {
        $sql = "SELECT * FROM menus";
        $result = $conn->query($sql);
        return $result;
    }

    function get_menu($conn, $id)
    {
        $sql = "SELECT * FROM menus WHERE id = $id";
        $result = $conn->query($sql);
        return $result;
    }

    function update_menu($conn, $id, $date, $reference, $libelle)
    {
        $sql = "UPDATE menus SET date = '$date', reference = '$reference', libelle = '$libelle' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function delete_menu($conn, $id)
    {
        $sql = "DELETE FROM menus WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function add_plat($conn, $nom, $type)
    {
        $sql = "INSERT INTO dishes (nom, type) VALUES ('$nom', '$type')";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function get_plats($conn)
    {
        $sql = "SELECT * FROM plats";
        $result = $conn->query($sql);
        return $result;
    }

    function get_plat($conn, $id)
    {
        $sql = "SELECT * FROM plats WHERE id = $id";
        $result = $conn->query($sql);
        return $result;
    }

    function update_plat($conn, $id, $nom, $type)
    {
        $sql = "UPDATE plats SET nom = '$nom', type = '$type' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function delete_plat($conn, $id)
    {
        $sql = "DELETE FROM plats WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
}
 */
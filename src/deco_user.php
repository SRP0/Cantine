<?php
session_start();
session_destroy();
header("Location: formulaire_Connexion_Utilisateur.html");
?>
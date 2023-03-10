<?php
session_start();
session_destroy();
header("Location: formulaire_Connexion_Enseignant.html");
?>
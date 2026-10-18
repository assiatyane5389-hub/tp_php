<?php
// Auteur : Assia Tyane | Objectif : fermer la session et revenir à la connexion | Date : 17/10/2026
session_start();
session_unset();
session_destroy();
header('Location: login.php');
exit;


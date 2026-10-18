<?php
// Auteur : Assia Tyane | Objectif : traiter le formulaire GET d'information | Date : 18/10/2026
require_once __DIR__ . '/includes/fonctions_inc.php';
$titrePage='Réponse GET'; include __DIR__ . '/includes/entete_inc.php'; include __DIR__ . '/includes/menu_inc.php';
if (!isset($_GET['nom'], $_GET['prenom'], $_GET['sexe']) || !is_string($_GET['nom']) || !is_string($_GET['prenom']) || !is_string($_GET['sexe'])) {
    echo '<p class="erreur">Veuillez remplir les trois champs du formulaire.</p>';
} else {
    $nom=trim($_GET['nom']); $prenom=trim($_GET['prenom']); $sexe=$_GET['sexe'];
    if ($nom==='' || $prenom==='' || !in_array($sexe,['M','F'],true)) echo '<p class="erreur">Données invalides ou incomplètes.</p>';
    else echo '<p>Bonjour '.($sexe==='M'?'Monsieur':'Madame').' '.h($prenom).' '.h($nom).'.</p><p>Les paramètres GET sont visibles dans la barre d’adresse.</p>';
}
include __DIR__ . '/includes/pied_inc.php';


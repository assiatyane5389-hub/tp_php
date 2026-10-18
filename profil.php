<?php
// Auteur : Assia Tyane | Objectif : protéger le profil par session et valider une date | Date : 18/10/2026
session_start();
if (!isset($_SESSION['login'])) { header('Location: login.php'); exit; }
require_once __DIR__.'/includes/fonctions_inc.php';
$titrePage='Profil apprenant'; include __DIR__.'/includes/entete_inc.php'; include __DIR__.'/includes/menu_inc.php';
?>
<h2>Bienvenue <?= h($_SESSION['login']) ?> !</h2>
<p><a href="deconnexion.php">Se déconnecter</a></p>
<h3>Vérifier une date</h3>
<form method="post"><label>Jour : <input type="number" name="jour" min="1" max="31" required></label><label>Mois : <input type="number" name="mois" min="1" max="12" required></label><label>Année : <input type="number" name="annee" min="1" required></label><button type="submit">Vérifier</button></form>
<?php
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $j=filter_input(INPUT_POST,'jour',FILTER_VALIDATE_INT); $m=filter_input(INPUT_POST,'mois',FILTER_VALIDATE_INT); $a=filter_input(INPUT_POST,'annee',FILTER_VALIDATE_INT);
    if ($j!==false && $m!==false && $a!==false && $j!==null && $m!==null && $a!==null && checkdate($m,$j,$a)) echo '<p class="ok">Date valide : '.sprintf('%02d/%02d/%04d',$j,$m,$a).'.</p>';
    else echo '<p class="erreur">Date invalide : vérifiez le jour, le mois et l’année.</p>';
}
?>
<?php include __DIR__.'/includes/pied_inc.php'; ?>


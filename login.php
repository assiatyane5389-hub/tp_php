<?php
// Auteur : Assia Tyane | Objectif : ouvrir une session et authentifier un login de démonstration | Date : 18/10/2026
session_start();
require_once __DIR__.'/includes/fonctions_inc.php';
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $login=$_POST['login']??'';
    if (!is_string($login) || trim($login)==='') $erreur='Saisissez un login.';
    else {
        $login=trim($login); $_SESSION['login']=$login;
        setcookie('dernier_login',$login,['expires'=>time()+86400,'path'=>'/']);
        $cookieJson=json_encode(['login'=>$login,'date_connexion'=>date(DATE_ATOM)],JSON_UNESCAPED_UNICODE);
        setcookie('dernier_login_json',$cookieJson,['expires'=>time()+86400,'path'=>'/']);
        header('Location: profil.php'); exit;
    }
}
$dernier=$_COOKIE['dernier_login']??'';
if (isset($_COOKIE['dernier_login_json'])) { $variante=json_decode($_COOKIE['dernier_login_json'],true); if (is_array($variante) && isset($variante['login'])) $dernier=$variante['login']; }
$titrePage='Connexion'; include __DIR__.'/includes/entete_inc.php'; include __DIR__.'/includes/menu_inc.php';
?>
<h2>Connexion de démonstration</h2>
<?php if (isset($erreur)) echo '<p class="erreur">'.h($erreur).'</p>'; ?>
<form method="post" action="login.php"><label>Login : <input name="login" type="text" value="<?= h($dernier) ?>" required></label><button type="submit">Se connecter</button></form>
<p>Cette page démontre les sessions ; elle ne vérifie pas de mot de passe.</p>
<?php include __DIR__.'/includes/pied_inc.php'; ?>


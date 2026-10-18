# TP 3 PHP — Suivi des notes des apprenants

## Démarrage

1. Ouvrir ce dossier `tp_php` dans VS Code.
2. Le projet est personnalisé avec Assia Tyane et IAP.
3. Depuis un terminal placé dans ce dossier, lancer `php -S localhost:8000`.
4. Ouvrir `http://localhost:8000/exo1_bases.php` puis parcourir les liens du menu. PHP doit être exécuté par le serveur, pas via `file://`.

Les fichiers `data/notes.csv` et `data/notes.json` sont créés automatiquement après une saisie valide et un export. Assurez-vous que PHP peut écrire dans `data/`.

## Vérifications proposées

- Parcourir `exo1_bases.php`, `exo2_flux.php` et `exo3_tableaux.php` pour les parties 1 à 3.
- Depuis `saisie.html`, enregistrer des notes 0, 20, une note décimale et une valeur invalide ou hors intervalle.
- Vérifier la liste, la moyenne générale et la lecture CSV dans `liste.php`, puis l’export dans `export.php`.
- Dans une fenêtre privée, ouvrir `profil.php` sans session : la page doit rediriger vers `login.php`. Se connecter, vérifier le préremplissage du login, tester une date valide et invalide, puis se déconnecter.
- Dans `info.html`, soumettre un nom/prénom : les valeurs GET apparaissent dans l’URL.

## Notes de cours intégrées

- Un mot de passe ne devrait pas être envoyé par GET car il apparaîtrait dans l’URL, l’historique et potentiellement les journaux. POST ne chiffre pas : utiliser HTTPS.
- `$_REQUEST` rassemble des données GET, POST et/ou COOKIE selon la configuration PHP ; pour un traitement précis, préférer `$_GET` ou `$_POST`.
- Le mode CSV `a` ajoute les nouvelles lignes ; le mode `w` tronquerait le fichier existant.
- `fgetcsv()` respecte les séparateurs et guillemets du CSV ; `fgets()` + `explode()` est plus simple mais ne traite pas correctement les champs cités contenant le séparateur.
- `json_encode()` produit du JSON utilisable directement en JavaScript ; `serialize()` est conçu pour PHP.
- Une session est conservée côté serveur et identifiée par un cookie de session ; un cookie est conservé par le navigateur. `setcookie()` et `header()` doivent précéder toute sortie HTML car ils écrivent des en-têtes HTTP.
- Les scripts de l’application sont pédagogiques : la page de connexion ne protège qu’avec un login, sans mot de passe.

## GitHub / Classroom

Pour remettre le TP, créez un dépôt GitHub, ajoutez le contenu de ce dossier, poussez votre dépôt, puis déposez son URL dans Classroom. Vérifiez avant le dépôt qu’aucune donnée réelle ou secrète n’est incluse.

## Expériences include / require

Dans `exo3_tableaux.php`, un commentaire rappelle le résultat attendu : `include` sur un fichier absent signale un avertissement puis poursuit l'exécution ; `require` provoque une erreur fatale et arrête le script. Inclure plusieurs fois le menu avec `include` le duplique ; `include_once` ne le charge qu'une fois. Les inclusions de l'application utilisent `require_once` pour éviter les chargements en double.

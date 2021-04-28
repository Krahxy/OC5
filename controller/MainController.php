<?php

use Lp\Article;
use Lp\User;

// VIEWS
function home($values) {
    require('./view/home.php');
}

function pageFAQ($values) {
    require('./view/faq.php');
}

function pageContact($values) {
    require('./view/contact.php');
}

function pageCommercants($values) {
    require('./view/commercants.php');
}

function pageEspacejeunes($values) {
    require('./view/espacejeunes.php');
}

function pageParcmelaga($values) {
    require('./view/parcmelaga.php');
}

function pageHotels($values) {
    require('./view/hotels.php');
}

function pageAssociations($values) {
    require('./view/associations.php');
}

function pageVille($values) {
    require('./view/ville.php');
}

function pageTourisme($values) {
    require('./view/tourisme.php');
}

function pageHistoire($values) {
    require('./view/histoire.php');
}

function pageMeteo($values) {
    require('./view/meteo.php');
}

function pageRestauration($values) {
    require('./view/restauration.php');
}

function pageConnexion($values) {
    require('./view/connexion.php');
}

function pageInscription($values) {
    require('./view/inscription.php');
}

function pageAdmin($values) {
    extract($values);
    $getUsers = new User();
    $users = $getUsers -> all();
    require('./view/admin.php');
}
// FIN DES VIEWS


// INSCRIPTION
function signupEnd($values) {
    extract($values);
    $message = '';
    if (empty($pseudo) OR empty($pass) OR empty($pass2) OR empty($email)) $message='Tous les champs ne sont pas remplis';
    if (strlen($pseudo) AND strlen($pass) AND strlen($email) >= 255) $message='Votre pseudo, mail ou mot de passe ne doit pas dépasser 255 caractères.';
    if ($pass != $pass2) $message='Les mots de passes ne correspondent pas.';

    if ($message != '') {
        header('Location: index.php?action=error-message-'.$message);
    } else {
        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        $regUser = new User();
        $req = $regUser -> userInfo($pseudo);
        $req2 = $regUser -> checkEmail($email);
        $pseudoExist = $req -> rowCount();
        $emailExist = $req2 -> rowCount();
    
        if ($pseudoExist == 1 || $emailExist == 1) {
            $message ='Pseudo ou email déjà utilisé';
            header('Location: index.php?action=error-message-'.$message);
        } else {
            $users = $regUser -> add($pseudo, $passHash, $email);
            require('./view/connexion.php');
        }
    }
}

// CONNEXION
function loginPage($values) { // Connexion du membre si les mots de passe sont corrects // OK
    extract($values);
    $logUser = new User();
    $req = $logUser -> userInfo($pseudo);
    $resultat = $req -> fetch();
    $req2 = $logUser -> checkStatus($pseudo);
    $resultat2 = $req2 -> fetch();
    $isPasswordCorrect = password_verify($pass, $resultat['pass']); // On vérifie si le mot de passe corresponds au mot de passe hashé
    if (!$resultat) {
        $message='';
        header('Location: index.php?action=error-message-'.$message);
    } else {
        if ($isPasswordCorrect) {
            $_SESSION['id']     = $resultat['id'];
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['status'] = $resultat2[0];
            header('Location: index.php?action=home');
        } else {
            $message = 'Mauvais identifiant ou mot de passe.';
            header('Location: index.php?action=error-message-'.$message);
        }
    } 
}

// DECONNEXION
function disconnect($values) {
    $_SESSION = array();
    session_destroy();
    setcookie('pseudo', '');
    require('./view/home.php');
}

// PAGE ACTUALITÉ
function pageActualites($values) {
    $getArticles = new Article();
    $articles = $getArticles -> getAll();
    require('./view/actualites.php');
}

// POSTER UNE ACTUALITÉ
function postArticle($values) {
    extract($values);
    $newArticle = new Article();
    $req = $newArticle -> add($title, $content);
    header('Location: index.php?action=actualites');
}

// ACTUALITÉ SELECTIONNÉE
function articlePage($values) { 
    extract($values);
    $oneArticle = new Article();
    // $selectComment = new Comment();
    $articleOnce = $oneArticle -> getOne($id);
    // $comments = $selectComment -> select($id);
    require('./view/article.php');
}

// DELETE UNE ACTUALITÉ
function deleteArticle($values) { // DELETE
    extract($values);
    $deleteId = new Article();
    $idDeleted = $deleteId -> delete($id);
    header('Location: index.php?action=actualites');
}

// UPDATE UNE ACTUALITÉ VIA BOUTON
function updateArticle($values) { 
    extract($values);
    $oneArticle = new Article();
    $articleOnce = $oneArticle -> getOne($id);
    require('./view/editArticle.php');
}

// ENVOI DE L'ACTUALITÉ MODIFIÉE
function editArticlePage($values) {
    extract($values);
    $updateArticle = new Article();
    $articleUpdated = $updateArticle -> update($id, $title, $content);
    header('Location: index.php?action=actualites');
}

// PROFIL
function pageProfil($values) {
    extract($values);
    $reqUser = new User();
    $req = $reqUser -> userInfo($pseudo);
    $userInfo = $req -> fetch();
    require('./view/profil.php');
}

// UPDATE PHOTO DE PROFIL
function updateProfil($values) {
    extract($values);
    if(isset($avatar) AND !empty($avatar['name'])) {
        $tailleMax = 2097152; // On définit une taille maximale du fichier
        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png'); // Création du tableau avec les extension que l'on accepte
        if($avatar['size'] <= $tailleMax) { // On vérifie si la taille ne dépasse pas la taille maximale acceptée
            $extensionUpload = strtolower(substr(strrchr($avatar['name'], '.'), 1));
            if(in_array($extensionUpload, $extensionsValides)) {
                $chemin = "./public/images/members/".$id.".".$extensionUpload; // On définit l'endroit et le nom du fichier où il sera enregistré
                $resultat = move_uploaded_file($avatar['tmp_name'], $chemin); // On envoi le fichier au chemin prédéfini juste avant
                if($resultat) {
                    $reqUser = new User();
                    $req = $reqUser -> updateAvatar($id, $avatar); // On envoi dans la bdd
                    header('Location: index.php?action=profil');
                } else {
                    $message = "Problème lors de l'envoi du fichier";
                    header('Location: index.php?action=error-message-'.$message);
                }
            } else {
                $message = "Votre fichier envoyé doit etre dans un format suivant : jpg, jpeg, gif, png";
                header('Location: index.php?action=error-message-'.$message);
            }
        } else {
            $message = "Votre fichier envoyé est trop volumineux, il ne doit pas dépasser 2Mo";
            header('Location: index.php?action=error-message-'.$message);
        }
    }
}

function updateRole($values) {
    extract($values);
    $getUser = new User();
    if ($admin == 0) {
        $admin == 1;
        $updateRole = $getUser -> updateRole($id, $admin);
    } else {
        $admin == 0;
        $updateRole = $getUser -> updateRole($id, $admin);
    }
    header("Location: index.php?action=admin");
}

function pageError($values) {
    extract($values);
    require('./view/error.php');
}

function infoPage($values) {
    extract($values);
    require('./view/info.php');
}




function test($values) {
    extract($values);
    require('./view/test.php');
}
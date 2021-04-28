<?php
// Démarrage de la session
session_start();

// Chargement automatique des Classes
spl_autoload_register('autoload');
function autoload ($className) {
    $elements = explode('\\', $className);
    require_once('model/'.$elements[1].'Manager.php');
};


require('./controller/MainController.php');

// Ensemble des routes du routeur
$routes = [
            'ville'          => "pageVille",
            'tourisme'       => "pageTourisme",
            'commercants'    => "pageCommercants",
            'espacejeunes'   => "pageEspacejeunes",
            'parcmelaga'     => "pageParcmelaga",
            'hotels'         => "pageHotels",
            'associations'   => "pageAssociations",
            'histoire'       => "pageHistoire",
            'home'           => "home",
            'meteo'          => "pageMeteo",
            'restauration'   => "pageRestauration",
            'actualites'     => "pageActualites",
            'connexion'      => "pageConnexion",
            'deconnexion'    => "disconnect",
            'login'          => "loginPage",
            'inscription'    => "pageInscription",
            'signupEnd'      => "signupEnd",
            'admin'          => "pageAdmin",
            'article'        => "articlePage",
            'postArticle'    => "postArticle",
            'articleDelete'  => "deleteArticle",
            'updateRole'     => "updateRole",
            'profil'         => "pageProfil",
            'contact'        => "pageContact",
            'users'          => "pageUsers",
            'editAvatar'     => "updateProfil",
            'editPanelPost'  => "editArticlePage",
            'inscriptionEnd' => "signupEnd",
            'articleUpdate'  => "updateArticle",
            'error'          => "pageError",
            'test'           => "test",
            'faq'            => "pageFAQ"
];

// Terner pour récupérer la variable $url qui est l'action
($_GET['action']) ? $url = $_GET['action'] : $url = 'home';

// Explode de notre $url pour supprimer l'élement 0 de notre url
$elements = explode("-", $url);
$action = $elements[0];
unset($elements[0]);

// Initialisation d'un tableau $myvalues qui va stocker les élements de nos urls
$myvalues = [];

// On précise que s'il existe l'élement 2 [1] dans notre url, sa valeur sera égale à l'élement 3 [2] ex: article-id-2
if (isset($elements[2])) {
    $myvalues[$elements[1]] = $elements[2];
}

// On précise que s'il existe l'élement 4 [3] et 5 [4] dans notre url, la valeur du [3] = [4]. 
if (isset($elements[3]) && isset($elements[4])) {
    $myvalues[$elements[3]] = $elements[4];
}

// On vient stocker dans notre array $values nos valeurs de post, session, files et get($myvalues).  et on lance notre fonction $controller.
if (key_exists($action, $routes)) {
    $values = array_merge($_POST, $_SESSION, $_FILES, $myvalues); 
    $controller = $routes[$action]; // On indique que $controller = à notre route si elle existe
    $controller($values);           // On lance notre fonction $controller avec comme paramètres notre array $values qui rassemble nos variables
} else {
    echo "404"; // Si pas de route trouvées, on envoi une erreur 404.
}
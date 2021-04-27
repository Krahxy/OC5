<?php
session_start();

spl_autoload_register('autoload');

function autoload ($className) {
    $elements = explode('\\', $className);
    require_once('model/'.$elements[1].'Manager.php');
};

require('./controller/MainController.php');

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

($_GET['action']) ? $url = $_GET['action'] : $url = 'home';

$elements = explode("-", $url);
$action = $elements[0];
unset($elements[0]);

$myvalues = [];

if (isset($elements[2])) {
    $myvalues[$elements[1]] = $elements[2];
}

if (isset($elements[3]) && isset($elements[4])) {
    $myvalues[$elements[3]] = $elements[4];
}

if (key_exists($action, $routes)) {
    $values = array_merge($_POST, $_SESSION, $_FILES, $myvalues); 
    $controller = $routes[$action];
    $controller($values);
} else {
    echo "404"; // Faire une page 404
}
<?php 

namespace Lp;
use Lp\Main;

class User extends Main {

    // Fonction pour récupérer tous les utilisateurs
    public function all() {
        $db = $this -> dbConnect();
        $req = $db -> query('SELECT * FROM users');
        return $req;
    }

    // Fonction d'ajout de membre à la BDD
    public function add($pseudo, $pass, $email) { 

        $db = $this -> dbConnect();

        $req = $db -> prepare('INSERT INTO users (pseudo, pass, email) VALUES(?, ?, ?)');
        $req -> execute(array(
            $pseudo,
            $pass,
            $email
        ));
        return $req;
    }

    // Fonction de connexion du membre
    public function userInfo($pseudo) { 

        $db = $this -> dbConnect();

        $req = $db -> prepare('SELECT * FROM users WHERE pseudo = :pseudo');
        $req -> execute(array(
            'pseudo' => $pseudo
        ));
        return $req;
    }

    // On regarde si l'email existe
    public function checkEmail($email) { 

        $db = $this -> dbConnect();

        $req = $db -> prepare('SELECT * FROM users WHERE email = :email');
        $req -> execute(array(
            'email' => $email
        ));
        return $req;
    }

    // On regarde si le pseudo existe
    public function checkStatus($pseudo) { 

        $db = $this -> dbConnect();

        $req = $db -> prepare('SELECT admin FROM users WHERE pseudo = :pseudo');
        $req -> execute(array(
            'pseudo' => $pseudo
        ));
        return $req;
    }

    // On récupère tous les utilisateurs
    public function getAllUsers() { 

        $db = $this -> dbConnect();
        
        $req = $db -> query('SELECT * FROM users');
        return $req;
    }
    
    // Changement d'avatar de profil
    public function updateAvatar($id, $avatar) {
        
        $db = $this -> dbConnect();
        $extensionUpload = strtolower(substr(strrchr($avatar['name'], '.'), 1));
        $req = $db -> prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
        $req -> execute(array(
            'avatar' => $_SESSION['id'].".".$extensionUpload,
            'id'     => $_SESSION['id']
        ));
    }

    public function updateRole($id, $admin) {
        
        $db = $this -> dbConnect();
        $req = $db -> prepare('UPDATE users SET admin = :admin WHERE id = :id');
        $req -> execute(array(
            'admin'  => $admin,
            'id'     => $id
        ));
    }

}
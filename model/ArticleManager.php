<?php 

namespace Lp;
use Lp\Main;

class Article extends Main {

    // Fonction pour récupérer tous les articles de l'actualité
    public function getAll() {
        $db = $this -> dbConnect();
        $req = $db -> query('SELECT * FROM articles ORDER BY id DESC');
        return $req;
    }

    // Fonction pour récupérer un article
    public function getOne($id) {
        $db = $this -> dbConnect();
        $req = $db -> prepare('SELECT id, title, content, date FROM articles WHERE id = ?');
        $req -> execute(array(
            $id
        ));
        $datas = $req -> fetch();
        return $datas;
    }

    // Fonction pour créer un nouvel article
    public function add($title, $content) {
        $db = $this -> dbConnect();
        $req = $db -> prepare('INSERT INTO articles (title, content, date) VALUES(?, ?, NOW())');
        $req -> execute(array(
            $title,
            $content
        ));
        return $req;
    }

    // Fonction pour supprimer un article
    public function delete($id) {
        $db = $this -> dbConnect();
        $req = $db -> prepare('DELETE FROM articles WHERE id = ?');
        $req -> execute(array(
            $id
        ));

        echo "Votre article a bien été supprimé";
        return $req;
    }

    // Fonction pour edit un article
    public function update($id, $title, $content) {
        $db = $this -> dbConnect();
        $req = $db -> prepare('UPDATE articles SET title = :title, content = :content WHERE id = :id');
        $req -> execute(array(
            'title' => $title,
            'content' => $content,
            'id' => $id
        ));

        echo "Votre article a bien été modifié";
        return $req;
    }

}
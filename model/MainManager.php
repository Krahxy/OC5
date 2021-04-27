<?php

namespace Lp;


class Main {
    protected function dbConnect() {
        $db = new \PDO('mysql:host=localhost;dbname=lp;charset=utf8', 'root', 'root');
        return $db;
    }
}
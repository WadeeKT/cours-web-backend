<?php

require_once 'config/db.php';

abstract class Model {
    // Attribut statique pour stocker l'unique instance de la connexion PDO
    protected static ?PDO $db = null;
    // Le ? devant PDO signifie que la variable peut être de type PDO ou égale à null
    //Sans le ?, il ne serait pas autorisé d'écrire $db=null

    // Initialise une seule fois la connexion à la base de données
    private static function getConnection(): PDO {
        // Vérifie si la connexion n'a pas déjà été établie 
        if (self::$db === null) {
            $dsn = 'mysql:host=' . DB::HOST . ';port=' . DB::PORT . ';dbname=' . DB::NAME . ';charset=utf8';
            self::$db = new PDO($dsn, DB::USER, DB::PWD);

            // Lancer une exception en cas d'erreur
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$db;
    }

    protected static function executeQuery(string $sql): PDOStatement {
        return self::getConnection()->query($sql);
    }
    
    protected static function execQuery(string $sql): int {
        return self::getConnection()->exec($sql);
    }
    protected static function prepareQuery(string $sql): PDOStatement {
        return self::getConnection()->prepare($sql);
    }
}

?>

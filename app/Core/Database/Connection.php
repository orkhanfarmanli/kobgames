<?php

namespace App\Core\Database;

use PDO;
use PDOException;

class Connection
{
    /**
     * Make PDO connection
     * @param $config
     * @return PDO
     */
    public static function make($config)
    {
        try {
            $pdo = new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password']
            );

            foreach ($config['options'] as $key => $value){
                $pdo->setAttribute($key, $value);
            }

            return $pdo;

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

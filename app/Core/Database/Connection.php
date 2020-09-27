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
            return new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

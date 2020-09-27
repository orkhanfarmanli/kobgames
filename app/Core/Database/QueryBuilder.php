<?php

namespace App\Core\Database;

use Exception;
use PDO;

class QueryBuilder
{
    protected $pdo;

    /**
     * Init pdo
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Select query builder
     * @param $query
     * @param array $parameters
     * @return array
     */
    public function select($query, $parameters = [])
    {
        $statement = $this->pdo->prepare($query);

        $statement->execute($parameters);

        return $statement->fetchAll();
    }

    /**
     * Insert query builder
     * @param $table
     * @param $parameters
     * @return void
     */
    public function insert($table, $parameters)
    {
         $sql = sprintf(
               'INSERT INTO %s (%s) VALUES (%s)',
               $table,
               implode(', ', array_keys($parameters)),
               ':' . implode(', :', array_keys($parameters))
          );

          $statement = $this->pdo->prepare($sql);

          try {
               $statement->execute($parameters);

               header("Location:/");
          } catch (Exception $e) {
               die("Exception: " . $e->getMessage());
          }
    }
}

<?php

namespace App\Core\Database;

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

          return $statement->fetchAll(PDO::FETCH_CLASS);
     }
}

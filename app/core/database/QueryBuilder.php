<?php

class QueryBuilder
{
     protected $pdo;

     public function __construct(PDO $pdo)
     {
          $this->pdo = $pdo;
     }

     public function select($query)
     {
          $statement = $this->pdo->prepare($query);

          $statement->execute();

          return $statement->fetchAll(PDO::FETCH_CLASS);
     }


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

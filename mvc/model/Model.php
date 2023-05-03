<?php
include_once("configbdd.php");
namespace Models;

use PDO;

class Model
{
   private $table;
   private $pdo;

   public function __construct($table)
   {
      $this->table = $table;
      $this->pdo = new PDO('mysql:host='.$server.';dbname='.$bddname.'', $myusername, $mdp);
   }

   public function getAll()
   {
      return $this->pdo->query("SELECT * FROM $this->table")->fetchAll();
   }

   public function findById($id, $target)
   {
      return $this->pdo->query("SELECT * FROM $this->table WHERE $target = $id")->fetch();
   }

   public function findByIdPc($id, $target)
   {
      return $this->pdo->query("SELECT * FROM tblGamesPc WHERE $target = $id")->fetch();
   }

   public function findByIdCs($id, $target)
   {
      return $this->pdo->query("SELECT * FROM tblGamesCs WHERE $target = $id")->fetch();
   }
}


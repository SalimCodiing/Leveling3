<?php
namespace Models\Games;

use PDO;
use \Models\Model;




class Games
{
   private $pdo;
   private $model;
   public function __construct()
   {
      $this->pdo = new PDO('mysql:host='.$server.';dbname='.$bddname.'', $myusername, $mdp);
      $this->model = new Model('tblgames');
      $this->modelpc = new Model('tblgamespc');
   }

   public function getAll()
   {
      return $this->model->getAll();
   }

   public function findById($id, $target)
   {
      return $this->model->findById($id, $target);
   }

   public function findByIdPc($id, $target)
   {
      return $this->model->findByIdPc($id, $target);
   }

   public function findByIdCs($id, $target)
   {
      return $this->model->findByIdCs($id, $target);
   }

}

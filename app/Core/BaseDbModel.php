<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

namespace Com\Daw2\Core;
use \PDO;

abstract class BaseDbModel{
   protected $pdo;
    
    public function __construct() {
        $this->pdo= DBManager::getInstance()->getConnection();

    }

  
}
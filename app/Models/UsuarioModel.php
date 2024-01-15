<?php
declare (strict_types=1);
namespace Com\Daw2\Models;
use \PDO;
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of UsuarioModel
 *
 * @author sandra.queimadelosmachado
 */

class UsuarioModel extends \Com\Daw2\Core\BaseDbModel{
    
  
    const SELECT_FROM = "SELECT u.*, ar.nombre_rol as rol FROM usuario u LEFT JOIN aux_rol ar ON ar.id_rol = u.id_rol";
    
    function consultarTodos(): array {
        // $pdo = $this->conectar(); // recogemos los devuelto por la funcion conexión
         $stm = $this->pdo->query(self::SELECT_FROM); 
         $resultado= $stm->fetchAll();
         return $resultado;
         //var_dump($resultado);       
    }
    
    function consultarSalario() : array{
         //pdo = $this->conectar(); // recogemos los devuelto por la funcion conexión
        $stm = $this->pdo->query(self::SELECT_FROM . "ORDER BY salarioBruto DESC"); 
        return $stm->fetchAll(); // devolvemos directamente los datos en forma de array
        
    }
    
    function consultarStandar() : array{
         //$pdo = $this->conectar(); // recogemos los devuelto por la funcion conexión
        $stm = $this->pdo->query(self::SELECT_FROM . " WHERE rol='Standar'"); 
        return $stm->fetchAll(); // devolvemos directamente los datos en forma de array
        
    } 
    
     function consultarNombre() : array{
        // $pdo = $this->conectar(); // recogemos los devuelto por la funcion conexión
        $stm = $this->pdo->query(self::SELECT_FROM ."WHERE username  LIKE 'Carlos%'"); 
        return $stm->fetchAll(); // devolvemos directamente los datos en forma de array
        
    } 
    
    function filtrarCategoria(int $rol):array{
        
        $stm = $this->pdo->prepare(self::SELECT_FROM . " WHERE u.id_rol= ? ORDER BY nombre_rol");
        $stm->execute(['id_rol' => $rol]);
        return $stm->fetchAll(); 
        
        
    }
    
    
}

<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
namespace Com\Daw2\Models;

class CategoriaModel extends \Com\Daw2\Core\BaseDbModel{
    
    const SELECT_FROM = "SELECT * FROM aux_rol";
    
    public function consultarRolCombo(): array{
        $stm = $this->pdo->query(self::SELECT_FROM);
        $resultado = $stm->fetchAll();
        return $resultado;
                
                /// tengo que devolver la consulta que va a ir al select que va a llenar el combo
                // de categorias
    }
    
    
    
}

<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

namespace Com\Daw2\Controllers;
class NotasController extends \Com\Daw2\Core\BaseController{
    
    function mostrarFormularioNotas(): void {
        $data = [];
        $data['titulo'] = 'Formulario Notas';
        $data['seccion'] = 'notas-alumno';
        $this->view->showViews(array('templates/header.view.php', 'notas.view.php', 'templates/footer.view.php'), $data);
    }
    
    function procesarFormularioNotas(): void{
        $data = [];
        $data['titulo'] = 'Notas Alumno ';
        $data['seccion'] = 'notas-alumno';
        
         // nombre del archivo en json 
        $path = 'notas.json';
        $file = file_get_contents($path);// extraemos el archivo 
        $jsonData = json_decode($file); // decodificamos el archivo 
        //$_POST['txtaNotas'] = var_dump($jsonData);
        
        
    } 
}
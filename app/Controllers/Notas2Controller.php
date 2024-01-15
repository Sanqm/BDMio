<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

namespace Com\Daw2\Controllers;
class Notas2Controller extends \Com\Daw2\Core\BaseController{
    
    function mostrarFormularioNotas (): void{
        $data= [];
        $data = ['titulo'] = 'Formulario Notas';
        $data = ['seccion'] = 'notas2';
         $this->view->showViews(array('templates/header.view.php', 'notas2.view.php', 'templates/footer.view.php'), $data);
    }
    
    function procesarAsignaturas(){
        $data[];
        $data['titulo'] = 'Notas alumno';
        $data['seccion']= 'notas2';
        $data['errores']= $this->checkFormNotas($_POST);
        $data['input'] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        
        if(count($data['errores'])===0){
         $data['resultado'] = $this->procesarDatosNotas(json_decode($_POST['texto'], true));
        }
         $this->view->showViews(array('templates/header.view.php', 'notas2.view.php', 'templates/footer.view.php') , $data);
    }

    function procesarDatosNotas(array $datos): array {
        $resultado =[];
        foreach ($datos as $nombreMateria => $notasMateria){ // recuerda que lo hace dentro del for por tener varias asignatura 
            $media = 0 ;
            $aprobados = 0;
            $suspensos = 0;
            $maxAlum = 0;
            $minAlum = 0;     
        }
        foreach ($nombreMateria as $alumno =>$notas){
            $media += $notas;
            if ($notas < 5) {
                $suspensos++;
            }else{
                $aprobados++;            }
        }
        
    }

    function checkFormNotas(array $post) :array {
        
        
        $fNotas = json_decode($post['texto'], true);
        $erroresfichero = [];
        $errores = [];
        
    
     if (is_null($fNotas)){
         $erroresfichero[] = 'No se ha podido abrir el archivo indicado ';
     }else{
         foreach ($fNotas as $nombreMateria => $notasMateria){
             if(!is_string($nombreMateria)&& !is_array($nombreMateria)){
                 $erroresfichero = "'$nombreMateria' no es un nombre de asignatura válido";
                 
             }else if (!is_array($nombreMateria)){
                 if(!is_array($notasMateria)){
                     $erroresfichero[] = "$nombreMateria' no tiene asignados un array de notas'";
                 }
                 else{
                     foreach ($notasMateria as $alumno => $notas){
                         if (!is_string($alumno) && !is_array($notas)) {
                             $erroresfichero = "Asignatura: $nombreMateria 'el alumno $alumno notien un nombre válido'";
                         }else if(!is_array($alumno)){
                             if(!is_numeric($notas) && !is_array($notas)){
                                 $erroresfichero[]= "Asignatura : '$nombreMateria ' tiene una nota $notas inválida";
                             }else if (!is_array($nota)){
                                 if ($nota<0 || $nota > 10){
                                     $erroresfichero[] = "$nombreMateria 'tiene una nota ' $notas no válida";
                                 }else{
                                     $erroresfichero[] = "Asignatrua '$nombreMateria',  alumno '$alumno tiene como nota un array." ;
                                 }
                             }
                         }
                             
                     }
                 }
                   
             }
         }
                 
         if (count($erroresfichero)>0){
             $errores['texto'] = $erroresfichero;
         }
         return $errores;
        
     }
        
    }
    
}
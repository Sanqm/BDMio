<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Com\Daw2\Controllers;

/**
 * Description of UsuarioController
 *
 * @author sandra.queimadelosmachado
 */
class UsuarioController extends \Com\Daw2\Core\BaseController {

    function mostrarTodosUsuarios(): void {

        if (isset($_GET['enviar'])) {
            $modelo = new \Com\Daw2\Models\UsuarioModel();
            $usuarios = $modelo->filtrarCategoria();
        } else {
            $usuarios = [];
        }


        $data = array(
            'titulo' => 'Inicio',
            'bredcrumb' => ['Inicio'],
            'usuarios' => $usuarios,
        );

        $this->view->showViews(array('templates/header.view.php', 'consultas.view.php', 'templates/footer.view.php'), $data);
    }
    function mostrarListadoFiltros(): void{
        $rolModel = new \Com\Daw2\Models\CategoriaModel();
        $roles = $rolModel->consultarRolCombo();
        
        $modelo = new \Com\Daw2\Models\UsuarioModel();
        if(!empty($_GET['id_rol']) && filter_var($_GET['id_rol'], FILTER_VALIDATE_INT)){
            $usuarios = $modelo->getUsuariosByIdRol((int)$_GET['id_rol']);
        }
        else{
            $usuarios = $modelo->getAllUsers();
        }        
        
        $data = array(
            'titulo' => 'Usuarios',
            'breadcrumb' => ['Inicio', 'Usuarios'],
            'seccion' => 'usuarios-filtros',
            'usuarios' => $usuarios,
            'roles' => $roles
        );        
        $this->view->showViews(array('templates/header.view.php', 'consultas.view.php', 'templates/footer.view.php'), $data);
    }
}

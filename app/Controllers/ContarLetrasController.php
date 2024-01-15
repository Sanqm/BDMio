<?php

namespace Com\Daw2\Controllers; // namespace son nombres de paquetes  equivalente pakage de java 

class ContarLetrasController extends \Com\Daw2\Core\BaseController {

    function mostrarFormularioLetras(): void
    {
        $data = [];
        $data['titulo'] = 'Formulario Letras';
        $data['seccion'] = 'contar-letras';
        $this->view->showViews(array('templates/header.view.php', 'ContarLetras.view.php', 'templates/footer.view.php'), $data);
    }

   
      function procesarFormularioLetras() : void{
      $data = [];
      $data['titulo'] = 'Formulario contar letras';
      $data['seccion'] = 'contarLetras';

      $data['errores'] = $this->checkForm($_POST);

      $data['isOk'] = count($data['errores']) === 0;
      //$data['input'] = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
      $data['input'] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
      
      if(count($data['errores']) === 0){
            $data['isOk'] = $this->contLetters($_POST['palabraContar'], $_POST['palabraContar']);
        }

      $this->view->showViews(array('templates/header.view.php', 'ContarLetras.view.php', 'templates/footer.view.php'), $data);
      }
      
      private function contLetters(string $texto): array {
         
          
      }
  /*
      private function checkForm(array $post) : array{
      $errores = [];
      if(empty($post['username'])){
      $errores['username'] = 'Este campo es obligatorio';
      }
      else if(!preg_match('/^[a-zA-Z][a-zA-Z0-9]{4,19}$/', $post['username'])){
      $errores['username'] = 'El nombre de usuario debe tener una longitud entre 5 y 20. Debe comenzar por letra y sólo se permiten letras y números.';
      }

      if(empty($post['email'])){
      $errores['email'] = "Campo obligatorio";
      }
      else if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
      $errores['email'] = "Es obligatorio insertar un email";
      }

      if(!empty($post['matricula']) && !preg_match('/^[0-9]{4}[A-Z]{3}$/', $post['matricula'])){
      $errores['matricula'] = 'El formato de matrícula es 1234ABC.';
      }

      if(isset($post['opcions']) && in_array('tarjeta', $post['opcions']) && !in_array('socio', $post['opcions'])){
      $errores['opcions'] = 'Sólo se puede seleccionar tarjeta si se ha marcado la opción socio';
      }

      return $errores;
      }
     */
}

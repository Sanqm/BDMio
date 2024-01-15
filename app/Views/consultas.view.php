<div class="row">  
         <?php
        if($_ENV['app.debug'] & isset($_GET)){
            ?>
            <div class="col-12">
                <div class="alert alert-info">
                    <?php var_dump($_GET); ?>
                </div>
            </div>
    <?php
        }
        ?>
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="get" action="/conexion">
                <input type="hidden" name="order" value="1"/>
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Filtros</h6>                                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!--<form action="./?sec=formulario" method="post">                   -->
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="nombre_completo">Nombre completo:</label>
                                <input type="text" class="form-control" name="nombre_completo" id="nombre_completo" value="" />
                            </div>
                        </div> 
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="categoria">Categoria:</label>
                                <select name="categoria" id="categoria" class="form-control" data-placeholder="Categoria">
                                    <option value="">-</option>>
                                    <?php foreach ($categorias as $cat){ ?>
                                    <option value="<?php $cat['id_rol']?>"<?php echo (isset($_GET['id_rol']) && $cat['id_rol']== $_GET['id_rol']) ? 'selected' : ''; ?> ><?php echo $cat['nombre_rol']?> </option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>                        
                                               
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">                     
                        <a href="/proveedores" value="" name="reiniciar" class="btn btn-danger">Reiniciar filtros</a>
                        <input type="submit" value="Aplicar filtros" name="enviar" class="btn btn-primary ml-2"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Proveedores</h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body" id="card_table">
                <div id="button_container" class="mb-3"></div>
                <!--<form action="./?sec=formulario" method="post">                   -->
                <table id="tabladatos" class="table table-striped">                    
                    <thead>
                        <tr>
                            <th><a href="/proveedores?order=1">Username</a> <i class="fas fa-sort-amount-down-alt"></i></th>
                            <th><a href="/proveedores?order=2">rol</a> </th>
                            <th><a href="/proveedores?order=3">salariBruto</a> </th>
                            <th><a href="/proveedores?order=4">retencionRPF</a> </th>
                            <th><a href="/proveedores?order=5">Activo</a> </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                       
                        if (empty($usuarios)) {
                            echo '<td>Datos no encontrados</td>';
                        }else {
                            foreach ($usuarios as $u) {
                                if ($u['activo'] == 0) {
                                    echo '<tr class="table-danger">';
                                } else {
                                    echo '<tr>';
                                }
                                echo '<td>' . $u['username'] . '</td>';
                                echo '<td>' . $u['id_rol'] . '</td>';
                                echo '<td>' . $u['salarioBruto'] . '</td>';
                                echo '<td>' . $u['retencionIRPF'] . '</td>';
                                if ($u['activo'] == 0) {
                                    echo '<td> No </td>';
                                } else {
                                    echo '<td> Si </td>';
                                }

                                echo '</tr>';
                            }
                        }
                        
                        ?>      

                    </tbody>                    
                </table>
            </div>
            <div class="card-footer">
                <nav aria-label="Navegacion por paginas">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="/proveedores?page=1&order=1" aria-label="First">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">First</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="/proveedores?page=2&order=1" aria-label="Previous">
                                <span aria-hidden="true">&lt;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                        <li class="page-item active"><a class="page-link" href="#">3</a></li>   
                        <li class="page-item">
                            <a class="page-link" href="/proveedores?page=4&order=1" aria-label="Next">
                                <span aria-hidden="true">&gt;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="/proveedores?page=8&order=1" aria-label="Last">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Last</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>                        
</div>
<!--Fin HTML -->
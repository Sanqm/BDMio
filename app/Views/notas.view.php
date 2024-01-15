<div class="row">    
    <?php
    if(isset($isOk)){        
        ?>
    <div class="col-12">
        <div class="alert alert-<?php echo $isOk ? 'success' : 'danger'; ?>">
            <?php echo $isOk ? 'Son anagramas' : 'No son anagramas'; ?>
        </div>
    </div>
    <?php
    }    
    ?>
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Notas Alumnos</h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!--<form action="./?sec=formulario" method="post">                   -->
                <form method="post" action="/notas-alumno">  
                    <div class="mb-3">
                        <label for="txtaNotas">Notas Alumnos :</label> 
                        <textarea class="form-control" id="txtaNotas" name="txtaNotas" placeholder="Notas" value="hola" ></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>                        
</div>

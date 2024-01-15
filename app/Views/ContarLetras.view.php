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
                <h6 class="m-0 font-weight-bold text-primary">Contar letras</h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!--<form action="./?sec=formulario" method="post">                   -->
                <form method="post" action="/contar-letras">  
                    <div class="mb-3">
                        <label for="palabraContar">Palabra a Contar :</label> 
                        <input class="form-control" id="palabraContar" type="text" name="palabraContar" placeholder="Palabra a contar 1" value="<?php echo isset($input['palabraContar']) ? $input['palabraContar'] : ''; ?>">                        
                        <p class="text-danger"><?php echo isset($errores['palabraContar']) ? $errores['palabraContar'] : ''; ?></p>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>                        
</div>

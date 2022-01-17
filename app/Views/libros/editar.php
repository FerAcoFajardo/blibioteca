<?= $header?>

    

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Ingresar datos del libro</h5>
            <p class="card-text">
                <!-- Formulario de creación -->
                <form action="<?=base_url('/actualizar')?>" method="post" enctype="multipart/form-data">


                    <input type="hidden" name="id" value="<?=$libro['id']?>">


                    <div class="mb-3">
                        <label for="nombre">Nombre:</label>
                        <input type="text" value="<?=$libro['nombre']?>" name="nombre" id="nombre" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="imagen">Imagen:</label>
                        <br>
                        <img src="<?=base_url('')?>/uploads/<?=$libro['imagen'];?>" alt="Portada.jpg" class="img-thumbnail" width="100">
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>


                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <input type="reset" class="btn btn-secondary" value="Limpiar">
                    </div>

                </form>
            </p>
        </div>
    </div>

<?= $footer?>
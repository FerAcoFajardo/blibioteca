<?= $header?>
    <div>
        <a href="<?=base_url('crear')?>" class="btn btn-secondary">Crear un libro</a>
        <!-- Mostrar los registros de libros -->
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($libros as $libro): ?>
                <tr>
                    <td><?=$libro['id'];?></td>
                    <td><img src="<?=base_url('')?>/uploads/<?=$libro['imagen'];?>" alt="Portada.jpg" class="img-thumbnail" width="100"></td>
                    <td><?=$libro['nombre'];?></td>
                    <td>
                        <a href="<?=base_url('editar/'.$libro['id']);?>" class="btn btn-primary">Editar</a>
                        <a href="<?=base_url('borrar/'.$libro['id']);?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    

<?= $footer?>
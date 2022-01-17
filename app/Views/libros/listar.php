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
                    <td><img src="<?=$libro['imagen'];?>" width="100" height="100"></td>
                    <td><?=$libro['nombre'];?></td>
                    <td>
                        Editar/Eliminar
                    </td>
                </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    

<?= $footer?>
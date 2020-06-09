<?php
require_once '../modelos/materiales.php';

?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $materiales = new Materiales;
        $materiales = $materiales->mostrarMateriales();
        foreach ($materiales as $material) { ?>
            <tr>
                <td><?= $material[0]; ?></th>
                <td><?= $material[1]; ?></th>
                <td><?= $material[2]; ?></th>
                <td><?= $material[3]; ?></th>
                <td>
                    <span class="btn btn-danger badge" onclick="eliminar(<?= $material[0]; ?>)">Eliminar</span>
                    <span class="btn btn-warning badge" onclick="llenarFormEditar(<?= $material[0]; ?>)" data-toggle="modal" data-target="#formEditar">Editar</span>

                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>
<?php

/*
Pienso que estos inicio de sesión no deben ir aquí. No se debe entrar en esta página si el ingreso es incorrecto. Parpadeo en la pantalla.
*/

if (isset($_SESSION["validarIngreso"])){

	if($_SESSION["validarIngreso"] != "ok") {

		echo '<script>window.location = "index.php?pagina=ingreso";</script>';

		return;

	}

} else {

		echo '<script>window.location = "index.php?pagina=ingreso";</script>';

		return;

	}

$usuarios = ControladorFormularios::ctrSeleccionarRegistros();

?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach ($usuarios as $key => $value): ?>



        <tr>
            <td><?php echo $value["nombre"]; ?></td>
            <td><?php echo $value["email"]; ?></td>
            <td><?php echo $value["fecha"]; ?></td>

            <td>
                <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                </div>
            </td>

        </tr>

        <?php endforeach ?>

    </tbody>
</table>
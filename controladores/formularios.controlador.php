<?php

class ControladorFormularios{

	/*=============================================
	Registro
	=============================================*/

	static public function ctrRegistro(){

		if(isset($_POST["registroNombre"])){

			$tabla = "registros";

			$datos = array(
							"nombre"=> $_POST["registroNombre"],
							"email"=> $_POST["registroEmail"],
							"password"=> $_POST["registroPassword"]);

			$respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);

			return $respuesta;
		}

	}


	       /*=======================================================
			  Seleccionar registros
			 =======================================================*/
		
	static public function ctrSeleccionarRegistros(){

		$tabla = "registros";

		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, null, null);

		return $respuesta;

	}


	/*=======================================================
	  Ingreso
	=======================================================*/
		
	public function ctrIngreso(){

		if(isset($_POST["ingresoEmail"])){

			$tabla = "registros";
			$item = "email";
			$valor = $_POST["ingresoEmail"];


			$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

			if ($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $_POST["ingresoPassword"]){

				// Activamos la variable de sesión

			$_SESSION["validarIngreso"] = "ok";

				echo '<script>

				if ( window.history.replaceState ) {

					window.history.replaceState( null, null, window.location.href );

				}

				window.location = "index.php?pagina=inicio";

			</script>';

			} else {

				echo '<script>

				if ( window.history.replaceState ) {

					window.history.replaceState( null, null, window.location.href );

				}

			</script>';

			echo '<div class="alert alert-danger">Error al ingresar al sistema</div>';

			}


		}
		
	}

}
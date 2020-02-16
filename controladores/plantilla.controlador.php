<?php

class ControladorPlantilla
{

	/*=============================================
	Llamada a la plantilla
	=============================================*/

	public function ctrTraerPlantilla()
	{

		#include() Se utiliza para invocar el archivo que contiene código html-php.
		include "vistas/plantilla.php";
	}

	/*=======================================================
	 Compruebo que no se está entrando en "inicio" sin haberse registrado. 
	=======================================================*/

	public function ctrTraerPagina()
	{

		#ISSET: isset() Determina si una variable está definida y no es NULL
		if (isset($_GET["pagina"])) {

			if (
				$_GET["pagina"] == "registro" ||
				$_GET["pagina"] == "ingreso" ||
				$_GET["pagina"] == "salir"
			) {

				// include "paginas/".$_GET["pagina"].".php";
				$pagina = $_GET["pagina"];

				return $pagina;
			} elseif (
				$_GET["pagina"] == "inicio" &&
				$_SESSION["validarIngreso"] == "ok"
			) {
				$pagina = $_GET["pagina"];

				return $pagina;
			} else {

				// Si no se ha iniciado sesión y $_GET["pagina"] != inicio no entra en la página inicio.
				$pagina = $_POST["ultimaPagina"];

				return $pagina;
			}
		}
	}
}

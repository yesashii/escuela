<?php

/*
|--------------------------------------------------------------------------
| CAMPOS QUE ESTAN EN LA TABLA USERS
|--------------------------------------------------------------------------
|   identifier  : Este campo guarda el rut completo (11111111-1).
|   first_name  : Este campo guarda el nombre o los nombres.
|   last_name   : Este campo guarda el apellido o los apellidos.
|   email       : Este campo guarda el correo elect�nico.
|   password    : Este campo guarda la contrase�a.
|   city_id     : Este campo guarda el id de la tabla cities.
|   active      : Este campo indica si el usuario esta activo: 1 o si est� inactivo: 0.
|   city_id     : Este campo guarda el id de la tabla cities.
|
|
*/

/*
|--------------------------------------------------------------------------
| REFERENCIAS DE LAS CLAVES  (CLAVE) => (VALOR)
|--------------------------------------------------------------------------
|   i   	: Para todos los tipos de imputs.
|   l   	: Para todos los tipos de labels.
|   isd 	: Para los valores por defecto de un select. (ej: ingrese ciudades)
|   cl  	: para un label o texto de un check.
|   tit 	: para un t�tulo de la vista (tit_nombreDeLaVista)
|   ph 		: para un placeholder de un input text.
|   btn		: para un boton.
|   th		: para un titulo de una columna de una tabla.
|   msj		: para un mensaje.
|   tt		: para un tooltip.
|   tp		: para un titulo de un panel.
|   jal		: para un alerta de javascript.
|   lvm		: para el lavel de ver mas .
|
|
*/


// {{ trans('mantLvDepartamentos.xxxxxxxxxx') }}
return[
	'tit_listarNivelDepartamentos'	=> 'Mantenedor de niveles de departamentos',
	
	'l_level'						=> 'Nivel',
	
	'isd_level'						=> 'Seleccione un nivel',
	
	'btn_buscar'					=> 'Buscar',
	'btn_nuevo'						=> 'Nuevo',
	'btn_salir'						=> 'Salir',
	
	'th_level'						=> 'Nivel',	
	'th_accion'						=> 'Acción',

	'msj_no_encontrado'				=> 'No se encontraron resultados.',

	'tt_Editar'						=> 'Editar',	
	'tt_ver_mas'					=> 'Ver más',
	'tt_Eliminar'					=> 'Eliminar',	
	
	'jal_confirm_elmnar_level'		=> 'Se eliminará el nivel: ',
	
	
	

];

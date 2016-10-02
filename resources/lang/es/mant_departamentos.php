<?php

/*
|--------------------------------------------------------------------------
| CAMPOS QUE ESTAN EN LA TABLA USERS
|--------------------------------------------------------------------------
|   identifier  : Este campo guarda el rut completo (11111111-1).
|   first_name  : Este campo guarda el nombre o los nombres.
|   last_name   : Este campo guarda el apellido o los apellidos.
|   email       : Este campo guarda el correo elect?nico.
|   password    : Este campo guarda la contrase?a.
|   city_id     : Este campo guarda el id de la tabla cities.
|   active      : Este campo indica si el usuario esta activo: 1 o si est? inactivo: 0.
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
|   tit 	: para un título de la vista (tit_nombreDeLaVista)
|   ph 		: para un placeholder de un input text.
|   btn		: para un boton.
|   th		: para un titulo de una columna de una tabla.
|   msj		: para un mensaje.
|   tt		: para un tooltip.
|   tp		: para un titulo de un panel.
|   jal		: para un alerta de javascript.
|   lvm		: para el lavel de ver mas .
|   li		: para los <li> .
|
|
*/

// {{ trans('mant_departamentos.xxxxxxxxxx') }}

return[
    'tit_listar'		    => 'Mantenedor de departamentos',
	'tit_Ingresar'		    => 'Ingresar de departamentos',
	
	'l_departamento'		=> 'Nombre del departamento',
	'l_nivel'				=> 'Nivel del departamento',
	
	'btn_nuevo'				=> 'Nuevo departamento',
	'btn_salir'				=> 'Salir',
	'btn_buscar'			=> 'Buscar',
	'btn_volver'			=> 'Volver',
	'btn_guardar'			=> 'Guardar',
	
	'ph_name'				=> 'Ingrese nombre',
	
	'tp_datos_departamento'	=> 'Datos del departamento',		
	
	'th_name'				=> 'Nombre',
	'th_level'				=> 'Nivel',
    'th_accion'				=> 'Acción',
	
	'isd_level'						=> 'Todos los niveles',
    'isd_level2'					=> 'Seleccione un nivel',
	
	'tt_Editar'						=> 'Editar',
    'tt_ver_mas'					=> 'Ver más',
    'tt_Eliminar'					=> 'Eliminar',
	
	'msj_no_encontrado'					=> 'Sin resultados',
	'msj_name_required'					=> 'Necesitamos conocer el nombre del departamento.',
	'msj_levelDepartments_id_required'	=> 'Necesitamos conocer el nivel del departamento.',
	'msj_departamento_ingresado'		=> 'El cargo ha sido ingresado correctamente.',
];














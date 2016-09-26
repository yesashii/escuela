<?php

/*
|--------------------------------------------------------------------------
| CAMPOS QUE ESTAN EN LA TABLA USERS
|--------------------------------------------------------------------------
|   identifier  : Este campo guarda el rut completo (11111111-1).
|   first_name  : Este campo guarda el nombre o los nombres.
|   last_name   : Este campo guarda el apellido o los apellidos.
|   email       : Este campo guarda el correo electónico.
|   password    : Este campo guarda la contraseña.
|   city_id     : Este campo guarda el id de la tabla cities.
|   active      : Este campo indica si el usuario esta activo: 1 o si está inactivo: 0.
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
|
|
*/

// {{ trans( 'mantCargos.xxxxxxxxx' ) }}


/*
return[
	'tit_listarUsuario'				=> 'Mantenedor de usuarios',
	'tit_ingresarUsuario'			=> 'Ingresar nuevo usuario',
	'tit_actualizarUsuario'			=> 'Actualizar usuario',
	'tit_verUsuario'				=> 'Detalle del usuario',	
			
	'l_first_name'					=> 'Nombre',
	'l_last_name'					=> 'Apellido',
	'l_email'						=> 'Correo electrónico',
	'l_identifier'					=> 'RUT',
	'l_country'						=> 'País',
	'l_city'						=> 'Ciudad',
			
	'ph_first_name'					=> 'Ingrese nombre',		
	'ph_last_name'					=> 'Ingrese nombre',	
	'ph_email'						=> 'Ingrese su correo electrónico',	
	'ph_identifier'					=> 'Ingrese un RUT ej: 12344567-9',	
		
	'btn_buscar'					=> 'Buscar',
	'btn_nuevo'						=> 'Nuevo',
	'btn_salir'						=> 'Salir',
	'btn_volver'					=> 'Volver',
	'btn_guardar'					=> 'Guardar',
	'btn_pass_reset'				=> 'Reestablecer contraseña',
			
	'th_first_name'					=> 'Nombre',	
	'th_last_name'					=> 'Apellido',	
	'th_email'						=> 'Correo electrónico',
	'th_identifier'					=> 'RUT',	
	'th_cities_name'				=> 'Ciudad',
	'th_countries_name'				=> 'País',	
	'th_accion'						=> 'Acción',
		
	'msj_no_encontrado'				=> 'No se encontraron resultados.',	
	'msj_identifier_requerido'		=> 'Nesesitamos conocer el RUT del usuario.',
	'msj_email_requerido'			=> 'Nesesitamos conocer el correo electrónico del usuario.',
	'msj_first_name_requerido'		=> 'Nesesitamos conocer el nombre del usuario.',
	'msj_last_name_requerido'		=> 'Nesesitamos conocer el apellido del usuario.',
	'msj_city_id_requerido'			=> 'Nesesitamos conocer la ciudad del usuario.',
	'msj_roles_requerido'			=> 'Ingrese al menos un rol.',
	'msj_positions_requerido'		=> 'Ingrese al menos un cargo.',	
	'msj_departments_requerido'		=> 'Ingrese al menos un departamento.',	
	'msj_identifier_unique'			=> 'El RUT ingresado, ya existe.',
	'msj_identifier_invalid'		=> 'El RUT ingresado, no es válido.',	
	'msj_usuario_ingresado_ok'		=> 'El usuario ha sido correctamente ingresado.',
	'msj_usuario_actualizado_ok'	=> 'El usuario ha sido correctamente actualizado.',	
	'msj_reset_pass_ok'				=> 'La contraseña ha sido restablecida correctamente.',	
		
	'jal_confirm_elmnar_user'		=> 'Se eliminará el usuario: ',
		
	'tt_Editar'						=> 'Editar',	
	'tt_ver_mas'					=> 'Ver más',
	'tt_Eliminar'					=> 'Eliminar',
		
		
		
	'tp_datos_personales'			=> 'Datos personales',
	'tp_roles'						=> 'Roles',	
	'tp_cargos'						=> 'Cargos',
	'tp_departamentos'				=> 'Departamentos',
		
		
	'isd_country'					=> 'Seleccione un país',	
	'isd_city'						=> 'Seleccione una ciudad',
	
	'lvm_first_name'				=> 'Nombre',
	'lvm_last_name'					=> 'Apellido',
	'lvm_email'						=> 'Correo electrónico',
	'lvm_identifier'				=> 'RUT',
	'lvm_country'					=> 'País',
	'lvm_city'						=> 'Coudad',
	'lvm_roles'						=> 'Roles',	
	'lvm_positions'					=> 'Cargos',	
	'lvm_departments'				=> 'Departamentos',		
	
	
	

];
*/
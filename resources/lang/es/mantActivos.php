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

// {{ trans( 'mantActivos.xxxxxxxxx' ) }}
return[
	
	'tit_listarActivo'				=> 'Mantenedor de activos',
    'tit_actualizarActivo'		    => 'Actualizar activo',
    'tit_verActivo'		            => 'Detalle del activo',
	
	'btn_nuevo'						=> 'Nuevo activo',
	'btn_salir'						=> 'Salir',
	'btn_buscar'					=> 'Buscar',
	'btn_volver'					=> 'Volver',
    'btn_guardar'					=> 'Guardar',

    'l_code'                        => 'Código',
    'l_name'						=> 'Nombre',
    'l_description'                 => 'Descripción',
    'l_supplier'                    => 'Proveedor',
	
	'th_code'						=> 'Código',
	'th_name'						=> 'Nombre',
	'th_supplier_id'				=> 'Proveedor',
	'th_state_asset_id'				=> 'Estado',
	'th_accion'						=> 'Acción',
	
	'ph_code'						=> 'Ingrese código',
	'ph_name'						=> 'Ingrese nombre',
	
	'isd_supplier_id'				=> 'Todos',
	'isd_state_asset_id'			=> 'Todos',
	
	'msj_no_encontrado'				=> 'No se encontró ningún activo',
	
	'tt_Editar'						=> 'Editar',	
	'tt_ver_mas'					=> 'Ver más',
	'tt_Eliminar'					=> 'Eliminar',
	
	'jal_confirm_elmnar_asset'		=> 'Se eliminará el activo: ',

    'tp_activos'				    => 'Datos del activo',

    'msj_code_requerido'            => 'El activo necesita un código.',
    'msj_name_requerido'            => 'El activo necesita un nombre.',
    'msj_description_requerido'     => 'El activo necesita una descripción.',
    'msj_asset_actualizado_ok'      => 'El activo ha sido actualizado correctamente.',

    'lvm_code'                      => 'Código',
    'lvm_name'                      => 'Nombre',
    'lvm_description'               => 'Descripción',
    'lvm_supplier'                  => 'Proveedor',
    'lvm_available'                 => 'Disponibilidad',
    'lvm_state'                     => 'Estado',
    'lvm_purchase'                  => 'Id de la compra',
    'lvm_fecha_purchase'            => 'Fecha de compra',

    'val_disponible'                => 'disponible.',
    'val_no_disponible'             => 'no disponible.',
];

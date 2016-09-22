@extends('layouts.principal')

@section('titulo')
    {{ 'Ingresar compra' }}
@endsection




@section('contenido')
<h1>Ingresar compra</h1>

    <form action="#" method="post">
        {{ csrf_field() }}

        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
            <label for="country_id">Categoría</label>
            <select class="form-control" name="country_id" id="country_id"  >
                <option selected disabled>Seleccione una categoría</option>
                <option  value="1">Hardware</option>
                <option  value="2">Software</option>
            </select>

        </div>

        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
            <label for="identifier">Nombre</label>
            <input type="text" class="form-control" name="identifier" id="identifier" value="">
        </div>

        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
            <label for="comment">Comment:</label>
            <textarea class="form-control" rows="5" id="comment" placeholder="Observaciones"></textarea>
        </div>

        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
            <label for="country_id">Proveedor</label>
            <select class="form-control" name="country_id" id="country_id"  >
                <option selected disabled>Seleccione un proveedor</option>
                <option  value="1">Pc Factory</option>
                <option  value="2">Persa bio bio</option>
            </select>

        </div>




        <div class="container">
            <p class="row" >
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-primary">Salir</button>
            </p>
        </div>

    </form>


<div class="container">
    <table class="table table-striped col-sm-6 col-xs-12">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Comentario</th>
            <th>Código</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ 'Monitor'               }}</td>
            <td>{{ 'Marca: Acme, Modelo: cara de maso'       }}</td>
            <td>{{ 'EE654F'    }}</td>
        </tr>
        </tbody>
    </table>

</div>

<div class="container">
    <p class="row" >
        <button type="button" class="btn btn-primary">Finalizar</button>
    </p>
</div>

    <h3>Notas:</h3>
    <ul>
        <li>Crear tabla de categorias de activos.</li>
        <li>Crear el mantenedor de categorias.</li>
        <li>Al generar el código, verificar si existe, si es así generar otro.</li>
        <li>el estado se guardará como "Nuevo".</li>
        <li>Em mantenedor de activo, sólo debe tener el buscar , ver, actualizar (estado: extraviado por usuario, si lo recupera estado asignado).</li>
        <li>Crear funcionalidad dar de baja activo.</li>
        <li>un estado debe ser extraviado y otro extraviado por el usuario (este último se ingresa en la entrega).</li>
    </ul>
@endsection
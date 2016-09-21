@extends('layouts.principal')

@section('titulo')
    {{ 'Asignar activo' }}
@endsection


@section('contenido')
<h1>Pepe de los palos</h1>

    <br/><br/>

<!--inicio formulario-->
<form action="#" method="post">
    {{ csrf_field() }}

    <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
        <label for="country_id">Categoría</label>
        <select class="form-control" name="country_id" id="country_id" onchange="cargaComboCiudad('../cargaCiudadUsuario/'+this.value)" >
            <option selected disabled>Seleccione una categoría</option>
            <option  value="1">Hardware</option>
            <option  value="2">Software</option>
        </select>

    </div>
    <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
        <label for="country_id">Activo</label>
        <select class="form-control" name="country_id" id="country_id" onchange="cargaComboCiudad('../cargaCiudadUsuario/'+this.value)" >
            <option selected disabled>Seleccione un activo</option>
            <option  value="1">Computador</option>
            <option  value="2">Office</option>
        </select>

    </div>

    <div class="form-group">
        <label for="comment">Comment:</label>
        <textarea class="form-control" rows="5" id="comment" placeholder="Observaciones"></textarea>
    </div>

    <div class="container">
        <table class="table table-striped col-sm-6 col-xs-12">
            <thead>
            <tr>
                <th>Activo</th>
                <th>Código</th>
                <th>Observación</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ 'Computador'             }}</td>
                <td>{{ 'EF2573'                 }}</td>
                <td>{{ 'Se entrega nuevo'       }}</td>
                <td> <input class="btn-default" type="button" onclick='window.location ="{{ url("asignarActivo") }}"' value="Cancelar"> </td>
            </tr>
            </tbody>
        </table>

    </div>


    <!--botones-->
    <div class="row col-sm-12 padding col-xs-12  margenes-botones">
        <input type="button" class="btn btn-warning "  value="Guardar y seguir">
        &nbsp;
        <input type="submit" class="btn btn-primary " value="Guardar y finalizar">
        &nbsp;
        <input type="button" class="btn btn-primary "  value="Volver">
    </div>
    <div class="row"> </div><hr/>
    <!-- fin botones-->

</form>
<!-- fin formulario-->
<h3>Notas:</h3>
<ul>
    <li>Crear tabla de histórico de entrega, tal cual como existe la asignación.</li>
    <li>Crear el buscador de asignaciones.</li>
    <li>Crear la vista del detalle de la asignación. que se desplega justo despues de guardar y finalizar.</li>
</ul>
@endsection
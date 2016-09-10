@extends('mantenedores_dev.layouts.ingresar')

@section('titulo')
    {{ 'usuarios' }}
@endsection

@section('formularioIngreso')


    <form action="{{ url("grabarUsuario") }}" method="post">

        {{ csrf_field() }}


        <label for="identifier">Rut</label>
        <input type="text" name="identifier" id="identifier"><br/><br/>
        <label for="first_name">Nombre</label>
        <input type="text" name="first_name" id="first_name"><br/><br/>
        <label for="last_name">Apellido</label>
        <input type="text" name="last_name" id="last_name"><br/><br/>
        <label for="email">Email</label>
        <input type="email" name="email" id="email"><br/><br/>
        <label for="country_id">País</label>
        <select name="country_id" id="country_id" onchange="cargaComboCiudad('cargaCiudadUsuario/'+this.value)">
            <option selected disabled>Seleccione un país</option>
            @foreach( $paises as $pais )
                <option value="{{ $pais->id }}">{{ $pais->name }}</option>
            @endforeach
        </select><br/><br/>



        <div id="comboCiudad">
            <label for="city_id">Ciudad</label>
            <select name="city_id" id="city_id">
                <option selected disabled>Seleccione una ciudad</option>
            </select><br/><br/>
        </div>


        ROLES:<br/>
        @foreach($roles as $rol)
            <input type="checkbox" name="roles[]" id="{{ $rol->id }}" value="{{ $rol->id }}"> {{ $rol->name }}
        @endforeach
        <hr/>

        CARGOS;<br/>
        @foreach($positions as $position)
                <input type="checkbox" name="positions[]" value="{{ $position->id }}"> {{ $position->name }}
        @endforeach
        <hr/>

        Departamentos;<br/>
        @foreach($departments as $department)
                <input type="checkbox" name="departments[]" value="{{ $department->id }}"> {{ $department->name }}
        @endforeach
        <hr/>



        <input type="submit" value="Guardar">
        <input type="button" onclick='window.location ="{{ route("listarUsuaios") }}"' value="Volver">



    </form>

@endsection
@extends('mantenedores_dev.layouts.ingresar')

@section('formularioIngreso')

    <br/><br/><br/>

    <input type="button" onclick='window.location ="{{ url("restablecerContrasenia/".$usuario->id) }}"' value="restablecer contraseña">

    <br/><hr/><hr/><br/>


    <form action="{{ url("actualizarUsuario/".$usuario->id) }}" method="post">

        {{ csrf_field() }}


        <label for="identifier">Rut</label>
        <input type="text" name="identifier" id="identifier"    value="{{ $usuario->identifier }}"><br/><br/>
        <label for="first_name">Nombre</label>
        <input type="text" name="first_name" id="first_name"    value="{{ $usuario->first_name }}"><br/><br/>
        <label for="last_name">Apellido</label>
        <input type="text" name="last_name" id="last_name"      value="{{ $usuario->last_name }}"><br/><br/>
        <label for="email">Email</label>
        <input type="email" name="email" id="email"             value="{{ $usuario->email }}"><br/><br/>


        <label for="country_id">País</label>
        <select name="country_id" id="country_id" onchange="cargaComboCiudad('../cargaCiudadUsuario/'+this.value)" >
            <option selected disabled>Seleccione un país</option>
            @foreach( $paises as $pais )
                @if( $pais->id == $id_pais)
                    <option selected value="{{ $pais->id }}">{{ $pais->name }}</option>
                @else
                    <option value="{{ $pais->id }}">{{ $pais->name }}</option>
                @endif
            @endforeach
        </select><br/><br/>



        <div id="comboCiudad">
            <label for="city_id">Ciudad</label>
            <select name="city_id" id="city_id">
                <option selected disabled>Seleccione una ciudad</option>
                @foreach($ciudades_del_pais as $ciudad)
                    @if( $ciudad->id == $id_ciudad)
                        <option selected value='{{ $ciudad->id }}'>{{ $ciudad->name }}</option>
                    @else
                        <option value='{{ $ciudad->id }}'>{{ $ciudad->name }}</option>
                    @endif
                @endforeach
            </select><br/><br/>
        </div>

        ROLES:<br/>
        @foreach($roles as $rol)
                @if( isset( $usuario->roles->find($rol->id)->id ) )
                    <input type="checkbox" name="roles[]" id="{{ $rol->id }}" value="{{ $rol->id }}" checked >{{ $rol->name }}
                @else
                    <input type="checkbox" name="roles[]" id="{{ $rol->id }}" value="{{ $rol->id }}">{{ $rol->name }}
                @endif

        @endforeach
        <hr/>

        CARGOS;<br/>
        @foreach($positions as $position)
            @if( isset( $usuario->positions->find($position->id)->id ) )
                <input checked type="checkbox" name="positions[]" value="{{ $position->id }}">{{ $position->name }}
            @else
                <input type="checkbox" name="positions[]" value="{{ $position->id }}">{{ $position->name }}
            @endif



        @endforeach
        <hr/>

        Departamentos;<br/>
        @foreach($departments as $department)
            @if( isset( $usuario->departments->find($department->id)->id ) )
                <input checked type="checkbox" name="departments[]" value="{{ $department->id }}">{{ $department->name }}
            @else
                <input type="checkbox" name="departments[]" value="{{ $department->id }}">{{ $department->name }}
            @endif

        @endforeach
        <hr/>

        <input type="submit" value="Guardar">
        <input type="button" onclick='window.location ="{{ route("listarUsuario") }}"' value="Volver">



    </form>

@endsection

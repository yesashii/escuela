<label for="city_id">{{ trans('mantusuarios.l_city') }}</label>
    <select class="form-control" name="city_id" id="city_id">
        <option selected disabled>{{ trans('mantusuarios.isd_city') }}</option>
        @foreach($ciudades as $ciudad)
            <option value='{{ $ciudad->id }}'>{{ $ciudad->name }}</option>
        @endforeach
    </select>




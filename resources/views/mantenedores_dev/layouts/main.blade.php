<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<div id="buscador"> @yield('buscador') </div> <hr/> <br/><br/>



<div id="grilla">
    <table border="1">
        @yield('filas')
    </table>

</div>

</body>
</html>
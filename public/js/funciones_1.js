$(document).ready(function()
{
   // $('[data-toggle="tooltip"]').tooltip();
});

function cargaComboCiudad(url)
{
    var url = url;
    $.ajax({
        async:true,
        type: "GET",
        contentType: "application/x-www-form-urlencoded",
        url: url,
        success:cargaCombo,
        //timeout:10000,
        error:problemas
    });
}

function cargaCombo(datos)
{
    var x = $("#comboCiudad");
    x.html(datos);
}
function problemas()
{
    $("#comboCiudad").text('Problemas en el servidor.');
    return false;
}





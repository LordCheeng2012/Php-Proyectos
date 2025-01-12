
var consulta = window.location.search;

function ObtenerParametro(PARAMETRO, URL) {
if (!URL)
PARAMETRO = PARAMETRO.replace(/[\[\]]/g, "\\$&");
var Expresion = new RegExp("[?&]" + PARAMETRO + "(=([^&#]*)|&|#|$)");
var resultado = Expresion.exec(URL);
if (!resultado) {
return null;
}
if (!resultado[2]) {
return '';
}

return decodeURIComponent(resultado[2].replace(/\+/g, " "));
}

var ParametroExtraido = ObtenerParametro('valor', consulta);

if (ParametroExtraido == null) {
console.log("parametro vacio"+ParametroExtraido);
} else {
if (ParametroExtraido == 2) {

}
if (ParametroExtraido == 0) {
alert("Ocurrió un error en la llamada al método");
}
if (ParametroExtraido == 1) {
console.log("correcto");
}
if (ParametroExtraido == 4) {
var mensaje = ObtenerParametro('mensaje', consulta);

} else {
console.log("Evento desconocido");
}
}


<?php
error_reporting(0);
//error_Reporting usamos este metodo para suprimir las advertencias innesarias y manejarlos nosotros
//Aqui es donde crearemos la conexion a la bd este archivo es vital
//para todos los procesos que usaremos en futuro  ya que usaremos la variable cocnexion 
// que crearemos aca , ya que es la que contiene la conexion
// -- Usaremos los siguientes datos
//Localhost-- es el nombre por defecto que se le pone al servidor 
//root-- es el usuario por defecto que se le pone al servidor
//mysql-- es el nombre por defecto que se le pone a la base de datos
//'' -- la contrasña que por defecto es vacia
// Nombre de la bd a conectar -- es el nombre de  la bd creada en phpmyadmin
//implementar la conexion

//Creamos la variable conexion-- es la que contendra el objeto mysql dicho objeto nos 
//permitira realizar las consultas a la base de datos 
//tener en cuenta * la bd si sufre alguna alteracion de 
//su nombre debera ser editada este archivo*
$ObjetoConexion=mysqli_connect('localhost','root','','webpaciente');
//por ahora son los parametros que nesesitamos para conectarnos , ahora 
//este metodo tiene 2 respuestas --
//si se ah conectado retorna un objeto mysqli dicho objeto es indispensable para usar los demas
//metodos de la clase mysqli que requieran consultar a la bd ,
//ya que como parametro  principal
//deben recibir un objeto mysqli
//**SI NO SE AH CONECTADO OH Hubo algun fallo este metodo retornara False ,
//como valor booleano indicando que hubo un error , ya sea cualquier error se obtienen con el
//metodo connect_Error para saber que lo ocasiono  */
//----Verificamos respuestas--
if ($ObjetoConexion==false) {
    # si hubo un error en el metodo entonces se obtiene la rason que lo ocasiono
    echo "Error en la conexion Razon : ".mysqli_connect_error();
}else {
    # si el metodo retorno otro valor fuera de lo evaluado en el if ,
    # entonces se ha conectado correctamente
    echo '<script>
    console.log("Conexion exitosa");
</script>';
}
##SI TODO FUNCIONO ENTONCES EL SCRIPT DE LA CONEXION ESTA LISTO PARA USAR
?>


<?php

            //llamar al metodo
            if (isset($_POST["BUSCAR"])) {
                  //LLAMAR AL METODO EH IMPRIMIR EL RESULTADO
                  //pasar los parametros 
                 
                  $ListaRegistro=$Negocio->ListarRegistros($_POST["Destino1"],$_POST["Destinatario"],$_POST["Remitente"],
                  $_POST["Fecha_Envio"],$_POST["Fecha_Recepcion"]);
                    if (is_array($ListaRegistro)) {
                      $cont=0;
                        //si esto es cierto debemos iterar sobre el array porque  no sabemos cuantos elementos tiene , ademas 
                        //tiene muchos valores con las mismas claves
                       foreach ($ListaRegistro as $Resultados) {   
                         
                ?>
                <tbody>
                <tr>
                  <td><?php echo $Resultados['N_ORDEN']; ?>  </td>
                    <td> <?php echo $Resultados['Remitente'];  ?>  </td>
                    <td> <?php echo $Resultados['DESTINATARIO'];  ?>  </td>
                    <td> <?php echo $Resultados['hora_envio'];  ?>  </td>
                    <td> <?php echo $Resultados['Estado'];  ?>  </td>
                    <td> <?php echo $Resultados['DESTINO'];  ?>  </td>
                    <td> <?php echo $Resultados['hora_entrega'];  ?>  </td>
                    <td> <?php echo $Resultados['CATEGORIA'];  ?>  </td>
                    <td> <?php echo $Resultados['PRECIO'];  ?>  </td>
                    <td> <?php echo $Resultados['FECHAENVIO'];  ?>  </td>
                    <td> <?php echo $Resultados['Fecha_entrega'];  ?> </td>
                    
                    <td> <div  class="Detalles-Opciones">
                       <button  onclick="Activar(<?php echo $cont ?>)" class="Detalles">
                        <i class="material-icons"> list</i> 
                      </button>
                          <div id="<?php echo('Opcion'.strval($cont)) ?>" class="Options" >
                        <button type="button" id="btnActiEdit"  onclick="ModalEdit(0)" class="ListOption" >
                        <label>Editar <br> <i class="material-icons"> edit</i></label></button>
                        <button type="button" class="ListOption" >Confirmar-Resepcion</button>
                        <button type="button" class="ListOption" >Acerca de este Envio</button>
                        <button type="button" onclick="EliminarRegistro(<?php echo $Resultados['N_ORDEN']; ?>)"
                         
                          class="ListOption" >
                           <label>Eliminar <br>
                            <i class="material-icons">
                               delete</i></label></button>
                          </div>
                        </div>
                  </td>
                </tr>
             </tbody>   
             <?php 
              $cont++;
              }
            }else {
              if (is_string($ListaRegistro)) {
                ?>
                  <tbody>
                <tr>
                    <td  colspan="12"> NO HAY RESULTADOS </td>
                </tr>
             </tbody>  
             <?php
              }
            }
            
        }else {
            ?>
             <tbody>
                <tr>
                    <td  colspan="12"> Sin Resultados </td>
                </tr>
             </tbody>  
             <?php  
        }
            ?>
               
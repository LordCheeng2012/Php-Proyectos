
                                //IMPRIR DATOS SEGUN VALOR SELECCIONADO
                                let valor;
                                let texto;
                                let destinoID;
                                var selectedOption;
                                let Nvalor;
                                
                                var seleciona = document.getElementById('seleciona');
                                var doom=document.querySelectorAll('option');
                                //acceder a una propiedad e objeto de node lista (array)
                                // Narraylist[numero de indice].propiedad a buscar
                                console.log(doom[1].innerHTML);
                                
                                var depar=document.getElementById('DEP');
                                //egrega evento de lista cambio "change"
                                 seleciona.addEventListener('change',
                                 //funcion para obtener el lindex seleccionado
                                 function captura(){
                                    window.location.href='REGISTRAR_ENVIOS.PHP?ID= <?php echo $ID;?>';
                                  selectedOption = this.options[seleciona.selectedIndex];
                                  
                                 valor=(selectedOption.value + ': ' + selectedOption.text); 
                                 destinoID=(selectedOption.value);
                                 texto=(selectedOption.text);
                                 console.log(valor);
                                 console.log(destinoID);
                                 console.log(destinoID.length);
                                 console.log(isNaN(destinoID));
                                
                                
                                 //NaN determina si hay numeros 
                                 // ahora substraemosel numero de la cadena 
                                 //usamos replace 
                                 var id =destinoID.replace(/[^0-9]+/g, "")
                                 console.log(id);
                                //probamos 
                               
                                 //filtramos las cadenas usando funciones de cadenas 
                                 //quitamos los espacios 
                                 console.log(texto.trim());
                                 //total de numeros de cadena=47
                                 console.log(texto.length);
                                 //usar substring para mostrar una cierta parte de la cadena 
                                 console.log(texto.substring(0,9))

                                 //imprimir en html usado innerHTML 
                                 //usamos if para mostrar ciertas cadenas largas en determinada ID    
                                 
                                 var dep = document.getElementById('DEP');
                                 var PROV = document.getElementById('PROV');
                                 var DIS = document.getElementById('DIS');
                                 var AG = document.getElementById('AG');
                                
                                           let  Nvalor=document.getElementById("seleciona").value;

            
                                         
                                            
                                                     
                                                               
                                         });     
                                         
                                         
                                                                  
                                    
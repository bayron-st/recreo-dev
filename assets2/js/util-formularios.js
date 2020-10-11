/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



            // Funcion utilizada para menus desplegables de Bootstrap
                    $(document).ready(function(){
                    $('.dropdown-toggle').dropdown();
                    });
          
            // Funcion utilizada para confirmar Eliminar Registros
            function borrarRegistro(modulo, id)
            {
                    var isOK = confirm("Realmente desea eliminar el registro?");
                    if(isOK)
                    {
                           // go("forms/deleteopcioncaracteristicapersonaform.html?id="+url);
                            location.href("borrar" + modulo + "form.html?id="+id);
                    }
            }
            
            // Funcion utilizada para Editar Registros
            function editarRegistro(modulo, id)
            {
                    location.href("editar" + modulo + "form.html?id="+id);
            }


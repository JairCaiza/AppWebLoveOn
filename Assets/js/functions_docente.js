document.addEventListener('DOMContentLoaded', function(){
 
    if(document.querySelector("#formSubirNotas")){
        var formSubirNotas = document.querySelector("#formSubirNotas");
        formSubirNotas.onsubmit = function(e) {
            e.preventDefault();
            var strParcial = document.querySelector('#txParcial').value;
            var strNombreReporte = document.querySelector('#txtNombreArchivo').value;
            var strArchivo= document.querySelector('#txtArchivo').val();
            var intIdDocente = document.querySelector('#txtIdDocente').value;
            if(strParcial == '' || strNombreReporte == '' )
            {
                swal("Atención", "Todos los campos son obligatorios." , "warning");
                return false;
            }  
            if( strArchivo == '' )
            {
                swal("Atención", "El archivo debe  ser cargado en el formulario" , "warning");
                return false;
            } 

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Docente/setNota'; 
            var formData = new FormData(formSubirNotas);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        formSubirNotas.reset();
                        swal("Usuarios", objData.msg, "success");
                    } else {
                        swal("Error", objData.msg, "error");
                    }
                }
            };
        };
    }
   

}, 
false
);
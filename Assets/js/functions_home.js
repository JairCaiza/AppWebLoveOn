var tablaestudiantes;
document.addEventListener('DOMContentLoaded', function(){


    tablaestudiantes = $("#tablaestudiantes").dataTable({
		aProcessing: true,
		aServerSide: true,
		language: {
			url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
		},
		ajax: {
			url: " " + base_url + "/Home/Contarestudiantes",
			dataSrc: "",
		},
		columns: [
          { data: "estudiantes" },
			{ data: "options" },
		],
		resonsieve: "true",
		bDestroy: true,
		iDisplayLength: 10,
		order: [[0, "desc"]],
	});

    
    if(document.querySelector("#formContacto")){
        var formContacto = document.querySelector("#formContacto");
        formContacto.onsubmit = function(e) {
            e.preventDefault();
            var strNombre = document.querySelector('#txtnombres').value;
            var strEmail = document.querySelector('#txtemail').value;
            var strTelefono = document.querySelector('#txttelefono').value;
            var strMensaje = document.querySelector('#txtmensaje').value;

            if(strNombre == '' || strEmail == '' || strTelefono == '' || strMensaje == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }  

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var base_url='http://localhost/AppWebLoveOn/';
            var ajaxUrl = base_url+'Home/setMensajes'; 
            var formData = new FormData(formContacto);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        formContacto.reset();
                        swal("Mensaje", objData.msg, "success");
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
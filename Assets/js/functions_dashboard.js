var tablaNinos;
var tablaMensajes;

document.addEventListener('DOMContentLoaded', function () {
    tablaNinos = $('#tablaNinos').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"

        },
        "ajax": {

            "url": " " + base_url + "/Dashboard/getNinos",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idnin" },
            { "data": "cedula" },
            { "data": "nombres" },
            { "data": "apellidos" },
            { "data": "email" },
            { "data": "direccion" },
            { "data": "institucionedu" },
            { "data": "jornada" },
            { "data": "curso" },
            { "data": "ong" },
            { "data": "alergias" },
            { "data": "enfermedad" },
            { "data": "options" }
        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr": "Copiar",
                "className": "btn btn-secondary"
            }, {
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr": "Esportar a Excel",
                "className": "btn btn-success"
            }, {
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr": "Esportar a PDF",
                "className": "btn btn-danger"
            }, {
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr": "Esportar a CSV",
                "className": "btn btn-info"
            }
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 5,
        "order": [[0, "desc"]]


    });

    tablaMensajes = $('#tablaMensajes').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"

        },
        "ajax": {

            "url": " " + base_url + "/Dashboard/getMensajes",
            "dataSrc": ""
        },
        "columns": [
            { "data": "nombres" },
            { "data": "email" },
            { "data": "telefono" },
            { "data": "mensaje" },
            { "data": "fecha" },
            { "data": "options" }
        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr": "Copiar",
                "className": "btn btn-secondary"
            }, {
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr": "Esportar a Excel",
                "className": "btn btn-success"
            }, {
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr": "Esportar a PDF",
                "className": "btn btn-danger"
            }, {
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr": "Esportar a CSV",
                "className": "btn btn-info"
            }
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 5,
        "order": [[0, "desc"]]


    });


    if(document.querySelector("#foto")){
        var foto = document.querySelector("#foto");
        foto.onchange = function(e) {
            var uploadFoto = document.querySelector("#foto").value;
            var fileimg = document.querySelector("#foto").files;
            var nav = window.URL || window.webkitURL;
            var contactAlert = document.querySelector('#form_alert');
            if(uploadFoto !=''){
                var type = fileimg[0].type;
                var name = fileimg[0].name;
                if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png'){
                    contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';
                    if(document.querySelector('#img')){
                        document.querySelector('#img').remove();
                    }
                    document.querySelector('.delPhoto').classList.add("notBlock");
                    foto.value="";
                    return false;
                }else{  
                        contactAlert.innerHTML='';
                        if(document.querySelector('#img')){
                            document.querySelector('#img').remove();
                        }
                        document.querySelector('.delPhoto').classList.remove("notBlock");
                        var objeto_url = nav.createObjectURL(this.files[0]);
                        document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src="+objeto_url+">";
                    }
            }else{
                alert("No selecciono foto");
                if(document.querySelector('#img')){
                    document.querySelector('#img').remove();
                }
            }
        }
    }
    
    if(document.querySelector(".delPhoto")){
        var delPhoto = document.querySelector(".delPhoto");
        delPhoto.onclick = function(e) {
            removePhoto();
        }
    }

    function removePhoto(){
        document.querySelector('#foto').value ="";
        document.querySelector('.delPhoto').classList.add("notBlock");
        document.querySelector('#img').remove();
    }
// SUbir las noticias
    var formSubirNoticias = document.querySelector("#formSubirNoticias");
	formSubirNoticias.onsubmit = function (e) {
		e.preventDefault();

		var intIdnoticia = document.querySelector('#Idnoticia').value;
		var strNombre = document.querySelector("#txNombreN").value;
		if (strNombre == "" ) {
			swal("Atención", "Todos los campos son obligatorios.", "error");
			return false;
		}

        //divLoading.style.display="flex";
		var request = window.XMLHttpRequest? new XMLHttpRequest(): new ActiveXObject("Microsoft.XMLHTTP");
		var ajaxUrl = base_url + "/Dashboard/setNoticias";
		var formData = new FormData(formSubirNoticias);
		request.open("POST", ajaxUrl, true);
		request.send(formData);
		
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				var objData = JSON.parse(request.responseText);
				if (objData.status) {
					$("#formSubirNoticias").modal("hide");
					formRol.reset();
					swal("Noticia", objData.msg, "success");
				} else {
					swal("Atencion", objData.msg, "warning");
				}
			}
          //  divLoading.style.display="none";
            return false;
			//console.log(request);
		};
	};


}, false);

function openModalNoticias() {
   
    $(".modalFormNoticias").modal("show");
  }

//$("#tablaNinos").DataTable();
//$("#tablaMensajes").DataTable();

function fntDelSms(idsms){
    var btnDelSms= document.querySelectorAll(".btnDelSms");
    btnDelSms.forEach(function (btnDelSms) {
		btnDelSms.addEventListener("click", function () {
            var idSms = idsms;

            swal({
                title: "Eliminar Mensaje",
                text: "¿Realmente quiere eliminar el Mensaje?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, eliminar!",
                cancelButtonText: "No, cancelar!",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function(isConfirm) {
                
                if (isConfirm) 
                {
                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxUrl = base_url+'/Dashboard/delMensaje';
                    var strData = "idSms="+idSms;
                    request.open("POST",ajaxUrl,true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.send(strData);
                    request.onreadystatechange = function(){
                        if(request.readyState == 4 && request.status == 200){
                            var objData = JSON.parse(request.responseText);
                            if(objData.status)
                            {
                                swal("Eliminar!", objData.msg , "success");
                                tablaMensajes.api().ajax.reload(function(){
                                    
                                });
                            }else{
                                swal("Atención!", objData.msg , "error");
                            }
                        }
                    }
                }
        
            });
        
		});
	});
    
   
}
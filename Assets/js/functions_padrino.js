
var tablaApadrinarse;
var tablaApa;
document.addEventListener("DOMContentLoaded", function () {
	tablaApadrinarse = $("#tablaApadrinarse").dataTable({
		aProcessing: true,
		aServerSide: true,
		language: {
			url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
		},
		ajax: {
			url: " " + base_url + "/Padrino/getApadrinarse",
			dataSrc: "",
		},
		columns: [
          { data: "idnin" },
			{ data: "pseudonimo" },
			{ data: "options" },
		],
		resonsieve: "true",
		bDestroy: true,
		iDisplayLength: 10,
		order: [[0, "desc"]],
	});

    tablaApa = $("#tablaApa").dataTable({
		aProcessing: true,
		aServerSide: true,
		language: {
			url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
		},
		ajax: {
			url: " " + base_url + "/Padrino/getApadrinado",
			dataSrc: "",
		},
		columns: [
          { data: "idapadrinado" },
			{ data: "pseudonimo" },
			{ data: "options" },
		],
		resonsieve: "true",
		bDestroy: true,
		iDisplayLength: 10,
		order: [[0, "desc"]],
	});
    if(document.querySelector("#formApadrinar")){
        var formApadrinar = document.querySelector("#formApadrinar");
        formApadrinar.onsubmit = function(e) {
            e.preventDefault();
           
           //var txtPseudonimo = document.querySelector('#txtPseudonimo').value;
           var txtIdnin=document.querySelector("#idUsuario").value ;
           //var txtPseudonimo= document.querySelector("#txtPseudonimo").value;
           var txtidPersona= document.querySelector("#txtidpersona").value ;
            

           

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Padrino/setPadrino'; 
            var formData = new FormData(formApadrinar);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        $("#modalFormApadrinar").modal("hide");
                        formApadrinar.reset();
                        swal("Niño", objData.msg, "success");
                        
                    } else {
                        swal("Error", objData.msg, "error");
                    }
                }
            };
        };
    }
    
});
function openModalApadrinar() {
	
    $("#modalFormApadrinar").modal("show");
    $("#modalformPadrino").modal("hide");
}

function openModalPadrino() {
	
	$("#modalformPadrino").modal("show");
}


function fntApadrinar(idnint){
    $("#modalFormApadrinar").modal("show");
    $("#modalformPadrino").modal("hide");     
    document.querySelector('#titleModal').innerHTML ="Apadrinar Niño";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Apadrinar";

    var idnint =idnint;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Padrino/getPadrino/'+idnint;
    request.open("GET",ajaxUrl,true);
    request.send();
    //console.log(request);
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            var objData = JSON.parse(request.responseText);

            if(objData.status)
            {
                document.querySelector("#idUsuario").value = objData.data.idnin;
                document.querySelector("#txtPseudonimo").value = objData.data.pseudonimo;
                //document.querySelector("#txtidpersona").value = objData.data.idpersona;
            }
        }
    
        $('#modalFormApadrinar').modal('show');
    }


}

function fntDelNino(idnino){
    var btnDelNino= document.querySelectorAll(".btnDelNino");
    btnDelNino.forEach(function (btnDelNino) {
		btnDelNino.addEventListener("click", function () {
            var idUsuario = idnino;

            swal({
                title: "Eliminar Apadrinado",
                text: "¿Realmente quiere eliminar al Apadrinado?",
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
                    var ajaxUrl = base_url+'/Padrino/delApadrinado';
                    var strData = "idUsuario="+idUsuario;
                    request.open("POST",ajaxUrl,true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.send(strData);
                    request.onreadystatechange = function(){
                        if(request.readyState == 4 && request.status == 200){
                            var objData = JSON.parse(request.responseText);
                            if(objData.status)
                            {
                                swal("Eliminar!", objData.msg , "success");
                                tablaApa.api().ajax.reload(function(){
                                    
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
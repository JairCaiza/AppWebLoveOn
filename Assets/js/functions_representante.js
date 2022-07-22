

var tablaRepresentado;
document.addEventListener('DOMContentLoaded', function () {
    tablaRepresentado = $('#tablaRepresentado').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"

        },
        "ajax": {

            "url": " " + base_url + "/Representante/getNinos",
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

    var formRepresentado = document.querySelector("#formRepresentado");
    formRepresentado.onsubmit = function (e) {
        e.preventDefault();
        var strCedula = document.querySelector('#txtCedula').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strApellido = document.querySelector('#txtApellido').value;
        var strFechaNacimiento = document.querySelector('#txtFechaNacimiento').value;
        var strDireccion = document.querySelector('#txtDireccion').value;
        var strEmail = document.querySelector('#txtEmail').value;
        var strInsEdu = document.querySelector('#txtInsEdu').value;
        var strJornada = document.querySelector('#txtJornada').value;
        var strCurso = document.querySelector('#txtCurso').value;
        var strOng = document.querySelector('#txtong').value;
        var strAlergias = document.querySelector('#txtalergias').value;
        var strEnfermedad = document.querySelector('#txtenfermedad').value;
        //var intIdpersona=document.querySelector('txtidpersona').value;
        var strPseudonimo = document.querySelector('#txtPseudonimo').value;


        if (strCedula == '' || strNombre == '' ||
            strApellido == '' || strFechaNacimiento == '' || strDireccion == ''
            || strEmail == '' || strInsEdu == '' || strJornada == '' || strCurso == ''
            || strOng == '' || strEnfermedad == '' || strAlergias == '' || strPseudonimo == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Representante/setNino';
        var formData = new FormData(formRepresentado);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        console.log(request);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                //console.log(objData);
                if (objData.status) {
                    $("#modalRepresentante").modal("hide");
                    formRepresentado.reset();
                    swal("Niño", objData.msg, "success");
                    tablaRepresentado.api().ajax.reload(function () {
                        //fntRolesUsuario();

                    });
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
        };



    };

}, false);

$("#tablaRepresentado").DataTable();
function openModal() {
    document.querySelector("#idnin").value = "";
    document
        .querySelector(".modal-header").classList.replace("headerUpdate", "headerRegister");
    document
        .querySelector("#btnActionForm")
        .classList.replace("btn-info", "btn-primary");
    document.querySelector("#btnText").innerHTML = "Guardar";
    document.querySelector("#titleModal").innerHTML = "Nuevo Niño";
    document.querySelector("#formRepresentado").reset();
    $(".modalRepresentante").modal("show");
}


function fntEditNino(idnino) {


    document.querySelector('#titleModal').innerHTML = "Actualizar datos del Niño";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    var idnino = idnino;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Representante/getNino/' + idnino;
    request.open("GET", ajaxUrl, true);
    request.send();
    //console.log(request);
    request.onreadystatechange = function () {

        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            if (objData.status) {
                document.querySelector("#idnin").value = objData.data.idnin;
                document.querySelector("#txtCedula").value = objData.data.cedula;
                document.querySelector("#txtNombre").value = objData.data.nombres;
                document.querySelector("#txtApellido").value = objData.data.apellidos;
                document.querySelector("#txtFechaNacimiento").value = objData.data.fechanacimiento;
                document.querySelector("#txtDireccion").value = objData.data.direccion;
                document.querySelector("#txtEmail").value = objData.data.email;
                document.querySelector("#txtInsEdu").value = objData.data.institucionedu;
                document.querySelector("#txtJornada").value = objData.data.jornada;
                document.querySelector("#txtCurso").value = objData.data.curso;
                document.querySelector("#txtong").value = objData.data.ong;
                document.querySelector("#txtalergias").value = objData.data.alergias;
                document.querySelector("#txtenfermedad").value = objData.data.enfermedad;
                document.querySelector("#txtidpersona").value =objData.data.idpersona;
                 document.querySelector('#txtPseudonimo').value= objData.data.pseudonimo;

            }
        }

        $('#modalRepresentante').modal('show');
    }





}


function fntDelNino(idnin){
    
            var idnin = idnin;
            swal({
                title: "Eliminar al Niño",
                text: "¿Realmente quiere eliminar el Ninño?",
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
                    var ajaxUrl = base_url+'/Representante/delNino';
                    var strData = "idnin="+idnin;
                    request.open("POST",ajaxUrl,true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.send(strData);
                    request.onreadystatechange = function(){
                        if(request.readyState == 4 && request.status == 200){
                            var objData = JSON.parse(request.responseText);
                            if(objData.status)
                            {
                                swal("Eliminar!", objData.msg , "success");
                                tablaRepresentado.api().ajax.reload(function(){
                                });
                            }else{
                                swal("Atención!", objData.msg , "error");
                            }
                        }
                    }
                }
        
            });
        
	
    
   
}
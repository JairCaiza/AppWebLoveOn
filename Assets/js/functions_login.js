$('.login-content [data-toggle="flip"]').click(function () {
    $('.login-box').toggleClass('flipped');
    return false;
});

var divLoading =document.querySelector("#divLoading");

document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector("#formLogin")) {
        let formLogin = document.querySelector("#formLogin");
        formLogin.onsubmit = function (e) {
            e.preventDefault();

            let strEmail = document.querySelector('#txtEmail').value;
            let strPassword = document.querySelector('#txtPassword').value;

            if (strEmail == "" || strPassword == "") {
                swal("Por Favor", "Escribe el usuario o contraseña", "error");
                return false;
            } else {
                divLoading.style.display="flex";
                var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
                var ajaxUrl = base_url + '/Login/loginUser'
                var formData = new FormData(formLogin);
                request.open("POST", ajaxUrl, true);
                request.send(formData);
                console.log(request);
                request.onreadystatechange = function () {
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {
                            window.location = base_url + '/dashboard';
                        } else {
                            swal("Atencion", objData.msg, "error");
                            document.querySelector('#txtPassword').value = "";
                        }
                    } else {
                        swal("Atencion", "Error en el proceso de logeo", "warning");
                    }
                    divLoading.style.display="none";
                    return false;
                }
            }
        }
    }

    if (document.querySelector("#formRecetPass")) {
        let formRecetPass = document.querySelector("#formRecetPass");
        formRecetPass.onsubmit = function (e) {
            e.preventDefault();
            let strEmail = document.querySelector('#txtEmailReset').value;
            if (strEmail == "" ) {
                swal("Por Favor", "Escriba el email por favor", "error");
                return false;
            }else{
                divLoading.style.display="flex";
                var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
                var ajaxUrl = base_url + '/Login/resetPass'
                var formData = new FormData(formRecetPass);
                request.open("POST", ajaxUrl, true);
                request.send(formData);
                request.onreadystatechange = function () {
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {
                           swal({
                               title:"",
                               text:objData.msg,
                               type:"success",
                               confirmButtonText:"Aceptar",
                               closeOnConfirm:false,
                           },function(isConfirm){
                               if(isConfirm){
                                   window.location=base_url+'/login';
                               }
                           });
                        } else {
                            swal("Atencion", objData.msg, "warning");
                        }
                    } else {
                        swal("Atencion", "Error en el proceso", "error");
                    }
                    divLoading.style.display="none";
                    return false;
                }
            }

        }
    }
    if (document.querySelector("#formCambiarPass")) {
        let formCambiarPass = document.querySelector("#formCambiarPass");
        formCambiarPass.onsubmit = function (e) {
            e.preventDefault();
            let strPassword = document.querySelector('#txtPassword').value;
            let strPasswordConfirm = document.querySelector('#txtPasswordConfirm').value;
            let idUsuario= document.querySelector('#idUsuario').value;

            if (strPassword == ""||strPasswordConfirm == "" ) {
                swal("Por Favor", "Los Campos necesarios", "error");
                return false;
            }else{
                
                if(strPassword.length<5){
                    swal("Atencion", "La contraseña debe tener minimo 5 caracteres", "info");
                    return false;
                }
                if(strPassword !=strPasswordConfirm){
                    swal("Atencion", "Las contraseñas no coinciden", "info");
                    return false;
                }
                
                var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
                var ajaxUrl = base_url + '/Login/setPassword'
                var formData = new FormData(formCambiarPass);
                request.open("POST", ajaxUrl, true);
                request.send(formData);

                request.onreadystatechange = function () {
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {
                           swal({
                               title:"",
                               text:objData.msg,
                               type:"success",
                               confirmButtonText:"Iniciar Sesion",
                               closeOnConfirm:false,
                           },function(isConfirm){
                               if(isConfirm){
                                   window.location=base_url+'/login';
                               }
                           });
                        } else {
                            swal("Atencion", objData.msg, "warning");
                        }
                    } else {
                        swal("Atencion", "Error en el proceso", "error");
                    }
                    
                    return false;
                }
                
            }

        }
    }


}, false);
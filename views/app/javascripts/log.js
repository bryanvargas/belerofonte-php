/**
 * Created by Shingo on 29/02/2016.
 */
var READY_STATE_UNINITIALIZED=0;
var READY_STATE_LOADING=1;
var READY_STATE_LOADED=2;
var READY_STATE_INTERACTIVE=3;
var READY_STATE_COMPLETE=4;
var logueo = shingo_ID('eventoPresionado');


function goLogin() {
    var connect, form, response, result, user, pass, sesion;
    user = shingo_ID('user_login').value;
    pass = shingo_ID('pass_login').value;

    connect = inicializa_xhr();
    connect.onreadystatechange = function() {
        if(connect.readyState==4 && connect.status == 200) {
            if(connect.responseText == 1) {
                result = '<div class="alert alert-dismissible alert-success">';
                result += '<h4>Conectado</h4>';
                result += '<p><strong>Estamos redireccionando</strong></p>';
                result += '</div>';
                shingo_ID('_AJAXLOGIN').innerHTML = result;;
                location.reload();
            } else {
                shingo_ID('_AJAXLOGIN').innerHTML = result;;
            }

        } else if (connect.readyState != 4) {
            result = '<div class="alert alert-dismissible alert-warning">';
            //result += '<button type="button" class="close" data-dismiss="alert">X</button>';
            result += '<h4>Procesando....</h4>';
            result += '<p><strong>Estamos intentando loguearte</strong></p>';
            result += '</div>';
            shingo_ID('_AJAXLOGIN').innerHTML = result;;

        }
    };
    connect.open('POST', 'ajax.php?mode=login', true);
    connect.setRequestHeader('ContentType', 'application/x-www-form-urlencoded');
    connect.send();
}


function cargarContenido(url, metodo, funcion) {
    peticion_http = inicializa_xhr();
    if(peticion_http) {
        peticion_http.onreadystatechange() == funcion;
        peticion_http.open(metodo, url, true);
        peticion_http.send();
    }
}

function monstrarContenido(titulo1, titulo2) {
    result = '<div class="alert alert-dismissible alert-warning">';
    result += '<button type="button" class="close" data-dismiss="alert">X</button>';
    result += '<h4>'+titulo1+'</h4>';
    result += '<p><strong>'+titulo2+'</strong></p>';
    result += '</div>';
}

//almacena la ultima tecla precionada
logueo.addEventListener('keypress', runScripLogin);
function runScripLogin(e) {
    if(e.keyCode == 13) {
        console.log(e.keyCode);
        goLogin();
    }
}

function inicializa_xhr() {
   return  window.XMLHttpRequest ? new XMLHttpRequest() :
        new ActiveXObject('Microsoft.XMLHTTP');

}

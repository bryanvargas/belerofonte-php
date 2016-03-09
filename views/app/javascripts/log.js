/**
 * Created by Shingo on 29/02/2016.
 */
var READY_STATE_UNINITIALIZED=0;
var READY_STATE_LOADING=1;
var READY_STATE_LOADED=2;
var READY_STATE_INTERACTIVE=3;
var READY_STATE_COMPLETE=4;
var logueo = shingo_ID('eventoPresionado');
var peticion_html, result;

function goLogin(metodo, url, funcion) {
    var  form, response, user, pass, sesion;
    user = shingo_ID('user_login').value;
    pass = shingo_ID('pass_login').value;
    sesion = shingo_ID('session_login').checked ? true:false;

    form = 'user=' + user + '&pass=' + pass + '&sesion=' + sesion;
    peticion_html = inicializa_xhr();
    if(peticion_html){
        peticion_html.onreadystatechange = funcion;
        peticion_html.open(metodo, url, true);
        peticion_html.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        peticion_html.send(form);
    }
}

function completo() {
        if(peticion_html.readyState==4 && peticion_html.status == 200) {
            if (peticion_html.responseText == 1) {
                result = monstrarContenido('Conectando', 'Estamos redireccionando', 'success');
                shingo_ID('_AJAXLOGIN').innerHTML = result;
                location.reload();
            } else {
                shingo_ID('_AJAXLOGIN').innerHTML = peticion_html.responseText;
            }
        } else if (peticion_html.readyState != 4 ) {
            result = monstrarContenido('Procesando....................', 'Estamnos intentando loguearte', 'danger');
            shingo_ID('_AJAXLOGIN').innerHTML = result;
        }
}

function monstrarContenido(titulo1, titulo2, titulo3) {
    //alert('<div class="alert alert-dismissible alert-success' + titulo3+ '"'+ '>');
    result = '<div class="alert alert-dismissible alert-' + titulo3+ '"'+ '>';
    //result = '<div class="alert alert-dismissible alert-success">';
    result += '<h4>'+titulo1+'</h4>';
    result += '<p><strong>'+titulo2+'</strong></p>';
    result += '<p><strong>'+titulo2+'</strong></p>';
    result += '</div>';
    return result;
}

function inicializa_xhr() {
   return  window.XMLHttpRequest ? new XMLHttpRequest() :
        new ActiveXObject('Microsoft.XMLHTTP');
}

//almacena la ultima tecla precionada
logueo.addEventListener('keypress', runScripLogin);
function runScripLogin(e) {
    if(e.keyCode == 13) {
        console.log(e.keyCode);
        goLogin('POST','ajax.php?mode=login', completo);
    }
};
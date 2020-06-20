$(document).ready(function(){
    var a = $('#dato').val();
    var b = $('#idp').val();
    $('.progress-bar').css({'width':a+'%'});
    if(parseInt(a)<=30){
        $('.progress-bar').text(a+'%');
    }
   else{
    $('.progress-bar').text('PROGRESO ACTUAL EN SU AUDITORIA '+a+'%');
   }
   $.ajax({
    data:  {"progreso":a, "id":b}, //datos que se envian a traves de ajax
    url:   'Progreso.php', //archivo que recibe la peticion
    type:  'post'
   });
    
});
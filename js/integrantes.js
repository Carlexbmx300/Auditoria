$(document).ready(function (){
    $('#campo').on('keyup', function(){
                var valor = $('#campo').val();
                var i = 0;
              if(valor.length>1){
                alert("solo numeros del 1 al 9");
                $('#campo').val('');
                $('#reflejar').empty();
              } 
              else{
                  if (valor === ''){
                    $('#reflejar').empty();
                }
             
                  else{
                      while (i< valor){
                
  
                
                          campo = '<div class="md-form" id="rut'+i+'"><input class="form-control" type="text"  id="campo' + i + '"&nbsp; name="campo' + i + '"&nbsp; /><label for="campo'+(i)+'"> Integrante '+(i)+'</label></div>';
                      $('#reflejar').append(campo); 
                      i++
                      }
                  }
              }
              
                //$('#campo').val("Hola mundo");
            });

         var i = 0;
     
         $('#add').click( function(){
        i++;
        $('#dynamic_field').append('<div id="input'+i+'"><div class="md-form col-12"><textarea id="form7" name="intro'+i+'" class="md-textarea form-control" rows="3"></textarea><label for="form7">Parrafo '+i+'</label></div><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div>');
        $('#numero').val(i) ;
 

      });
      $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#input'+button_id+'').remove();
        i--;
        $('#numero').val(i) ;
        });
      var j = 0 ;
      $('#addV').click(function(){
        j++;
        $('#dynamic_fieldV').append('<div id="visita'+j+'"> <div class="md-form"><input type="text" id="form1" class="form-control" name="titulo'+j+'" required><label for="form1">Titulo de visita</label></div><div class="md-form col-12"><textarea id="form7" name="observacion'+j+'" class="md-textarea form-control" rows="3"></textarea><label for="form7">Observacion</label></div><div>');
        $('#numeroV').val(j) ;
 
      });

      $('#removeV').click(function(){
        var num =  $('#numeroV').val();
        $('#visita'+num+'').remove();
        j--;
        $('#numeroV').val(j) ;

      });

      var k = 0 ;
      $('#addO').click(function(){
        k++;
        $('#dynamic_fieldO').append('<div id="obj'+k+'"><div class="md-form col-12"><textarea id="form7" name="especifico'+k+'" class="md-textarea form-control" rows="3"></textarea><label for="form7">Objetivo especifico'+k+'</label></div><div>');
        $('#numeroO').val(k) ;
 
      });

      $('#removeO').click(function(){
        var num =  $('#numeroO').val();
        $('#obj'+num+'').remove();
        k--;
        $('#numeroO').val(k) ;

      });

      var l = 0 ;
      $('#addP').click(function(){
        l++;
        $('#dynamic_fieldP').append('<div id="pn'+l+'"><div class="md-form col-12"><textarea id="form7" name="punto'+l+'" class="md-textarea form-control" rows="3"></textarea><label for="form7">Punto'+l+'</label></div><div>');
        $('#numeroP').val(l) ;
 
      });

      $('#removeP').click(function(){
        var num =  $('#numeroP').val();
        $('#pn'+num+'').remove();
        l--;
        $('#numeroP').val(l) ;

      });

      var h = 0 ;
      $('#addH').click(function(){
        h++;
        $('#dynamic_fieldH').append('<div id="he'+h+'"><div class="md-form col-12"><textarea id="form7" name="herramienta'+h+'" class="md-textarea form-control" rows="3"></textarea><label for="form7">Herramienta '+h+'</label></div><div>');
        $('#numeroH').val(h) ;
 
      });

      $('#removeH').click(function(){
        var num =  $('#numeroH').val();
        $('#he'+num+'').remove();
        h--;
        $('#numeroH').val(h) ;

      });

      var q = 0 ;
      $('#addTec').click(function(){
        q++;
        $('#dynamic_fieldTec').append('<div id="tec'+q+'"> <div class="md-form"><input type="text" id="form1" class="form-control" name="tecnico'+q+'" required><label for="form1">Recurso tecnico '+q+'</label></div><div>');
        $('#numeroTec').val(q) ;
 
      });

      $('#removeTec').click(function(){
        var num =  $('#numeroTec').val();
        $('#tec'+num+'').remove();
        q--;
        $('#numeroTec').val(q) ;

      });
      var w = 0 ;
      $('#addEco').click(function(){
        w++;
        $('#dynamic_fieldEco').append('<div id="eco'+w+'"> <div class="md-form"><input type="text" id="form1" class="form-control" name="economico'+w+'" required><label for="form1">Recurso economico '+w+'</label></div><div class="md-form"><input type="text" id="form1" class="form-control" name="costo'+w+'" required><label for="form1">Costo '+w+'</label></div><div>');
        $('#numeroEco').val(w) ;
 
      });

      $('#removeEco').click(function(){
        var num =  $('#numeroEco').val();
        $('#eco'+num+'').remove();
        w--;
        $('#numeroEco').val(w) ;

      });
    
    });



    document.getElementById("file").onchange = function(e) {
      // Creamos el objeto de la clase FileReader
      let reader = new FileReader();
    
      // Leemos el archivo subido y se lo pasamos a nuestro fileReader
      reader.readAsDataURL(e.target.files[0]);
    
      // Le decimos que cuando este listo ejecute el código interno
      reader.onload = function(){
        let preview = document.getElementById('preview'),
                image = document.createElement('img');
    
        image.src = reader.result;
    
        preview.innerHTML = '';
        preview.append(image);
      };
    }


  
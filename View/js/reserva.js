// var ordenadores = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
// var fecha = ['2019-10-21', '2019-10-22', '2019-10-21', '2019-10-22', '2019-10-22', '2019-10-21', '2019-10-21', '2019-10-22', '2019-10-22', '2019-10-21', '2019-10-21', '2019-10-21', '2019-10-21', '2019-10-21', '2019-10-22', '2019-10-21', '2019-10-21', '2019-10-22','2019-10-21', '2019-10-21'];
// var fecha = ['','','','','','','','','','','','','','','','','','','',''];


/* datos locales para realizar pruebas en la página */
var cadena = localStorage['cafe'];

    if (!cadena) {
        var json= [{"ordenadores": 1, 'fecha': ''},{"ordenadores": 2, 'fecha': ''},{"ordenadores": 3, 'fecha': ''},{"ordenadores": 4, 'fecha': ''},
        {"ordenadores": 5, 'fecha': ''},{"ordenadores": 6, 'fecha': ''},{"ordenadores": 7, 'fecha': ''},{"ordenadores": 8, 'fecha': ''},
        {"ordenadores": 9, 'fecha': ''},{"ordenadores": 10, 'fecha': ''},{"ordenadores": 11, 'fecha': ''},{"ordenadores": 12, 'fecha': ''},
        {"ordenadores": 13, 'fecha': ''},{"ordenadores": 14, 'fecha': ''},{"ordenadores": 15, 'fecha': ''},{"ordenadores": 16, 'fecha': ''},
        {"ordenadores": 17, 'fecha': ''},{"ordenadores": 18, 'fecha': ''},{"ordenadores": 19, 'fecha': ''},{"ordenadores": 20, 'fecha': ''}]

        var cadena = JSON.stringify(json);
        // alert(cadena);
        localStorage['cafe'] = cadena;

    }
    localsala = JSON.parse(cadena);


$(document).ready(function () {


    /* carga las imagenes en el container */
    $('#nav-info').append(function () {

        for (i = 0; i < localsala.length; i++) {

            $(this).append('<div data-id="'+localsala[i].ordenadores+'" class="text"><br><b> Nº'+(localsala[i].ordenadores)+'</b><br><a href="#"> <img class="pcGaming" id="' +(localsala[i].ordenadores)+ '"/><a/><div/>'); 
            $('.text img').attr('src', 'img/gaming-pc.jpg');
        }
        
    });

    /* estado de los ordenadores según su fecha de reserva */
    $('#dateButton').click(function () {

        /* date actual */
        var d = new Date();
        var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
        // $(".dropdown-menu").clear()
        /* limpia el dropdown cada vez que se realice una nueva consulta de fecha */
        $(".dropdown-menu").empty()

        /* si el dropdown está vacio muestra 'vacio', si no, no*/
        if($('.dropdown-menu li').length==0){
            $('.dropdown-menu').append('<li id="vacio"><a href="#">-- Vacio --</a></li>');
        } else{
            $('#vacio').remove();
        }

        /* compruba que la fecha escogida no sea anterior a la actual */
        if($('#date').val()<strDate){
            alert('Reservas no disponibles');
        }else{
        /* si el ordenador está disponible mostrará el color verde, si no, rojo */
            $('.pcGaming').each(function (i) {
                if ($(this).attr('id')==localsala[i].ordenadores) {
                    if (localsala[i].fecha.match($('#date').val())) {
                        $('.text:eq('+i+')').css('background-color', 'red');
                    } else {
                        $('.text:eq('+i+')').css('background-color', 'green');
                    }
                }
            });
        }  
    });
    /* si el dropdown está vacio muestra 'vacio' */
    if($('.dropdown-menu li').length==0){
        $('.dropdown-menu').append('<li id="vacio"><a href="#">-- Vacio --</a></li>');
    }

    /* acciones al clickar en cada ordenador */
    $('.text').click(function(){
        
        var idImg = $(this).attr('data-id');

        /* comprueba si no hay fecha escogida, salta un alert */
        if($('#date').val()==""){
            alert('Elige una fecha');
        }else{
            /* comprueba si ya está reservado para esa fecha */
                if($('#date').val()==localsala[idImg-1].fecha){
                    alert('EL ordenador seleccionado ya está reservado');
                }else{
                    var mensaje = false;
                    var idIl = 0;
                    /* añade el ordenador al dropdown y le cambia el color a naranja 'marcado'*/
                    if($('.dropdown-menu li').length==0){
                        $('.dropdown-menu').append('<li id="'+idImg+'"><a href="#">Ordenador Nº'+idImg+'</a><a href="#" class="quit"><img src="../img/quit.png" /></a></li>');
                        $('.text:eq('+(idImg-1)+')').css('background-color', 'orange');
                        slide_stop(); /* stop */
                    }else{
                        /* salta un alert si escoges de nuevo un ordenador que ya has marcado */
                        $('.dropdown-menu li').each(function(){ 
                            idIl = $(this).attr('id'); 
                            if(idIl == idImg){
                                alert("El ordenador ya ha sido seleccionado anteriormente");
                                mensaje = false;
                                slide_stop();
                            }else {
                                mensaje = true;
                            }
                        }); 
                        /* si no, lo añade al dropdown y le cambia el color a naranja 'marcado' */
                        if(mensaje == true){
                            $('.text:eq('+(idImg-1)+')').css('background-color', 'orange');
                            $('.dropdown-menu').append('<li id="'+idImg+'"><a href="#">Ordenador Nº'+idImg+'</a><a href="#" class="quit"><img href="#" src="./img/quit.png" /></a></li>');
                        }else{
                            alert("El ordenador ya ha sido seleccionado anteriormente");
                        }
                    } 
                    /* elimina el 'vacio' una vez que un o varios elemntos hayan sido añadidos al dropdown */
                    $('#vacio').remove();

                    /* refresca la operación de eliminar un elemnto del dropdwon */
                    $('.quit').off();
                    /* elimina un elemento del dropdown pulsando la X */
                    $('.quit').on('click',function(){
                        $(this).parent().remove();

                        /* si el dropdown está vacio, aparece 'vacio' */
                        if($('.dropdown-menu li').length==0){
                            $('.dropdown-menu').append('<li id="vacio"><a href="#">-- Vacio --</a></li>');
                        }
                        /* despues de eliminar un elemnto del dropdown, ese mismo elemento se volverá verde en el container, ya que ya no está seleccionado */
                        $('.text:eq('+(($(this).parent().attr('id'))-1)+')').css('background-color', 'green');
                    });
                }
        }               
    });


    /* este botón ejecutará la reserva, añadiendo la fecha seleccionada a cada ordenador escogido */
    $('#reservar').click(function(){

        $('.dropdown-menu li').each(function(){ 
          
            localsala[(($(this).attr('id'))-1)].fecha = $('#date').val();
        }); 

        /* guarda los datos en el localStorage (sobrescribe) */
        var chain= JSON.stringify(localsala);
        localStorage['cafe']= chain;
        window.location.reload(true);
    });

    
    





});
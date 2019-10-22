// var ordenadores = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
// var fecha = ['2019-10-21', '2019-10-22', '2019-10-21', '2019-10-22', '2019-10-22', '2019-10-21', '2019-10-21', '2019-10-22', '2019-10-22', '2019-10-21', '2019-10-21', '2019-10-21', '2019-10-21', '2019-10-21', '2019-10-22', '2019-10-21', '2019-10-21', '2019-10-22','2019-10-21', '2019-10-21'];
// var fecha = ['','','','','','','','','','','','','','','','','','','',''];

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


    $('#nav-info').append(function () {

        for (i = 0; i < localsala.length; i++) {

            $(this).append('<div data-id="'+localsala[i].ordenadores+'" class="text"><br><b> Nº'+(localsala[i].ordenadores)+'</b><br><a href="#"> <img class="pcGaming" id="' +(localsala[i].ordenadores)+ '"/><a/><div/>'); 
            $('img').attr('src', 'img/gaming-pc.jpg');
        }
        
    });

    $('#dateButton').click(function () {

        var d = new Date();
        var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
        // $(".dropdown-menu").clear()
        $(".dropdown-menu").empty()

        if($('.dropdown-menu li').length==0){
            $('.dropdown-menu').append('<li id="vacio"><a href="#">-- Vacio --</a></li>');
        } else{
            $('#vacio').remove();
        }

        if($('#date').val()<strDate){
            alert('Reservas no disponibles');
        }else{
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

    if($('.dropdown-menu li').length==0){
        $('.dropdown-menu').append('<li id="vacio"><a href="#">-- Vacio --</a></li>');
    }

    $('.text').click(function(){
        
        var idImg = $(this).attr('data-id');

        if($('#date').val()==""){
            alert('Elige una fecha');
        }else{
                if($('#date').val()==localsala[idImg-1].fecha){
                    alert('EL ordenador seleccionado ya está reservado');
                }else{
                    var mensaje = false;
                    var idIl = 0;

                    if($('.dropdown-menu li').length==0){
                        $('.dropdown-menu').append('<li id="'+idImg+'"><a href="#">Ordenador Nº'+idImg+'</a><a href="#" class="quit"><img src="../img/quit.png" /></a></li>');
                        $('.text:eq('+(idImg-1)+')').css('background-color', 'orange');
                        slide_stop();
                    }else{
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
                        if(mensaje == true){
                            $('.text:eq('+(idImg-1)+')').css('background-color', 'orange');
                            $('.dropdown-menu').append('<li id="'+idImg+'"><a href="#">Ordenador Nº'+idImg+'</a><a href="#" class="quit"><img href="#" src="../img/quit.png" /></a></li>');
                        }else{
                            alert("El ordenador ya ha sido seleccionado anteriormente");
                        }
                    } 

                    $('#vacio').remove();

                    $('.quit').off();
                    $('.quit').on('click',function(){
                        $(this).parent().remove();

                        if($('.dropdown-menu li').length==0){
                            $('.dropdown-menu').append('<li id="vacio"><a href="#">-- Vacio --</a></li>');
                        }
                        $('.text:eq('+(($(this).parent().attr('id'))-1)+')').css('background-color', 'green');
                    });
                }
        }               
    });


    $('#reservar').click(function(){

        $('.dropdown-menu li').each(function(){ 
          
            localsala[(($(this).attr('id'))-1)].fecha = $('#date').val();
        }); 

        var chain= JSON.stringify(localsala);
        localStorage['cafe']= chain;
    });

    
    





});
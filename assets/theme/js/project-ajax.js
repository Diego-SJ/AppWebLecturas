$(function (){
    //variable global de la url del proyecto (localhost/kids)
    var base_url = "http://192.168.64.2/kids/";


    //AJAX para eliminar una lectura 
    $(".btn-eliminar-lectura").on("click", function(){
        var id_lectura = $(this).val();

        $.ajax({
            url: base_url + "Web/Lecturas/viewDeleteLectura/" + id_lectura,
            type: "POST",
            success: function(resp){
                $("#Visualizar .modal-body").html(resp);
                //alert(resp);
            }
        });
    });

    //AJAX para ver pagina 
    $(".btn-ver-pagina").on("click", function(){
        var id_pagina = $(this).val();
        $.ajax({
            url: base_url + "Web/Pagina/contenidoPagina/" + id_pagina,
            type: "POST",
            success: function(resp){
                $("#Visualizar .modal-body").html(resp);
            }
        });
    });

    //AJAX para eliminar una pagina 
    $(".btn-eliminar-pagina").on("click", function(){
        var id_pagina = $(this).val();

        $.ajax({
            url: base_url + "Web/Pagina/viewEliminarPagina/" + id_pagina,
            type: "POST",
            success: function(resp){
                $("#Visualizar .modal-body").html(resp);
            }
        });
    });

    //AJAX para eliminar un archivo pdf 
    $(".btn-eliminar-pdf").on("click", function(){
        var id_pagina = $(this).val();

        $.ajax({
            url: base_url + "Web/Archivo/viewEliminarPdf/" + id_pagina,
            type: "POST",
            success: function(resp){
                $("#Visualizar .modal-body").html(resp);
            }
        });
    });

    //AJAX para ver pdf 
    $(".btn-ver-archivo").on("click", function(){
        var id_pagina = $(this).val();
        $.ajax({
            url: base_url + "Web/Archivo/viewFile/" + id_pagina,
            type: "POST",
            success: function(resp){
                $("#Visualizar .modal-body").html(resp);
            }
        });
    });

    //AJAX para editar una pagina 
    $(".btn-editar-pagina").on("click", function(){
        var id_pagina = $(this).val();

        $.ajax({
            url: base_url + "Web/Pagina/viewEditarPagina/" + id_pagina,
            type: "POST",
            success: function(resp){
                $("#Visualizar .modal-body").html(resp);
            }
        });
    });

    //AJAX para ver reactivo 
    $(".btn-ver-reactivo").on("click", function(){
        var id_reactivo = $(this).val();
        $.ajax({
            url: base_url + "Web/Actividades/getActividad/" + id_reactivo,
            type: "POST",
            success: function(resp){
                $("#Visualizar .modal-body").html(resp);

            }
        });
    });

    //AJAX para eliminar un reactivo 
    $(".btn-eliminar-reactivo").on("click", function(){
        var id_actividad = $(this).val();

        $.ajax({
            url: base_url + "Web/Actividades/viewEliminarReactivo/" + id_actividad,
            type: "POST",
            success: function(resp){
                $("#Visualizar .modal-body").html(resp);
                //alert(resp);
            }
        });
    });

    //AJAX para editar un reactivo 
    $(".btn-editar-reactivo").on("click", function(){
        var id_actividad = $(this).val();

        $.ajax({
            url: base_url + "Web/Actividades/viewEditarReactivo/" + id_actividad,
            type: "POST",
            success: function(resp){
                $("#Visualizar .modal-body").html(resp);
            }
        });
    });

    //AJAX para eliminar un alumno 
    $(".btn-eliminar-alumno").on("click", function(){
        var id_alumno = $(this).val();

        $.ajax({
            url: base_url + "Web/Alumno/viewEliminarAlumno/" + id_alumno,
            type: "POST",
            success: function(resp){
                $("#Visualizar .modal-body").html(resp);
                //alert(resp);
            }
        });
    });

    document.querySelector("html").classList.add('js');

    var fileInput  = document.querySelector(".input-file"),  
        button     = document.querySelector(".input-file-trigger"),
        the_return = document.querySelector(".file-return");
          
    button.addEventListener( "keydown", function( event ) {  
        if ( event.keyCode == 13 || event.keyCode == 32 ) {  
            fileInput.focus();  
        }  
    });
    button.addEventListener( "click", function( event ) {
       fileInput.focus();
       return false;
    });  
    fileInput.addEventListener( "change", function( event ) {  
        the_return.innerHTML = this.value;  
    }); 

});
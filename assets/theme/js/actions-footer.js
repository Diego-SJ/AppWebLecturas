/*=================================================
        ACCIONES PARA COMPONENTES GENERALES
=================================================*/
$(".question_hide").hide();

/*=================================================
        ACCIONES PARA COMPONENTES DE LOGIN
=================================================*/
$("#sendPass").hide();
$("#pwac").hide();
$("#status_enabled_lecture").hide();

$("#btnUpdPass").on("click", function(){
    var pa = $("#pwac").val();
    var pr = $("#inputPassActual").val();
    var pn = $("#inputPassNew").val();
    var pc = $("#inputPassConfirm").val();

    if(pa!='' && pr!='' && pn!='' && pc!=''){
        if(pn==pc){
            $("#sendPass").click();
        } else {
            alert("las contraseñas no coinciden");
        }
    } else {
        alert("completa todos los campos");
    }  
});

$("#admin_docente").DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ docentes",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar docente",
        "info": "docentes de _START_ al _END_ de un total de  _TOTAL_",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
    }
});

$("#tabla_lect_admin").DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ lecturas",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar lectura",
        "info": "lecturas de _START_ al _END_ de un total de _TOTAL_",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
    }
});

$("#example1").DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ lecturas por pagina",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar lectura",
        "info": "lecturas _START_ al _END_ de un total de  _TOTAL_ lecturas",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
    }
});

//ESTILO TABLA LECTURAS
$("#tabla_alumnos_teacher_detail").DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ lecturas completadas",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar lectura",
        "info": "de _START_ al _END_ de un total de  _TOTAL_ lecturas",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
    }
});

//ESTILO TABLA ALUMNOS
$("#tabla_alumnos_teacher").DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ alumnos por pagina",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar alumno",
        "info": "de _START_ al _END_ de un total de  _TOTAL_ alumnos",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
    }
});

//ESTILO TABLA ALUMNOS DETALLE
$("#tabla_alumnos_lectura_detail").DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ alumnos que finalizarón esta lectura",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar alumno",
        "info": "de _START_ al _END_ de un total de  _TOTAL_ alumnos",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
    }
});

$('#tableLecturas').DataTable({
    'paging'      : true,
    'lengthChange': true,
    'searching'   : true,
    'ordering'    : true,
    'info'        : false,
    'autoWidth'   : true,
    "language": {
        "lengthMenu": "Mostrar _MENU_",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar lectura",
        "info": "alumnos _START_ al _END_ de un total de  _TOTAL_ alumnos",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
    }
});

$("#gen_ninio").on("click", function(){
    $("#frm_genero").val("masculino");
});
$("#gen_ninia").on("click", function(){
    $("#frm_genero").val("femenino");
});

//GENERAR USUARIO Y PASS A PARTIR DE CAMPOS INGRESADOS

//VERIFICAR QUE LOS CAMPOS NO ESTE VACIOS
$(".reg-alumno").on("click", function(){
    $("#btn-ana-success").attr("disabled", "disabled");
    $("#rna_nombre").attr("disabled", false);
    $("#desc_na").show();
});
var check,nombre, paterno, materno, grado, grupo, dataAlumno;

$("#form_rna .req").keyup(function() {
    var form = $(this).parents("#form_rna");
    check = checkCampos(form);
});

$("#rna_clickhere").on("click", function (){
    nombre = $("#rna_nombre").val();
    paterno = $("#rna_paterno").val();
    materno = $("#rna_materno").val();

    if(check){

        var keyuser = quitarEspacios(nombre)+"_"+paterno.charAt(0)+materno.charAt(0)+crearUUID();

        $("#rna_nombre").prop("readonly",true);
        $("#rna_paterno").prop("readonly",true);
        $("#rna_materno").prop("readonly",true);
        $("#rna_grado").prop("readonly",true);
        $("#rna_grupo").prop("readonly",true);
        $("#rna_usuario").val(keyuser);
        $("#rna_password").val(keyuser);

        $("#btn-ana-success").prop("disabled", false);
        alert("Guarda para continuar.");
    } else {
        alert("Completa todos los campos.");
    }
});

$("#reset-frm-na").on("click", function(){
    $("#rna_nombre").prop("disabled",false);
    $("#rna_paterno").prop("disabled",false);
    $("#rna_materno").prop("disabled",false);
    $("#rna_grado").prop("disabled",false);
    $("#rna_grupo").prop("disabled",false);
    clear_formNuevoAlumno();
});

/*=================================================
        FUNCIONES PARA COMPONENTES GENERALES
=================================================*/

function checkCampos(obj) {
    var camposRellenados = true;
    obj.find(".req").each(function() {
        var $this = $(this);
        if( $this.val().length <= 0 ) {
            camposRellenados = false;
            return false;
        }
    });
    if(camposRellenados == false) {
        return false;
    }
    else {
        return true;
    }
}

function crearUUID(){
    var str = uuid.v4();
    var res = str.substring(3, 7);
    return res;
}

function quitarEspacios(cadena){
    return cadena.replace(/ /g,'');
}

/*=================================================
        VACIAR FORMULARIOS
=================================================*/

function clear_form1() {document.getElementById("frm_om").reset();}
function clear_form2() {document.getElementById("frm_rc").reset();}
function clear_form3() {document.getElementById("frm_vf").reset();}
function clear_formNuevoAlumno() {document.getElementById("form_rna").reset();}

function checkPassReset(){
var np  = document.getElementById("np").value;
var npr = document.getElementById("npr").value;

    if(np.length <= 0 || npr.length <= 0){
        window.alert("Campos obligatorios.");
    } else {
        if(np == npr){
          return true;
      } else {
          window.alert("las contraseñas no coinciden.");
      }
    }
}

/*=================================================
                   INPUT FILE
=================================================*/




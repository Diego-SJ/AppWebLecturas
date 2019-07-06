<?php $index = 1; $treactivos = 0;?>
<!-- =====================.INICIO CONTENIDO ========================== -->
<div class="content-wrapper theme-2">
  <section class="content">
    <div class="row">
      <!-- LECTURA DETAIL -->
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
          <!-- regresar a los detalles -->
          <div class="col-md-4">
            <div class="box box-widget widget-user-2 bg-white">
              <a href="<?php echo base_url().'Movil/Lecturas/detail'?>/<?php if(!empty($lectura)){echo $lectura->idLectura;} ?>">
                <div class="widget-user-header box-shadow-sm" style="padding: 10px 10px 5px 10px;">
                  <div  class="widget-user-image">
                    <img class="img-circle img-thumbnail circle-green"  
                    src="<?php echo base_url(); ?>assets/img/book-green.png" alt="User Avatar">
                  </div>
                  <h6 class="widget-user-desc text-gris">lectura
                  </h6>
                  <h5 class="widget-user-desc box-title text-black">Atrás
                  </h5>
                  <h6 class="widget-user-desc text-verde-dark">
                    <i class="fa fa-arrow-left">
                    </i> Regresar a la lectura 
                  </h6>
                </div>
              </a>
            </div>
          </div>
          <!-- intentos -->
          <div class="col-md-4">
            <div class="box box-widget widget-user-2 bg-white">
              <a>
                <div class="widget-user-header box-shadow-sm" style="padding: 10px 10px 5px 10px;">
                  <div  class="widget-user-image">
                    <img class="img-circle img-thumbnail circle-bot"  
                    src="<?php echo base_url(); ?>assets/img/android-smile.png" alt="User Avatar">
                  </div>
                  <h6 class="widget-user-desc text-gris">Intentos
                  </h6>
                  <h5 class="widget-user-desc box-title text-black">
                    <?php if(!empty($lectura) && !empty($lec_alumno)){echo $lec_alumno->intentos_rc."/".$lectura->attemps;} ?>
                  </h5>
                  <h6 class="widget-user-desc text-blue">
                    <i class="fa fa-heart">
                    </i> Intentos para realizar esta evaluación 
                  </h6>
                </div>
              </a>
            </div>
          </div>
          <!-- leer lectura -->
          <div class="col-md-4">
            <div class="box box-widget widget-user-2 bg-white">
              <a href="<?php echo base_url().'Movil/Lecturas/read'?>/<?php if(!empty($lectura)){echo $lectura->idLectura;} ?>">
                <div class="widget-user-header box-shadow-sm" style="padding: 10px 10px 5px 10px;">
                  <div  class="widget-user-image">
                    <img class="img-circle img-thumbnail circle-blue"  
                    src="<?php echo base_url(); ?>assets/img/read-2.png" alt="User Avatar">
                  </div>
                  <h6 class="widget-user-desc text-gris">lectura
                  </h6>
                  <h5 class="widget-user-desc box-title text-black">Leer lectura
                  </h5>
                  <h6 class="widget-user-desc text-azul">
                    <i class="fa fa-eye">
                    </i> Revisar lectura 
                  </h6>
                </div>
              </a>
            </div>
          </div>
        </div>

        <!-- EVALUACION -->
        <?php if($lec_alumno->fin_rc == 1){ ?>
          <div class="row text-center">
            <div class="col-md-12 text-center">
              <img class="img-circle img-thumbnail" width="30%"  
              src="<?php echo base_url(); ?>assets/img/android-happy.png" alt="User Avatar">
              <h1>¡Ya has terminado esta sección!
              </h1>
            </div>
          </div>
        <?php } ?>

        <!-- REACTIVOS PARA CONTESTAR -->
        <div id="test_result">
          <?php if(!empty($reactivos) && $lec_alumno->intentos_rc < $lectura->attemps && $lec_alumno->fin_rc == 0){ ?>
            <div class="box box-solid box-shadow-sm">
              <div class="box-header bg-teal text-center">
                <h3 class="box-title">Relaciona la oración con su posible respuesta.
                </h3>
              </div>
              <div class="box-body">
                <form id="from_test_rc" method="post" action="<?php echo base_url().'Movil/Actividades/verificar_rc'?>/<?php if(!empty($lectura)){echo $lectura->idLectura;} ?>">
                  <?php foreach($reactivos as $reactivo){ ?>

                    <?php $sub_index = 1; //indice para el numero de pregunta?>

                    <?php echo "<input class='question_hide' value='".$reactivo->idRelacionarColumnas."' name='idrrc".$index."' hidden>"; //id de la fila relacionar columnas?>

                    <blockquote class="area-arrastre<?php echo $index; ?> bg-block-gray">
                      <table style="width: 100%;">
                        <thead>
                          <td style="width: 50%;">Sentencias</td>
                          <td style="width: 50%;">Respuestas</td>
                        </thead>
                        <tbody>
                          <tr style="width: 100%;">
                            <td style="width: 50%;">
                              <?php $treactivos++; ?>
                              <?php 
                              echo "<input class='question_hide' value='".$sub_index."' name='p_".$treactivos."' hidden>"; 
                              echo "<input class='question_hide' value='".($sub_index.") ".$reactivo->preg_1)."' name='question".$treactivos."' hidden>"; 
                              ?>
                              <h4 class="reactivo"><?php echo ($sub_index.") ".$reactivo->preg_1); ?></h4>
                              <ul id="sortable1" class="container-sortable connectedSortable question">
                                <li><input class="input-sort question_hide" type="text" name="r_<?php echo $treactivos; ?>" hidden></li>
                                <li><input class="input-answer question_hide" name="rt_<?php echo $treactivos; ?>" hidden></li>
                              </ul>

                              <?php $sub_index++; ?>
                              <?php $treactivos++; ?>
                              <?php 
                              echo "<input class='question_hide' value='".$sub_index."' name='p_".$treactivos."' hidden>";
                              echo "<input class='question_hide' value='".($sub_index.") ".$reactivo->preg_2)."' name='question".$treactivos."' hidden>";  
                              ?>
                              <h4 class="reactivo"><?php echo ($sub_index.") ".$reactivo->preg_2); ?></h4>
                              <ul id="sortable2" class="container-sortable connectedSortable question">
                                <li><input id="resp2" class="input-sort question_hide" type="text" name="r_<?php echo $treactivos; ?>" hidden></li>
                                <li><input class="input-answer question_hide" name="rt_<?php echo $treactivos; ?>" hidden></li>
                              </ul>
                              <?php $sub_index++; ?>
                              <?php $treactivos++; ?>
                              <?php 
                              echo "<input class='question_hide' value='".$sub_index."' name='p_".$treactivos."' hidden>"; 
                              echo "<input class='question_hide' value='".($sub_index.") ".$reactivo->preg_3)."' name='question".$treactivos."' hidden>"; 
                              ?>
                              <h4 class="reactivo"><?php echo ($sub_index.") ".$reactivo->preg_3); ?></h4>
                              <ul id="sortable3" class="container-sortable connectedSortable question">
                                <li><input id="resp3" class="input-sort question_hide" type="text" name="r_<?php echo $treactivos; ?>" hidden></li>
                                <li><input class="input-answer question_hide" name="rt_<?php echo $treactivos; ?>" hidden></li>
                              </ul>
                              <?php $sub_index++; ?>
                              <?php $treactivos++; ?>
                              <?php 
                              echo "<input class='question_hide' value='".$sub_index."' name='p_".$treactivos."' hidden>"; 
                              echo "<input class='question_hide' value='".($sub_index.") ".$reactivo->preg_4)."' name='question".$treactivos."' hidden>"; 
                              ?>
                              <h4 class="reactivo"><?php echo ($sub_index.") ".$reactivo->preg_4); ?></h4>
                              <ul id="sortable4" class="container-sortable connectedSortable question">
                                <li><input id="resp4" class="input-sort question_hide" type="text" name="r_<?php echo $treactivos; ?>" hidden></li>
                                <li><input class="input-answer question_hide" name="rt_<?php echo $treactivos; ?>" hidden></li>
                              </ul>
                            </td>
                            <td style="width: 50%; text-align: center;">
                              <ul id="sortable5" class="container-sortable connectedSortable answer">
                                <li class="response<?php echo $index; ?> ui-state-default" value="<?php echo $reactivo->idx_r1; ?>"><?php echo $reactivo->resp_1; ?></li>
                                <li class="response<?php echo $index; ?> ui-state-default" value="<?php echo $reactivo->idx_r2; ?>"><?php echo $reactivo->resp_2; ?></li>
                                <li class="response<?php echo $index; ?> ui-state-default" value="<?php echo $reactivo->idx_r3; ?>"><?php echo $reactivo->resp_3; ?></li>
                                <li class="response<?php echo $index; ?> ui-state-default" value="<?php echo $reactivo->idx_r4; ?>"><?php echo $reactivo->resp_4; ?></li>
                              </ul>
                        <!-- <button class="btn btn-sm bg-red" type="button" id="reset">
                          <i class="fa fa-back"></i>  Regresar
                        </button> -->
                      </td>
                    </tr>
                  </tbody>
                </table>
              </blockquote>
              <hr style="border: 2px solid gray">
              <!-- total de reactivos -->
              <?php echo "<input class='question_hide' type='text' value='".$treactivos."'  name='num_r' hidden>"; ?>
              <?php $index++; ?>
            <?php } ?>
            <button id="check_rc" type="submit" id="verificar" name="verificar" class="btn btn-flat bg-teal">
              <i class="fa fa-check-circle">
              </i> Verificar
            </button>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>
`</div>
<!-- LECTURA DETAIL -->
</div>
</section>
</div>
<!-- =====================.FIN CONTENIDO ========================== -->
<script type="text/javascript">
  $( function() {

    $( ".container-sortable" ).sortable({
      connectWith: ".connectedSortable"
    }).disableSelection();

    $(".container-sortable").droppable({
      drop: function(ev, ui) {
        var entry_one = $(this).find('> li > input.input-sort').val();
        var entry_two = $(this).find('> li > input.input-answer').val();
        if(entry_one.length > 0 && entry_two.length > 0){
          entry_one = $(this).find('> li > input.input-sort').val('');
          entry_two = $(this).find('> li > input.input-answer').val('');
        } 
        entry_one = $(this).find('> li > input.input-sort').insertAtCaret(ui.draggable.val());
        entry_two = $(this).find('> li > input.input-answer').insertAtCaret(ui.draggable.text());
      }
    });

    $( ".response1" ).draggable({ containment: ".area-arrastre1", scroll: false });
    $( ".response2" ).draggable({ containment: ".area-arrastre2", scroll: false });
    $( ".response3" ).draggable({ containment: ".area-arrastre3", scroll: false });
    $( ".response4" ).draggable({ containment: ".area-arrastre4", scroll: false });
    $( ".response5" ).draggable({ containment: ".area-arrastre5", scroll: false });
    $( ".response6" ).draggable({ containment: ".area-arrastre6", scroll: false });
    $( ".response7" ).draggable({ containment: ".area-arrastre7", scroll: false });
    $( ".response8" ).draggable({ containment: ".area-arrastre8", scroll: false });
    $( ".response9" ).draggable({ containment: ".area-arrastre9", scroll: false });
    $( ".response10" ).draggable({ containment: ".area-arrastre10", scroll: false });
    $( ".response11" ).draggable({ containment: ".area-arrastre11", scroll: false });
    $( ".response12" ).draggable({ containment: ".area-arrastre12", scroll: false });
    $( ".response13" ).draggable({ containment: ".area-arrastre13", scroll: false });
    $( ".response14" ).draggable({ containment: ".area-arrastre14", scroll: false });
    $( ".response15" ).draggable({ containment: ".area-arrastre15", scroll: false });
    $( ".response16" ).draggable({ containment: ".area-arrastre16", scroll: false });
    $( ".response17" ).draggable({ containment: ".area-arrastre17", scroll: false });
    $( ".response18" ).draggable({ containment: ".area-arrastre18", scroll: false });
    $( ".response19" ).draggable({ containment: ".area-arrastre19", scroll: false });
    $( ".response20" ).draggable({ containment: ".area-arrastre20", scroll: false });

    $.fn.insertAtCaret = function (myValue) {
      return this.each(function(){
        if (document.selection) {
          this.focus();
          sel = document.selection.createRange();
          sel.text = myValue;
          this.focus();
        }else if (this.selectionStart || this.selectionStart == '0') {
          var startPos = this.selectionStart;
          var endPos = this.selectionEnd;
          var scrollTop = this.scrollTop;
          this.value = this.value.substring(0, startPos)+ myValue+ this.value.substring(endPos,this.value.length);
          this.focus();
          this.selectionStart = startPos + myValue.length;
          this.selectionEnd = startPos + myValue.length;
          this.scrollTop = scrollTop;
        } else {
          this.value += myValue;
          this.focus();
        }
      });
    };

    var $sortable5 = $(".answer");
    // $('#sortable5').data('list_1', $('#sortable5').html()); 

    $( "li", $sortable5 ).draggable({
      connectWith: ".question"
    });

    // $('#reset').on('click', function(){
    //   $('.input-sort').val('');
    //   $('#sortable5').html($('#sortable5').data('list_1')); 
    // });

    $("#from_test_rc").bind("submit",function(){
      // Capturamnos el boton de envío
      var btnEnviar = $("#check_rc");
      $.ajax({
        type: $(this).attr("method"),
        url: $(this).attr("action"),
        data:$(this).serialize(),
        beforeSend: function(){
          btnEnviar.text("Enviando");
          btnEnviar.val("Enviando");
          // Para input de tipo button
          btnEnviar.attr("disabled","disabled");
        },complete:function(data){
          btnEnviar.val("Enviar formulario");
          btnEnviar.removeAttr("disabled");
        },success: function(data){
          $("#test_result").html(data);
        },error: function(data){
          alert("Problemas al tratar de enviar el formulario");
        }
      });
      return false;
    });

  });
</script>

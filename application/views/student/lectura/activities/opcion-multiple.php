<?php $index = 1; ?>
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
                    <?php if(!empty($lectura) && !empty($lec_alumno)){echo $lec_alumno->intentos_om."/".$lectura->attemps;} ?>
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
        <?php if($lec_alumno->fin_om == 1){ ?>
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
          <?php if(!empty($reactivos) && $lec_alumno->intentos_om < $lectura->attemps && $lec_alumno->fin_om == 0){ ?>
          <div class="box box-solid box-shadow-sm">
            <div class="box-header bg-teal text-center">
              <h3 class="box-title">Lee la oración y elije la respuesta correcta</h3>
            </div>
            <div class="box-body">
              <form id="from_test" method="post" action="<?php echo base_url().'Movil/Actividades/verificar_om'?>/<?php if(!empty($lectura)){echo $lectura->idLectura;} ?>">
                <?php foreach($reactivos as $reactivo){ ?>
                <!-- total de reactivos -->
                <?php echo "<input type='text' value='".$index."' hidden='true' name='num_r' id='num_r'>"; ?>
                <blockquote class=" bg-block-gray">
                  <h4 class="reactivo">
                    <!-- pregunta -->
                    <input class="question_hide" hidden="hidden" readonly name="question<?php echo $index; ?>" value="<?php echo ($index.") ".$reactivo->pregunta); ?>">
                    <?php echo ($index.") ".$reactivo->pregunta); ?>
                    <!-- identificador -->
                    <?php echo "<input class='question_hide' value='".$reactivo->idOpcionMultiple."' name='idrom".$index."' hidden='hidden'>"; ?>
                  </h4>
                  <!-- respuestas -->
                  <div id="sdd" class=" no-padding-top">
                    <p>
                      <input type="radio" value="A" name="resp<?php echo $index; ?>" class="flat-red">
                      <?php echo $reactivo->resp_1; ?>
                    </p>
                    <p>
                      <input type="radio" value="B" name="resp<?php echo $index; ?>" class="flat-red">
                      <?php echo $reactivo->resp_2; ?>
                    </p>
                    <p>
                      <input type="radio" value="C" name="resp<?php echo $index; ?>" class="flat-red">
                      <?php echo $reactivo->resp_3; ?>
                    </p>
                    <p>
                      <input type="radio" value="D" name="resp<?php echo $index; ?>" class="flat-red">
                      <?php echo $reactivo->resp_4; ?>
                    </p>
                  </div>
                </blockquote>
                <?php $index++; ?>
                <?php } ?>
                <button type="submit" id="verificar" name="verificar" class="btn btn-flat bg-teal">
                  <i class="fa fa-check-circle">
                  </i> Verificar
                </button>
              </form>
            </div>
          </div>
          <?php } ?>
        </div>

      </div>
    </div>
  </section>
</div>
<!-- =====================.FIN CONTENIDO ========================== -->
<script type="text/javascript">
  $(function (){
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    });

    $("#from_test").bind("submit",function(){
      // Capturamnos el boton de envío
      var btnEnviar = $("#btnEnviarVer");
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

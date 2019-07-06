
<!-- =====================.FIN DEL DIV QUE CONTIENE TODO ========================== -->

    <!-- **************         INICIO MODALS GLOBALES        ***************** -->


    <!-- MODAL VER -->
    <div class="modal fade" id="Visualizar" tabindex="-1" role="dialog" 
        aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">

        <div class="modal-dialog modal-body">
        </div>

    </div>
    <div class="modal fade" id="message_bot_inicio" tabindex="-1" role="dialog" 
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-body text-centers"  data-dismiss="modal">
            <table width="100%">
                <tr>
                    <img class="bot_modal" src="<?php echo base_url(); ?>assets/img/theme/bot_level_2.png">
                </tr>
                <tr>
                    <h1 class="bot_message_blue">¡Aquí podrás ver tu racha general, entre más lecturas completes mejores serán tus resultados!</h1>
                </tr>
            </table>
        </div>
    </div>
    <div class="modal fade" id="message_bot_lecturas" tabindex="-1" role="dialog" 
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-body text-centers"  data-dismiss="modal">
            <table width="100%">
                <tr>
                    <img class="bot_modal_maroon" src="<?php echo base_url(); ?>assets/img/theme/bot_level_3.png">
                </tr>
                <tr>
                    <h1 class="bot_message_maroon">¡Lee tantas lecturas como puedas, aquí se mostrarán las que tu profesor publique!</h1>
                </tr>
            </table>
        </div>
    </div>
    <div class="modal fade" id="message_bot_profile" tabindex="-1" role="dialog" 
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-body text-centers"  data-dismiss="modal">
            <table width="100%">
                <tr>
                    <img class="bot_modal_maroon" src="<?php echo base_url(); ?>assets/img/theme/bot_level_5.png">
                </tr>
                <tr>
                    <h1 class="bot_message_green">¡Revisa tu perfil para estar al tanto de las lecturas, editar el tema y más!</h1>
                </tr>
            </table>
        </div>
    </div>
    <div class="modal fade" id="message_bot_detail" tabindex="-1" role="dialog" 
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-body text-centers"  data-dismiss="modal">
            <table width="100%">
                <tr>
                    <img class="bot_modal_maroon" src="<?php echo base_url(); ?>assets/img/theme/bot_level_4.png">
                </tr>
                <tr>
                    <h1 class="bot_message_purple">¡Recuerda completar la lectura para poder contestar los reactivos!</h1>
                </tr>
            </table>
        </div>
    </div>
    

    <!-- ***************          INICIO ACTIONS AJAX           **************** -->

    <script type="text/javascript">
        
        $('document').ready(function (){
            //variable global de la url del proyecto (localhost/kids)
            var base_url = "<?php echo base_url(); ?>";


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
        });
    </script>


    <!-- **************         INICIO CARGA SCRIPTS        ***************** -->
    <script src="<?php echo base_url() ?>assets/jquery/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/theme/js/adminlte.min.js"></script>
    <script src="<?php echo base_url() ?>assets/theme/js/actions-footer.js"></script>
    <script src="<?php echo base_url() ?>assets/iCheck/icheck.min.js"></script>
    
    </body>

</html>

<!-- =====================.FIN DEL DIV QUE CONTIENE TODO ========================== -->

    <!-- **************         INICIO INFO FOOTER        ***************** -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2019 <a href="">ITOSEH</a>.</strong> TICS.
    </footer>


    <!-- **************         INICIO MODALS GLOBALES        ***************** -->

    <!-- MODAL AGREGAR LECTURA -->
    <div id="addLecturaModal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLiveLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-azul" style="color: white;">
                <h3 class="modal-title" id="exampleModalLiveLabel"><i class="fa fa-book"></i> Agregar nueva lectura</h3>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo site_url('Web/Lecturas/addLectura')?>">
                    <div class="form-group">
                        <label for="frm_titulo" class="col-form-label">Título</label>
                        <div class="input-group">
                            <span class="input-group-addon bg-azul"><i class="fa fa-book text-white"></i></span>
                            <input type="text" name="frm_titulo" class="form-control" placeholder="título de la lectura" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="frm_autor" class="col-form-label">Autor</label>
                        <div class="input-group">
                            <span class="input-group-addon bg-azul"><i class="fa fa-user"></i></span>
                            <input type="text" name="frm_autor" class="form-control" placeholder="autor de la lectura" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="frm_desc_corta" class="col-form-label">Descripción corta</label>
                        <div class="input-group">
                            <span class="input-group-addon bg-azul"><i class="fa fa-comments"></i></span>
                            <textarea class="form-control" name="frm_desc_corta" placeholder="Pequeña introducción de la lectura." required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-azul"><i class="fa fa-save"></i> Guardar</button>
                        <a class="btn bg-gray" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- MODAL AGREGAR ALUMNO -->
    <div id="modalNewAlumno" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLiveLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-azul" style="color: white;">
                <h3 class="modal-title" id="exampleModalLiveLabel"><i class="fa fa-user"></i> Registrar un nuevo alumno</h3>
            </div>
            <div class="modal-body">
                <form id="form_rna" method="POST" action="<?php echo site_url('Web/Alumno/registrarAlumno')?>">
                    
                    <div class="row">

                        <div class="col-xs-6">
                            <label for="frm_titulo" class="col-form-label">Nombre(s)</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-azul"><i class="fa fa-user text-white"></i></span>
                                <input type="text" id="rna_nombre" name="ana_nombre" class="form-control req irna" required>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <label for="frm_titulo" class="col-form-label">Genero</label>
                            <div class="input-group col-xs-12">
                                <div class="input-group input-group-m">
                                <div class="input-group-btn">
                                  <button class="btn btn-azul dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Genero
                                    <span class="fa fa-caret-down"></span></button>
                                  <ul class="dropdown-menu">
                                    <li><a id="gen_ninio">masculino</a></li>
                                    <li><a id="gen_ninia">femenino</a></li>
                                  </ul>
                                </div>
                                <!-- /btn-group -->
                                <input id="frm_genero" name="ana_genero" type="text" class="form-control" readonly required>
                              </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <label for="frm_autor" class="col-form-label">Apellido paterno</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-azul"><i class="fa fa-user text-white"></i></span>
                                <input type="text" id="rna_paterno" name="ana_paterno" class="form-control req irna" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <label for="frm_autor" class="col-form-label">Apellido paterno</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-azul"><i class="fa fa-user text-white"></i></span>
                                <input type="text" id="rna_materno" name="ana_materno" class="form-control req irna" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="frm_autor" class="col-form-label">Grado</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-azul"><i class="fa fa-bookmark text-white"></i></span>
                                <input type="text" id="rna_grado" name="ana_grado" class="form-control req irna" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <label for="frm_autor" class="col-form-label">Grupo</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-azul"><i class="fa fa-bookmark-o text-white"></i></span>
                                <input type="text" id="rna_grupo" name="ana_grupo" class="form-control req irna" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <h1></h1>
                    <div class="row">
                        <div class="col-xs-12">
                            <h6 id="desc_na">Completa los campos, posteriormente da <label id="rna_clickhere" class="text-blue">click aquí</label> para generar el usuario y la contraseña del alumno.</h6>

                        </div>
                    </div>

                    <div class="row" id="rna_uyc_div">
                        <div class="col-xs-6">
                            <label for="frm_autor" class="col-form-label">Usuario</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-verde"><i class="fa fa-user text-white"></i></span>
                                <input type="text" id="rna_usuario" name="ana_usuario" class="form-control rna_copy" value="" readonly required>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <label for="frm_autor" class="col-form-label">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-verde"><i class="fa fa-lock text-white"></i></span>
                                <input type="text" id="rna_password" name="ana_password" class="form-control rna_copy" value=""  readonly required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <h1></h1>
                        <div class="col-xs-12">
                            <button id="btn-ana-success" type="submit" class=" btn btn-azul"><i class="fa fa-save"></i> Guardar</button>
                            <a id="reset-frm-na" class="btn bg-gray close-reg-alumno" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- MODAL VER -->
    <div class="modal fade" id="Visualizar" tabindex="-1" role="dialog" 
        aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">

        <div class="modal-dialog modal-body">
        </div>

    </div>


    <!-- ***************          INICIO ACTIONS AJAX           **************** -->

    <script type="text/javascript">
        
        
    </script>


    <!-- js optimizado -->
    <script src="<?php echo base_url() ?>assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/datatables/js/dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/theme/js/adminlte.min.js"></script>
    <script src="<?php echo base_url() ?>assets/theme/js/uuid.min.js"></script>
    <script src="<?php echo base_url() ?>assets/theme/js/actions-footer.js"></script>
    <script src="<?php echo base_url() ?>assets/theme/js/project-ajax.js"></script>
    <script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script> CKEDITOR.replace( 'editor1' ); </script>
    </body>

</html>
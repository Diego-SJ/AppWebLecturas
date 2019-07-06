<!-- =====================.INICIO CONTENIDO ========================== -->
<div class="content-wrapper">

    <!--=========== Content Header (Page header) =========== -->
    <section class="content-header">
          <h1>
            Panel de administración
            <small>Editar alumno</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Web/Home')?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="<?php echo site_url('Web/Alumno')?>"><i class="fa fa-book"></i> Alumnos</a></li>
            <li class="active"><i class="fa fa-pencil"></i> Editar alumno</li>
        </ol>
    </section>
    <!--=========== Content Header (Page header) =========== -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-solid">
                    <div class="box-header bg-primary text-white">
                          <h3 class="box-title"><i class="fa fa-edit"></i> Editar alumno</h3>
                    </div>
                      <!-- /.box-header -->
                    <div class="box-body">
                        <form method="POST" action="<?php echo site_url('Web/Alumno/update_alumno')?>/<?php echo $alumno_data->idAlumno; ?>">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="frm_titulo" class="col-form-label">Nombre(s)</label>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-azul"><i class="fa fa-user text-white"></i></span>
                                        <input value="<?php echo $alumno_data->nombre; ?>" type="text" name="ana_nombre" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-xs-6">
                                    <label for="frm_titulo" class="col-form-label">Genero</label>
                                    <div class="input-group col-xs-12">
                                        <div class="input-group input-group-m">
                                        <div class="input-group-btn">
                                          <button type="button" class="btn bg-azul dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Genero
                                            <span class="fa fa-caret-down"></span></button>
                                          <ul class="dropdown-menu">
                                            <li><a id="gen_ninio">masculino</a></li>
                                            <li><a id="gen_ninia">femenino</a></li>
                                          </ul>
                                        </div>
                                        <!-- /btn-group -->
                                        <input value="<?php echo $alumno_data->genero; ?>" id="frm_genero" name="ana_genero" type="text" class="form-control" readonly required>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="frm_autor" class="col-form-label">Apellido paterno</label>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-azul"><i class="fa fa-user text-white"></i></span>
                                        <input value="<?php echo $alumno_data->a_paterno; ?>"  type="text" name="ana_paterno" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <label for="frm_autor" class="col-form-label">Apellido paterno</label>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-azul"><i class="fa fa-user text-white"></i></span>
                                        <input value="<?php echo $alumno_data->a_materno; ?>"  type="text" name="ana_materno" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="frm_autor" class="col-form-label">Grado</label>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-azul"><i class="fa fa-bookmark text-white"></i></span>
                                        <input value="<?php echo $alumno_data->grado; ?>"  type="text" name="ana_grado" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <label for="frm_autor" class="col-form-label">Grupo</label>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-azul"><i class="fa fa-bookmark-o text-white"></i></span>
                                        <input value="<?php echo $alumno_data->grupo; ?>"  type="text" name="ana_grupo" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="frm_autor" class="col-form-label">Usuario</label>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-verde"><i class="fa fa-user text-white"></i></span>
                                        <input value="<?php echo $alumno_data->usuario; ?>"  type="text" name="" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <label for="frm_autor" class="col-form-label">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-verde"><i class="fa fa-lock text-white"></i></span>
                                        <input value="<?php echo $alumno_data->password; ?>"  type="text" name="" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <h1></h1>
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-azul"><i class="fa fa-refresh"></i> Actualizar</button>
                                    <a href="<?php echo base_url(); ?>Web/Alumno" class="btn bg-gray" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
        <!-- /.box -->
            </div>
    <!-- /.col -->
        </div>
    <!-- /.row -->
    </section>

</div>
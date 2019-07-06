
<!-- =====================.INICIO CONTENIDO ========================== -->
<div class="content-wrapper">

    <!--=========== Content Header (Page header) =========== -->
    <section class="content-header">
          <h1>
            Alumnos que terminaron de leer esta lectura
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Web/admin/Home')?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="<?php echo site_url('Web/admin/Docente')?>"><i class="fa fa-users"></i> Docentes</a></li>
            <li class="active"><i class="fa fa-book"></i> Lecturas</li>
        </ol>
    </section>
    <!--=========== Content Header (Page header) =========== -->

    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                      <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tabla_alumnos" class="table table-bordered table-hover">
                            <thead class="bg-blue">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Grado y grupo</th>
                                    <th class="text-center">Aciertos</th>
                                    <th class="text-center">Incorrectos</th>
                                    <th class="text-center">Calificación</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $indice = 1; ?>
                            <?php if(!empty($detail_alumno_lectura)): ?>
                            <?php foreach($detail_alumno_lectura as $dal): ?>
                              <tr>                                <td class="text-center"><?php echo $indice++; ?></td>
                                <td class="text-center"><?php echo $dal->nombre; ?></td>
                                <td class="text-center"><?php echo $dal->gyg; ?></td>
                                <td class="text-center">
                                    <span class="badge bg-green" style="width: 30px;"><?php echo $dal->aciertos; ?></span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-red" style="width: 30px;"><?php echo $dal->incorrectos; ?></span>        
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-yellow" style="width: 50px;"><?php echo $dal->calificacion; ?></span> 
                                </td>
                                <td class="text-center">
                                  <a href="<?php echo site_url('Web/admin/Docente/detail');?>/<?php echo $dal->idAlumno; ?>" class="btn btn-success"><span class="fa fa-eye text-white"></span></a>
                                </td>
                              </tr>
                            <?php endforeach ?>
                            <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
        <!-- /.box -->
            </div>
    <!-- /.col -->
        </div>
    </section>

</div>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actividades extends CI_Controller {


    /*===================================================================================
                              ** CONSTRUCTOR DE INICIO **
    ===================================================================================*/

    public function __construct(){
        parent:: __construct();
        $this->load->model("Web/Lectura_model");
        $this->load->model("Web/Actividad_model");
        $this->load->model("Movil/Lectura_modelo");
        if($this->session->userdata('USER_ID') == '' || $this->session->userdata('USER_TYPE') != '2') {  
            redirect(base_url().'Welcome');  
        } 
    }


    /*===================================================================================
                              ** INICIO CONTROLLER REACTIVOS **
    ===================================================================================*/

    // VISTA ELIMINAR
    public function viewEliminarReactivo($id_actividad){
        $data = array( 'data_actividad' => $this->Actividad_model->getActividad($id_actividad) );
        $this->load->view("teacher/lectura/actividades/deleteActivity", $data); 
    }


    // ELIMINAR ACTIVIDAD
    public function eliminarActivity($id_pagina){
        $id_lectura = $this->input->post("id_lectura_dr");
        $id_actividad = $this->input->post("id_actividad_dr");
        $id_om = $this->input->post("id_om_dr");
        $id_rc = $this->input->post("id_rc_dr");
        $id_vf = $this->input->post("id_vf_dr");

        if($id_om != 0 && $id_rc == 0 && $id_vf == 0){//OPCION MULTPLE
            if($this->Actividad_model->deleteOM($id_om)){
                if($this->Actividad_model->deleteActividad($id_actividad)){
                    $this->checkEnableActivities($id_lectura,1);
                }
            }
        } elseif ($id_om == 0 && $id_rc == 0 && $id_vf != 0) {// VERDADERO O FALSO
            if($this->Actividad_model->deleteVF($id_vf)){
                if($this->Actividad_model->deleteActividad($id_actividad)){
                    $this->checkEnableActivities($id_lectura,2);
                }
            }
        } elseif ($id_om == 0 && $id_rc != 0 && $id_vf == 0) {// RELACIONAR COLUMNAS
            if($this->Actividad_model->deleteRC($id_rc)){
                if($this->Actividad_model->deleteActividad($id_actividad)){
                    $this->checkEnableActivities($id_lectura,3);
                }
            }
        } 
        redirect(base_url()."Web/Actividades/activities/".$id_lectura);
    }

    // VISUALIZAR ACTIVIDAD 
    public function getActividad($id_reactivo){
        $data =  $this->Actividad_model->getActividad($id_reactivo);
        $id_actividad = $data->idActividad;

        if($id_actividad == 1){
            $id_om = $data->idOpcionMultiple;
            $om_array = array(
                'opc_m' => $this->Actividad_model->getReactivoOpMul($id_om)
            );
            $this->load->view("teacher/lectura/actividades/contenido_om", $om_array);
        }

        if($id_actividad == 2){
            $id_vf = $data->idVerdaderoFalso;
            $vf_array = array(
                'ver_f' => $this->Actividad_model->getReactivoVerFal($id_vf)
            );
            $this->load->view("teacher/lectura/actividades/contenido_vf", $vf_array);
        }

        if($id_actividad == 3){
            $id_rc = $data->idRelacionarColumnas;
            $rc_array = array(
                'rel_c' => $this->Actividad_model->getReactivoRelCol($id_rc)
            );
            $this->load->view("teacher/lectura/actividades/contenido_rc", $rc_array);
        }
    }

    // VISTA EDITAR
    public function viewEditarReactivo($id_reactivo){
        $data =  $this->Actividad_model->getActividad($id_reactivo);
        $id_actividad = $data->idActividad;

        if($id_actividad == 1){
            $id_om = $data->idOpcionMultiple;
            $om_array = array(
                'opc_m' => $this->Actividad_model->getReactivoOpMul($id_om),
                'id_lectura' => $this->Actividad_model->getActividad($id_reactivo)
            );
            $this->load->view("teacher/lectura/actividades/edit-om", $om_array);
        }

        if($id_actividad == 2){
            $id_vf = $data->idVerdaderoFalso;
            $vf_array = array(
                'ver_f' => $this->Actividad_model->getReactivoVerFal($id_vf),
                'id_lectura' => $this->Actividad_model->getActividad($id_reactivo)
            );
            $this->load->view("teacher/lectura/actividades/edit-vf", $vf_array);
        }

        if($id_actividad == 3){
            $id_rc = $data->idRelacionarColumnas;
            $rc_array = array(
                'rel_c' => $this->Actividad_model->getReactivoRelCol($id_rc),
                'id_lectura' => $this->Actividad_model->getActividad($id_reactivo)
            );
            $this->load->view("teacher/lectura/actividades/edit-rc", $rc_array);
        }
    }

    // VISTA ALL ACTIVITIES
    public function activities($id_lectura){
        $id_usuario = $this->session->userdata('USER_ID'); 
        if($this->Lectura_model->getLectura($id_lectura) ){
            $data = array(
                'detail_lectura' => $this->Lectura_model->getLectura($id_lectura) 
            );

            $reactivosLectura = array (
                'reactivos' => $this->Actividad_model->getActivitiesLectura($id_lectura,$id_usuario)
            );

            $this->load->view('layouts/header');
            $this->load->view('teacher/lectura/header_detail',$data);
            $this->load->view('teacher/lectura/actividades/settings_reactivos',$reactivosLectura);
            $this->load->view('layouts/footer');
        } else {
            redirect(base_url()."Web/Lecturas");
        } 
    }

    // agregar opcion multiple
    public function addOpcionMultiple($id){
        //traer datos del formulario
        $id_usuario = $this->session->userdata('USER_ID'); 
        $id_lectura = $id;
        $id_auxiliar   = uniqid();
        $tipo_reactivo = $this->input->post("tr_om");

        $pregunta   = $this->input->post("fom_pregunta");
        $resp_1     = $this->input->post("fom_resp1");
        $resp_2     = $this->input->post("fom_resp2");
        $resp_3     = $this->input->post("fom_resp3");
        $resp_4     = $this->input->post("fom_resp4");
        $correcto   = $this->input->post("fom_resp_chk");

        //guardar datos en array (clave,valor)
        $data = array (
            'id_aux' => $id_auxiliar,
            'pregunta' => $pregunta,
            'resp_1'   => $resp_1,
            'resp_2'   => $resp_2,
            'resp_3'   => $resp_3,
            'resp_4'   => $resp_4,
            'resp_correcta' => $correcto,
            'idLectura'     => $id_lectura,
            'idUsuario'     => $id_usuario
        );

        //verificar la insercion del reactivo de tipo om
        if($this->Actividad_model->insertarOpcionMultiple($data)){

            //traer id de la pregunta
            if($idOP = $this->Actividad_model->traerId($id_auxiliar,"OpcionMultiple")){
                $data_om = array (
                    'idActividad'          => $tipo_reactivo,
                    'idLectura'            => $id_lectura,
                    'idOpcionMultiple'     => $idOP->idOpcionMultiple,
                    'idVerdaderoFalso'     => "",
                    'idRelacionarColumnas' => "",
                    'idUsuario'            => $id_usuario
                );
                //insertar la actividad en la tabla relacionada
                if($this->Actividad_model->publicarActividad($data_om)){
                    if($this->checkEnableActivities($id_lectura,1)){
                        redirect(base_url()."Web/Actividades/activities/".$id_lectura);
                    }
                }
            }
        }  
    }

    // actualizar om
    public function updateOM($id_om){
        $pregunta   = $this->input->post("fom_pregunta");
        $resp_1     = $this->input->post("fom_resp1");
        $resp_2     = $this->input->post("fom_resp2");
        $resp_3     = $this->input->post("fom_resp3");
        $resp_4     = $this->input->post("fom_resp4");
        $correcto   = $this->input->post("fom_resp_chk");
        $id_lectura   = $this->input->post("idLectura");

        //guardar datos en array (clave,valor)
        $data = array (
            'pregunta' => $pregunta,
            'resp_1'   => $resp_1,
            'resp_2'   => $resp_2,
            'resp_3'   => $resp_3,
            'resp_4'   => $resp_4,
            'resp_correcta' => $correcto
        );

        if($this->Actividad_model->updateOpcMul($data,$id_om)){
            redirect(base_url()."Web/Actividades/activities/".$id_lectura);
        } else {
            echo "no se pudo actualizar la pagina";
        }  
    }

    // agregar relacionar columas
    public function addRelacionarColumnas($id){
        //traer datos del formulario
        $id_usuario = $this->session->userdata('USER_ID'); 
        $id_lectura    = $id;
        $id_auxiliar   = uniqid();
        $tipo_reactivo = $this->input->post("tr_rc");

        // //oraciones
        $frc_o1     = $this->input->post("frc_o1");
        $frc_o2     = $this->input->post("frc_o2");
        $frc_o3     = $this->input->post("frc_o3");
        $frc_o4     = $this->input->post("frc_o4");
        //index de respuesta
        $frc_slc1   = $this->input->post("frc_slc1");
        $frc_slc2   = $this->input->post("frc_slc2");
        $frc_slc3   = $this->input->post("frc_slc3");
        $frc_slc4   = $this->input->post("frc_slc4");
        //respuestas
        $frc_r1     = $this->input->post("frc_r1");  
        $frc_r2     = $this->input->post("frc_r2");  
        $frc_r3     = $this->input->post("frc_r3");  
        $frc_r4     = $this->input->post("frc_r4");    

        // //guardar datos en array (clave,valor)
        $data = array (
            'id_aux' => $id_auxiliar,
            'preg_1' => $frc_o1,
            'preg_2' => $frc_o2,
            'preg_3' => $frc_o3,
            'preg_4' => $frc_o4,
            'idx_r1' => $frc_slc1,
            'idx_r2' => $frc_slc2,
            'idx_r3' => $frc_slc3,
            'idx_r4' => $frc_slc4,
            'resp_1' => $frc_r1,
            'resp_2' => $frc_r2,
            'resp_3' => $frc_r3,
            'resp_4' => $frc_r4,
            'idLectura'  => $id_lectura,
            'idUsuario'     => $id_usuario
        );

        // //verificar la insercion del reactivo de tipo rc
        if($this->Actividad_model->insertarRelacionarColumnas($data)){

            //traer id de la pregunta
            if($idRC = $this->Actividad_model->traerId($id_auxiliar,"RelacionarColumnas")){
                $data_rc = array (
                    'idActividad'          => $tipo_reactivo,
                    'idLectura'            => $id_lectura,
                    'idOpcionMultiple'     => "",
                    'idVerdaderoFalso'     => "",
                    'idRelacionarColumnas' => $idRC->idRelacionarColumnas,
                    'idUsuario'            => $id_usuario
                );
                //insertar la actividad en la tabla relacionada
                if($this->Actividad_model->publicarActividad($data_rc)){
                    if($this->checkEnableActivities($id_lectura,3)){
                        redirect(base_url()."Web/Actividades/activities/".$id_lectura);
                    }
                }
            }
        }  
    }

    public function updateRC($id_rc){
        //traer datos del formulario
        $id_lectura   = $this->input->post("idLectura");

        // //oraciones
        $frc_o1     = $this->input->post("frc_o1");
        $frc_o2     = $this->input->post("frc_o2");
        $frc_o3     = $this->input->post("frc_o3");
        $frc_o4     = $this->input->post("frc_o4");
        //index de respuesta
        $frc_slc1   = $this->input->post("frc_slc1");
        $frc_slc2   = $this->input->post("frc_slc2");
        $frc_slc3   = $this->input->post("frc_slc3");
        $frc_slc4   = $this->input->post("frc_slc4");
        //respuestas
        $frc_r1     = $this->input->post("frc_r1");  
        $frc_r2     = $this->input->post("frc_r2");  
        $frc_r3     = $this->input->post("frc_r3");  
        $frc_r4     = $this->input->post("frc_r4");    

        // //guardar datos en array (clave,valor)
        $data = array (
            'preg_1' => $frc_o1,
            'preg_2' => $frc_o2,
            'preg_3' => $frc_o3,
            'preg_4' => $frc_o4,
            'idx_r1' => $frc_slc1,
            'idx_r2' => $frc_slc2,
            'idx_r3' => $frc_slc3,
            'idx_r4' => $frc_slc4,
            'resp_1' => $frc_r1,
            'resp_2' => $frc_r2,
            'resp_3' => $frc_r3,
            'resp_4' => $frc_r4
        );

        // //verificar la insercion del reactivo de tipo rc
        if($this->Actividad_model->updateRelCol($data,$id_rc)){
            redirect(base_url()."Web/Actividades/activities/".$id_lectura);
        } else {
            echo "no se pudo actualizar el reactivo";
        }
    }

    // verdadero o falso
    public function addVerdaderoFalso($id){
        //traer datos del formulario
        $id_usuario = $this->session->userdata('USER_ID'); 
        $id_lectura    = $id;
        $id_auxiliar   = uniqid();
        $tipo_reactivo = $this->input->post("tr_vf");

        // oraciones - respuesta
        $fvf_or     = $this->input->post("fvf_or");
        $fvf_slc     = $this->input->post("fvf_slc");   

        // //guardar datos en array (clave,valor)
        $data = array (
            'id_aux'        => $id_auxiliar,
            'pregunta'      => $fvf_or,
            'resp_correcta' => $fvf_slc,
            'idLectura'     => $id_lectura,
            'idUsuario'     => $id_usuario
        );

        // //verificar la insercion del reactivo de tipo rc
        if($this->Actividad_model->insertarVerdaderoFlaso($data)){

            //traer id de la pregunta
            if($idRC = $this->Actividad_model->traerId($id_auxiliar,"VerdaderoFalso")){
                $data_vf = array (
                    'idActividad'          => $tipo_reactivo,
                    'idLectura'            => $id_lectura,
                    'idOpcionMultiple'     => "",
                    'idVerdaderoFalso'     => $idRC->idVerdaderoFalso,
                    'idRelacionarColumnas' => "",
                    'idUsuario'            => $id_usuario
                );
                //insertar la actividad en la tabla relacionada
                if($this->Actividad_model->publicarActividad($data_vf)){
                    if($this->checkEnableActivities($id_lectura,2)){
                        redirect(base_url()."Web/Actividades/activities/".$id_lectura);
                    }
                }
            }
        }
    }  

    public function updateVF($id_vf){
        //traer datos del formulario
        $id_lectura   = $this->input->post("idLectura");

        // oraciones - respuesta
        $fvf_or     = $this->input->post("fvf_or");
        $fvf_slc     = $this->input->post("fvf_slc");   

        // //guardar datos en array (clave,valor)
        $data = array (
            'pregunta' => $fvf_or,
            'resp_correcta' => $fvf_slc
        );

        // //verificar la insercion del reactivo de tipo rc
        if($this->Actividad_model->updateVerFal($data,$id_vf)){
            redirect(base_url()."Web/Actividades/activities/".$id_lectura);
        } else {
            echo "no se pudo actualizar el reactivo";
        }
    }

    //VERIFICAR EL TIPO DE ACTIVIDAD QUE ESTARAN DISPONIBLES PARA CADA LECTURA
    public function checkEnableActivities($id_lectura,$tipo_actividad){
        $id_usuario = $this->session->userdata('USER_ID'); 
        $view_check_activity = $this->Actividad_model->checkIfExistActivities($id_lectura,$id_usuario);
        $tabla_lectura_array = $this->Lectura_modelo->getLecturaArray($id_lectura);

        switch ($tipo_actividad) {
            case 1://opcion multiple
                if($view_check_activity['check_exist_om'] != 0){
                    $data = array( 'check_om' => 1, );
                    $this->Lectura_model->updateLectura($id_lectura,$data);
                } else if($view_check_activity['check_exist_om'] == 0){
                    $data = array( 'check_om' => 0, );
                    $this->Lectura_model->updateLectura($id_lectura,$data);
                }
            break;
            case 2://verdadero falso
                if($view_check_activity['check_exist_vf'] != 0){
                    $data = array( 'check_vf' => 1, );
                    $this->Lectura_model->updateLectura($id_lectura,$data);
                } else if($view_check_activity['check_exist_vf'] == 0){
                    $data = array( 'check_vf' => 0, );
                    $this->Lectura_model->updateLectura($id_lectura,$data);
                }
            break;
            case 3://relacionar columnas
                if($view_check_activity['check_exist_rc'] != 0){
                    $data = array( 'check_rc' => 1, );
                    $this->Lectura_model->updateLectura($id_lectura,$data);
                } else if($view_check_activity['check_exist_rc'] == 0){
                    $data = array( 'check_rc' => 0, );
                    $this->Lectura_model->updateLectura($id_lectura,$data);
                }
            break;
        }

        $tbl_lec = $this->Lectura_modelo->getLecturaArray($id_lectura);
        $num_active_activities = ($tbl_lec['check_om']+$tbl_lec['check_vf']+$tbl_lec['check_rc']);
        $data = array( 'num_active_activities' => $num_active_activities, );
        if($this->Lectura_model->updateLectura($id_lectura,$data)){
            return true;
        } else {
            return false;
        }
    }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecturas extends CI_Controller {


    /*===================================================================================
                              ** CONSTRUCTOR DE INICIO **
    ===================================================================================*/

    public function __construct(){
        parent:: __construct();
        $this->load->model("Web/Lectura_model");

        if($this->session->userdata('USER_ID') == '' || $this->session->userdata('USER_TYPE') != '2') {  
            redirect(base_url().'Welcome');  
        }  
    }

	public function index(){
        $id_usuario = ($this->session->userdata('USER_ID'));
          
        $data = array (
            'lecturas' => $this->Lectura_model->getAllLecturas($id_usuario)
        );
            
        $this->load->view('layouts/header');
        $this->load->view('teacher/lectura/lecturas', $data);
        $this->load->view('layouts/footer');  
	}

   /*===================================================================================
                              ** INICIO CONTROLLER LECTURAS **
    ===================================================================================*/

    public function addLectura(){
        $id_usuario = ($this->session->userdata('USER_ID'));
        $titulo = $this->input->post("frm_titulo");
        $autor = $this->input->post("frm_autor");
        $desc_corta = $this->input->post("frm_desc_corta");

        $data = array (
            'titulo' => $titulo,
            'autor' => $autor,
            'desc_corta' => $desc_corta,
            'fecha_creacion' => date('Y-m-d'),
            'idUsuario' => $id_usuario,
            'idEstado' => '1'
        );

        if($this->Lectura_model->insertarLectura($data)){
            redirect(base_url()."Web/Lecturas");
        }
    }

    public function editLectura($id_lectura){
        if($this->Lectura_model->getLectura($id_lectura) ){
            $data = array (
                'lectura' => $this->Lectura_model->getLectura($id_lectura)
            );

            $this->load->view('layouts/header');
            $this->load->view('teacher/lectura/update_lectura',$data);
            $this->load->view('layouts/footer');
        }   else  {  
            redirect(base_url().'Web/Lecturas');  
        } 
    }

    public function updtLectura($id){
        $id_lectura = $id;
        $titulo = $this->input->post("frm_titulo");
        $autor = $this->input->post("frm_autor");
        $desc_corta = $this->input->post("frm_desc_corta");


        $data = array (
            'titulo' => $titulo,
            'autor' => $autor,
            'desc_corta' => $desc_corta
        );

        if($this->Lectura_model->updateLectura($id_lectura,$data)){
            $this->session->set_flashdata('success', '¡Lectura actualzada!');
            redirect(base_url()."Web/Lecturas/detail/".$id_lectura);
        } else {
            $this->session->set_flashdata('error', '¡No se pudo actualizar, intenta más tarde!');
            redirect(base_url()."Web/Lecturas/detail/".$id_lectura);
        } 
    }

    public function viewDeleteLectura($id_lectura){
        $data = array( 'lectura' => $this->Lectura_model->getLectura($id_lectura) );
        $this->load->view("teacher/lectura/delete", $data);
    }

    public function deleteLectura($id_lectura){
        if($this->Lectura_model->eliminarLectura($id_lectura)){
            $this->session->set_flashdata('success', '¡Lectura eliminada!');
            redirect(base_url()."Web/Lecturas");
        } else {
            $this->session->set_flashdata('error', '¡No se pudo eliminar, intenta más tarde!');
            redirect(base_url()."Web/Lecturas");
        }
    }

    public function detail($id_lectura){
        if($this->Lectura_model->getLectura($id_lectura) ){
            $data = array(
                'detail_lectura' => $this->Lectura_model->getLectura($id_lectura) 
            );
            $data_detail = array(
                'detail_alumno_lectura' => $this->Lectura_model->detailLectura($id_lectura) 
            );

            $this->load->view('layouts/header');
            $this->load->view('teacher/lectura/header_detail',$data);
            $this->load->view('teacher/lectura/detail_lectura',$data_detail);
            $this->load->view('layouts/footer');
        } else {
            redirect(base_url()."Web/Lecturas");
        }
    }

    public function updtStatus($id){
        $id_lectura = $id;
        $idEstado   = $this->input->post("status_enabled_lecture");

        if($idEstado == 1)
            $idEstado = 2;
        else 
            $idEstado = 1;

        $data = array ( 'idEstado' => $idEstado );

        if($this->Lectura_model->updateLectura($id_lectura,$data)){
            $this->session->set_flashdata("success","Éxito");
            redirect(base_url()."Web/Lecturas/detail/".$id);
        } else {
            $this->session->set_flashdata("error","No se pudo actualizar.");
            redirect(base_url()."Web/Lecturas/detail/".$id);
        }
    }

    public function attemps($id){
        $id_lectura = $id;
        $attemps    = $this->input->post("num_attemps");

        $data = array (
            'attemps' => $attemps,
        );

        if($this->Lectura_model->updateLectura($id_lectura,$data)){
            redirect(base_url()."Web/Lecturas/detail/".$id);
        } else {
            echo "error no se actualizao";
        }
    }

    public function tipoLectura($id_lectura){
        $id_lectura   = $id_lectura;
        $lecture_type = $this->input->post("lecture_type");
        $data = array ( 'tipo_lectura' => $lecture_type );

        if($this->Lectura_model->updateLectura($id_lectura,$data)){
            redirect(base_url()."Web/Pagina/pages/".$id_lectura);
        } else {
            $this->set->flash_data("lecture_type","Algo salio mal, intenta más tarde.");
        }
    }

}

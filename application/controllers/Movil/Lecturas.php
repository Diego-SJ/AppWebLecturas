<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecturas extends CI_Controller {

	public function __construct(){
	    parent:: __construct();
	    $this->load->model("Web/Pagina_model");
        $this->load->model("Web/Fichero_model");
	    $this->load->model("Movil/Lectura_modelo");
        if($this->session->userdata('USER_ID') == '' || $this->session->userdata('USER_TYPE') != '1') {  
            redirect(base_url());  
        } 
	}

	public function index(){
		$id_teacher =  $this->session->userdata('USER_TEACHER');    
        $data = array ('lecturas_teacher' => $this->Lectura_modelo->getLecturasByTeacher($id_teacher));

        $this->load->view('student/Layout/header');
        $this->load->view('student/lectura/lectura', $data);
        $this->load->view('student/Layout/footer');
	}

	public function detail($id_lectura){
		$id_alumno   = $this->session->userdata('USER_ID');
        $data_insert = array(
            'idLectura'   => $id_lectura,
            'idAlumno'    => $id_alumno,
            'fecha'       => date('Y-m-d'),
            'idEstado'    => "3"
        );

        if($this->Lectura_modelo->verifyStartLecture($id_lectura,$id_alumno)){
            if($this->Lectura_modelo->getInfoLectura($id_lectura)){
                $id_alumno =  $this->session->userdata('USER_ID');
            
                $data = array (
                    'lectura_info'        => $this->Lectura_modelo->getInfoLectura($id_lectura),
                    'lectura_detail'      => $this->Lectura_modelo->getLecturaDetailByStudent($id_lectura,$id_alumno),
                    'lectura_finished_by' => $this->Lectura_modelo->getLecturaFinishedBy($id_lectura)
                );

                $this->load->view('student/Layout/header');
                $this->load->view('student/lectura/detail',$data);
                $this->load->view('student/Layout/footer');
            } else {
                redirect(base_url()."Movil/Lecturas");
            }
        } else if($this->Lectura_modelo->insertarLecturaAlumno($data_insert)) {
            if($this->Lectura_modelo->getInfoLectura($id_lectura)){
                $id_alumno =  $this->session->userdata('USER_ID');
            
                $data = array (
                    'lectura_info'        => $this->Lectura_modelo->getInfoLectura($id_lectura),
                    'lectura_detail'      => $this->Lectura_modelo->getLecturaDetailByStudent($id_lectura,$id_alumno),
                    'lectura_finished_by' => $this->Lectura_modelo->getLecturaFinishedBy($id_lectura)
                );

                $this->load->view('student/Layout/header');
                $this->load->view('student/lectura/detail',$data);
                $this->load->view('student/Layout/footer');
            } else {
                redirect(base_url()."Movil/Lecturas");
            }
        } else {
            redirect(base_url()."Movil/Lecturas");
        }
	}

	public function read($id_lectura){
    	$id_alumno = $this->session->userdata('USER_ID');
        if($this->Lectura_modelo->verifyStartLecture($id_lectura,$id_alumno)){
            $data = array(
                'detail_lectura' => $this->Lectura_modelo->getInfoLectura($id_lectura),
                'paginas'        => $this->Pagina_model->getPaginasLectura($id_lectura),
                'info_file'      => $this->Fichero_model->getPdf($id_lectura) 
            );
            $this->load->view('student/lectura/reading', $data);
        } else {
            redirect(base_url()."Movil/Lecturas");
        }
     //$this->load->view("student/lectura/index");
    }

    public function finishLectura($id_lectura){
        if($this->Lectura_modelo->getInfoLectura($id_lectura)){
            $id_alumno = $this->session->userdata('USER_ID');

            $data = array(
                'reading'  => "Completo", //lectura completa
                'idEstado' => "4" //estado pendiente
            );

            if($this->Lectura_modelo->updtLecturaAlumno($id_lectura,$id_alumno,$data)){
                redirect(base_url()."Movil/Lecturas/detail/".$id_lectura);
            } else {
                echo "ocurrio un error, contacta al administrador.";
            }
            
        } else {
            redirect(base_url()."Movil/Lecturas");
        }
    }
}
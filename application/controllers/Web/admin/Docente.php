<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class docente extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model("Web/admin/Docente_model");
        $this->load->model("Web/Alumno_model");
    }

    public function index(){
      if($this->session->userdata('USER_ID') != '' && $this->session->userdata('USER_TYPE') == '3') {  
          //$id_usuario =  $this->session->userdata('USER_ID');
          
          $data = array(
          't_Docentes' => $this->Docente_model->getTotalDocentes(), 
          );

          $this->load->view('admin/layouts/header');
          $this->load->view('admin/docente/docente',$data);
          $this->load->view('admin/layouts/footer');
      } else  {  
          redirect(base_url().'Welcome');  
      } 
    }

    public function studentsTeacher($id_docente){
      if($this->session->userdata('USER_ID') != '' && $this->session->userdata('USER_TYPE') == '3') { 

          $data = array(
              'alumnos' => $this->Alumno_model->getAlumnosByTeacher($id_docente)
          );

          $this->load->view('admin/layouts/header');
          $this->load->view('admin/docente/alumno', $data);
          $this->load->view('admin/layouts/footer');
      } else  {  
          redirect(base_url().'Welcome');  
      } 
    }

    public function detail($id_alumno){
        if($this->session->userdata('USER_ID') != '' && $this->session->userdata('USER_TYPE') == '3') {  
            if($this->Alumno_model->getAlumno($id_alumno) ){
                $data = array(
                    'alumno'          => $this->Alumno_model->getAlumno($id_alumno),
                    'alumno_detail'   => $this->Alumno_model->getDetailAlumnoToTeacher($id_alumno),
                    'alumno_lecturas' => $this->Alumno_model->getLecturasAlumnoToTeacher($id_alumno)
                );

                $this->load->view('admin/layouts/header');
                $this->load->view('admin/docente/alumno_detail', $data);
                $this->load->view('admin/layouts/footer');

            } else {
                redirect(base_url()."Web/admin/Docente");
            }
        } else  {  
            redirect(base_url().'Welcome');  
        } 
    }
}

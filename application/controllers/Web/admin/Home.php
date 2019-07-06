<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model("Web/admin/Home_model");
    }

    public function index(){

      if($this->session->userdata('USER_ID') != '' && $this->session->userdata('USER_TYPE') == '3') {  
          $data = array(
            't_alumno' => $this->Home_model->getTotalAlumnos(), 
            't_Lecturas' => $this->Home_model->getTotaLecturas(), 
            't_Docentes' => $this->Home_model->getTotalDocentes(), 
          );

          $this->load->view('admin/layouts/header');
          $this->load->view('admin/home/inicio',$data);
          $this->load->view('admin/layouts/footer');
      } else  {  
          redirect(base_url().'Welcome');  
      } 
    }

}

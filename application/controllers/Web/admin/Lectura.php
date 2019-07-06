<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lectura extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model("Web/admin/Lectura_model");
    }

    public function index(){

      if($this->session->userdata('USER_ID') != '' && $this->session->userdata('USER_TYPE') == '3') {  
          $data = array(
          't_lectura' => $this->Lectura_model->getTotaLecturas() 
          );

          $this->load->view('admin/layouts/header');
          $this->load->view('admin/lectura/lectura',$data);
          $this->load->view('admin/layouts/footer');
      } else  {  
          redirect(base_url().'Welcome');  
      } 
    }


  public function lecturas_docente($id_usuario){
       if($this->session->userdata('USER_ID') != '' && $this->session->userdata('USER_TYPE') == '3') {  
          $data = array(
          'lecturas_docentes' => $this->Lectura_model->getTotaLecturas($id_usuario) 
          );

          $this->load->view('admin/layouts/header');
          $this->load->view('admin/docente/lecturas',$data);
          $this->load->view('admin/layouts/footer');
      } else  {  
          redirect(base_url().'Welcome');  
      } 
  }

  public function detail($id_lectura){
      if($this->session->userdata('USER_ID') != '' && $this->session->userdata('USER_TYPE') == '3') {  
          if($this->Lectura_model->getLectura($id_lectura) ){
              $data_detail = array(
                  'detail_alumno_lectura' => $this->Lectura_model->detailLectura($id_lectura) 
              );

              $this->load->view('admin/layouts/header');
              $this->load->view('admin/docente/lectura_detail',$data_detail);
              $this->load->view('admin/layouts/footer');
          } else {
              redirect(base_url()."Web/Lecturas");
          }
      } else  {  
          redirect(base_url().'Welcome');  
      } 
  }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model("Web/Home_model");
        $this->load->model("Web/Usuario_model");
        if($this->session->userdata('USER_ID') == '' || $this->session->userdata('USER_TYPE') != '2') {  
            redirect(base_url().'Welcome');  
        } 
    }

    public function index(){
      $id_usuario =  $this->session->userdata('USER_ID');
          
      $data = array(
        'teacher_alumnos'  => $this->Home_model->getAlumosDashboard($id_usuario), 
        'teacher_lecturas' => $this->Home_model->getLecturasDashboard($id_usuario),
        'teacher_info'     => $this->Home_model->getDocente($id_usuario)
      );

      $this->load->view('layouts/header');
      $this->load->view('teacher/home/inicio',$data);
      $this->load->view('layouts/footer');
    }

    public function updateUsuario($id_usuario){
      $nombre  = $this->input->post("inputName");
      $paterno = $this->input->post("inputPaterno");
      $materno = $this->input->post("inputMaterno");
      $correo  = $this->input->post("inputCorreo");

      $data = array(
        'nombre'    => $nombre,
        'a_paterno' => $paterno,
        'a_materno' => $materno,
        'correo'    => $correo
      );

      if($this->Home_model->updtDocente($id_usuario,$data))redirect(base_url().'Web/Home'); 
    }

    public function updatePassword($id_usuario){
      $status_errors = [];
      $ps  = $this->input->post("inputPassActual");
      $pn  = $this->input->post("inputPassNueva");
      $pr  = $this->input->post("inputPassConfirm");

      if(!$this->isNull($ps,$pn,$pr)){
        $fila = $this->Usuario_model->getDataTeacer($id_usuario);
        if (password_verify(
                base64_encode(
                    hash('sha256', $ps, true)
                ),
                $fila['password']
        )){
          if($pn == $pr){

            $new_password_r = password_hash(base64_encode(hash('sha256', 
            $this->input->post("inputPassConfirm"), true)),PASSWORD_DEFAULT);
            
            $data = array('password' => $new_password_r, );
      
            if($this->Home_model->updtDocente($id_usuario,$data)){
              $this->session->set_flashdata('successUpdt', 'Contraseña actualizada.');  
              redirect(base_url().'Web/Home'); 
            }
          } else {
            $this->session->set_flashdata('error_three', 'La contraseñas no coinciden.'); 
            redirect(base_url().'Web/Home');
          }
        } else {
          $this->session->set_flashdata('error_two', 'La contraseña actual es incorrecta.'); 
          redirect(base_url().'Web/Home');
        }
      } else {
        $this->session->set_flashdata('error_one', 'Completa todos los campos.'); 
        redirect(base_url().'Web/Home');
      }
    }

    function isNull($ps,$pn, $pr){
    if(strlen(trim($ps)) < 1 || strlen(trim($pn)) < 1 || strlen(trim($pr)) < 1){
      return true;
    } else {
      return false;
    }   
  }

}

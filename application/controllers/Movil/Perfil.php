<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model("Movil/Perfil_modelo");
        if($this->session->userdata('USER_ID') == '' || $this->session->userdata('USER_TYPE') != '1') {  
            redirect(base_url());  
        } 
    }

    public function index(){
      	$id_alumno  =  $this->session->userdata('USER_ID');
        $id_teacher =  $this->session->userdata('USER_TEACHER');

        $teacher = $this->Perfil_modelo->getTotalLBYTAvtivas($id_teacher);
        $alumno  = $this->Perfil_modelo->getTotalLBYACompletas($id_alumno);

        if($teacher['total_lec_publicadas'] != 0){
          $progress_bar = round((100/$teacher['total_lec_publicadas'])*$alumno['total_lec_completadas']);
        } else {
          $progress_bar = 0;
        }
        
        $data = array (
          'lectura_complete' => $this->Perfil_modelo->getLecturasComplete($id_alumno),
          'lectura_pending'  => $this->Perfil_modelo->getLecturasPendiente($id_alumno),
          'student_info'     => $this->Perfil_modelo->getinfoAlumno($id_alumno),
          'progreso'         => $progress_bar, 
        );

        $this->load->view('student/Layout/header');
        $this->load->view('student/perfil/profile', $data);
        $this->load->view('student/Layout/footer');
    }

    public function theme(){
        $id_alumno = $this->input->post("idAlumno");
        $theme     = $this->input->post("pick_thee");

        $data = array( 'theme' => $theme );

        if($this->Perfil_modelo->theme($data,$id_alumno)){
            $_SESSION['USER_THEME']=$theme; 
            redirect(base_url().'Movil/Perfil'); 
        } else {
            echo "error no se actualizao";
        }
    }

    public function editPerfil(){
        $id_alumno = $this->session->userdata('USER_ID');
        
        $a_nombre = ucwords(trim($this->input->post("inputName")));
        $a_paterno    = strtolower(trim($this->input->post("ep_paterno")));
        $a_materno = strtolower(trim($this->input->post("ep_materno")));
        $a_usuario    = strtolower(trim($this->input->post("ep_usuario")));
        $a_grado = strtolower(trim($this->input->post("ep_grado")));
        $a_grupo    = strtoupper(trim($this->input->post("ep_grupo")));


        $data = array(
          'nombre'    => $a_nombre,
          'a_paterno'    => $a_paterno,
          'a_materno'    => $a_materno,
          'usuario'    => $a_usuario,
          'grado'    => $a_grado,
          'grupo'    => $a_grupo
          
        );

        if($this->Perfil_modelo->editAlumno($id_alumno,$data)){
            $_SESSION['USER_NAME']=$a_nombre; 
            $_SESSION['USER_NAME_C']=$a_nombre." ".$a_paterno." ".$a_materno; 
            $_SESSION['USER_USER']=$a_usuario; 
            $this->session->set_flashdata('success', 'Perfil actualizado.'); 
            redirect(base_url().'Movil/Perfil'); 
        } else {
            $this->session->set_flashdata('error', 'No se pudo actualizar.'); 
            redirect(base_url().'Movil/Perfil'); 
        }
    }

    public function editPassword(){
        $id_alumno = $this->session->userdata('USER_ID');
        $a_passdb = $this->session->userdata('USER_PASS');
        $a_contrasenaActual = $this->input->post("ep_pass_actual");
        $a_nuevaContrsena    = $this->input->post("ep_pass_nueva");
        $a_confirmarContrasena    = $this->input->post("ep_pass_confirm");

        if($a_passdb == $a_contrasenaActual){
          if($a_nuevaContrsena == $a_confirmarContrasena) {
            $data = array( 'password' => $a_nuevaContrsena );
            if($this->Perfil_modelo->editAlumno($id_alumno,$data)){
              $_SESSION['USER_PASS']=$a_nuevaContrsena; 
              $this->session->set_flashdata('success', 'Contraseña actualizada.'); 
                redirect(base_url().'Movil/Perfil'); 
            } else {
                $this->session->set_flashdata('error', 'No se pudo actualizar.'); 
                redirect(base_url().'Movil/Perfil'); 
            }
          } else {
            $this->session->set_flashdata('error', 'No coinsiden las contraseñas.'); 
            redirect(base_url().'Movil/Perfil'); 
          }
        }else{
          $this->session->set_flashdata('error', 'Contraseña actual incorrecta.'); 
          redirect(base_url().'Movil/Perfil'); 
        }
    }
}
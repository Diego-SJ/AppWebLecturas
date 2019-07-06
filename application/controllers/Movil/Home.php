<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model("Movil/Home_modelo");
        if($this->session->userdata('USER_ID') == '' || $this->session->userdata('USER_TYPE') != '1') {  
            redirect(base_url());  
        } 
    }

    public function index(){
        $id_alumno =  $this->session->userdata('USER_ID');
        
        $data = array ( 'his_alumno' => $this->Home_modelo->getHistorialAlumno($id_alumno));

        $this->load->view('student/Layout/header');
        $this->load->view('student/home/inicio',$data);
        $this->load->view('student/Layout/footer');  
    }

}

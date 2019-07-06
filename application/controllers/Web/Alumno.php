<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumno extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model("Web/Alumno_model");
        if($this->session->userdata('USER_ID') == '' || $this->session->userdata('USER_TYPE') != '2') {  
            redirect(base_url().'Welcome');  
        } 
    }

	public function index(){
        $id_usuario = $this->session->userdata('USER_ID');
        $data = array( 'alumnos' => $this->Alumno_model->getAlumnosByTeacher($id_usuario) );
        $this->load->view('layouts/header');
        $this->load->view('teacher/alumno/alumnos', $data);
        $this->load->view('layouts/footer');
	}

    public function registrarAlumno(){
        $id_usuario_creo = $this->session->userdata('USER_ID');
        $nombre   = ucwords(strtolower($this->input->post("ana_nombre")));
        $paterno  = ucwords(strtolower($this->input->post("ana_paterno")));
        $materno  = ucwords(strtolower($this->input->post("ana_materno")));
        $grado    = strtolower($this->input->post("ana_grado"));
        $grupo    = strtoupper($this->input->post("ana_grupo"));
        $usuario  = strtolower($this->input->post("ana_usuario"));
        $password = strtolower($this->input->post("ana_password"));
        $genero   = strtolower($this->input->post("ana_genero"));

        $data = array(
            'nombre'    => $nombre,
            'a_paterno' => $paterno,
            'a_materno' => $materno,
            'grado'     => $grado,
            'grupo'     => $grupo,
            'usuario'   => $usuario,
            'password'  => $password,
            'genero'    => $genero,
            'idEstado'  => "1",
            'idUsuario' => $id_usuario_creo
        );

        if($this->Alumno_model->insertAlumno($data)){
            redirect(base_url()."Web/Alumno");
        }
    }


	public function editAlumno($id_alumno){
        if($this->Alumno_model->getAlumno($id_alumno)){ 
            $data = array(
                'alumno_data' => $this->Alumno_model->getAlumno($id_alumno) 
            );

            $this->load->view('layouts/header');
            $this->load->view('teacher/alumno/update_alumno', $data);
            $this->load->view('layouts/footer');
        } else {
            redirect(base_url().'Web/Alumno');
        }
    }

    public function update_alumno($id_alumno){
        $nombre   = ucwords(strtolower($this->input->post("ana_nombre")));
        $paterno  = ucwords(strtolower($this->input->post("ana_paterno")));
        $materno  = ucwords(strtolower($this->input->post("ana_materno")));
        $grado    = $this->input->post("ana_grado");
        $grupo    = strtoupper($this->input->post("ana_grupo"));
        $genero   = strtolower($this->input->post("ana_genero"));

        $data = array(
            'nombre'    => $nombre,
            'a_paterno' => $paterno,
            'a_materno' => $materno,
            'grado'     => $grado,
            'grupo'     => $grupo,
            'genero'    => $genero
        );

        if($this->Alumno_model->updateAlumno($data,$id_alumno)){
            redirect(base_url()."Web/Alumno");
        }
    }

    public function viewEliminarAlumno($id_alumno){
        $data = array('alumno' => $this->Alumno_model->getAlumno($id_alumno));
        $this->load->view("teacher/alumno/deleteAlumno", $data);
    }

    public function deleteAlumno($id_alumno){
        if($this->Alumno_model->eliminarAlumno($id_alumno))
            redirect(base_url()."Web/Alumno");
        else 
            echo "no se pudo eliminar al alumno"; 
    }

    public function detail($id_alumno){
        if($this->Alumno_model->getAlumno($id_alumno)){
            $data = array(
                'alumno'          => $this->Alumno_model->getAlumno($id_alumno),
                'alumno_detail'   => $this->Alumno_model->getDetailAlumnoToTeacher($id_alumno),
                'alumno_lecturas' => $this->Alumno_model->getLecturasAlumnoToTeacher($id_alumno)
            );

            $this->load->view('layouts/header');
            $this->load->view('teacher/alumno/detail_alumno', $data);
            $this->load->view('layouts/footer');

        } else {
            redirect(base_url()."Web/Alumno");
        }
    }
}

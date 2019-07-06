<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model("Web/Fichero_model");
        $this->load->model("Web/Pagina_model");
        $this->load->model("Web/Lectura_model");
        if($this->session->userdata('USER_ID') == '' || $this->session->userdata('USER_TYPE') != '2') {  
            redirect(base_url().'Welcome');  
        } 
    }

    public function index(){
    }

    /*===================================================================================
                              ** INICIO CONTROLLER PAGINAS **
    ===================================================================================*/

    public function pages($id_lectura){
        if($this->Lectura_model->getLectura($id_lectura) ){
            $data = array(
                'detail_lectura' => $this->Lectura_model->getLectura($id_lectura) 
            );

            $contentLectura = array (
                'paginas' => $this->Pagina_model->getPaginasLectura($id_lectura),
                'pdf'     => $this->Fichero_model->getPdfLectura($id_lectura)
            );

            $this->load->view('layouts/header');
            $this->load->view('teacher/lectura/header_detail',$data);
            $this->load->view('teacher/lectura/paginas/settings_pages',$contentLectura);
            $this->load->view('layouts/footer');
        } else {
            redirect(base_url()."Web/Lecturas");
        }
    }

    public function addPage($id){
        $id_lectura = $id;
        $no_pagina = $this->input->post("frm_no_pag");
        $contenido = $this->input->post("editor1");

        $data = array (
            'no_pagina' => $no_pagina,
            'contenido' => $contenido,
            'idLectura' => $id_lectura
        );

        if($this->Pagina_model->insertarPaginaLectura($data)){
            redirect(base_url()."Web/Pagina/pages/".$id_lectura);
        }
    }

    public function contenidoPagina($id_pagina){
        $data = array( 'info_pagina' => $this->Pagina_model->getPagina($id_pagina) );
        $this->load->view("teacher/lectura/paginas/contenido_pagina", $data);
    }

    public function viewEliminarPagina($id_pagina){
        $data = array( 'info_del_pagina' => $this->Pagina_model->getPagina($id_pagina) );
        $this->load->view("teacher/lectura/paginas/deletePage", $data); 
    }

    public function deletePagina($id_pagina){
        $id_lectura = $this->input->post("id_lectura_dp");
        if($this->Pagina_model->deletePagina($id_pagina,$id_lectura)){
            $this->session->set_flashdata("success","Item eliminado");
            redirect(base_url()."Web/Pagina/pages/".$id_lectura);
        } else {
            $this->session->set_flashdata("error","No se pudo eliminar el item");
            redirect(base_url()."Web/Pagina/pages/".$id_lectura);
        } 
    }

    public function viewEditarPagina($id_pagina){
        $data = array( 'info_del_pagina' => $this->Pagina_model->getPagina($id_pagina) );
        $this->load->view("teacher/lectura/paginas/editPage", $data);
    }

    public function editPagina($id_pagina){
        $id_lectura = $this->input->post("id_lectura_up");
        $no_pagina = $this->input->post("frm_no_pag_updt");
        $contenido = $this->input->post("editor2");

        $data = array (
            'no_pagina' => $no_pagina,
            'contenido' => $contenido,
            'idLectura' => $id_lectura
        );

        if($this->Pagina_model->updatePagina($data,$id_pagina,$id_lectura)){
            $this->session->set_flashdata("success","Item actualziado");
            redirect(base_url()."Web/Pagina/pages/".$id_lectura);
        } else {
            $this->session->set_flashdata("error","No se pudo actualizar el item");
            redirect(base_url()."Web/Pagina/pages/".$id_lectura);
        }
    }


}

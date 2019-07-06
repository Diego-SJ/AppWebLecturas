<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivo extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model("Web/Fichero_model");
        $this->load->model("Web/Lectura_model");
        if($this->session->userdata('USER_ID') == '' || $this->session->userdata('USER_TYPE') != '2') {  
            redirect(base_url().'Welcome');  
        } 
    }

    public function index(){
    }
    /*===================================================================================
                              ** SUBIR PDF **
    ===================================================================================*/

    public function subirArchivo(){
        $id_usuario = $this->session->userdata('USER_ID');
        $id_lectura = $this->input->post("id_lectura");
        $config['upload_path'] = './uploads/archivos/';
        $config['overwrite'] = TRUE;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '20048';

        $this->load->library('upload',$config);

        if (!$this->upload->do_upload("fileUpload")) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url()."Web/Pagina/pages/".$id_lectura);
        } else {
            $file_info = $this->upload->data();
            $archivo = array(
                'idLectura' => $id_lectura,
                'nombre_archivo' => $file_info['file_name'] );

            if($this->Fichero_model->checkFileExist($id_lectura,$archivo)){
                $this->session->set_flashdata('exito', '¡Archivo subido exitosamente!');
                redirect(base_url()."Web/Pagina/pages/".$id_lectura);
            } else {
                $this->session->set_flashdata('error', '¡Algo salio mal, intenta más tarde!');
                redirect(base_url()."Web/Pagina/pages/".$id_lectura,$data);
            }
        }
    }

     public function viewEliminarPdf($id_lectura){
        $data = array('info_pdf' => $this->Fichero_model->getPdf($id_lectura));
        $this->load->view("teacher/lectura/paginas/deletePdf", $data);
    }

    public function deletePdf($id_lectura){
        $file_name = $this->input->post("file_name");
        $path_to_file = './uploads/archivos/'.$file_name; 
        if(unlink($path_to_file)) { 
            if($this->Fichero_model->deletePdf($id_lectura)){
                redirect(base_url()."Web/Pagina/pages/".$id_lectura);
            } else {
                $this->session->set_flashdata('error', '¡Algo salio mal, intenta más tarde!');
                redirect(base_url()."Web/Pagina/pages/".$id_lectura);
            }
        } else { 
            $this->session->set_flashdata('error', '¡No se pudo eliminar, intenta más tarde!');
            redirect(base_url()."Web/Pagina/pages/".$id_lectura);
        }
        
    }

    public function viewFile($id_lectura){
        $data = array('info_file' => $this->Fichero_model->getPdf($id_lectura));
        $this->load->view("teacher/lectura/paginas/contenido_file", $data);
    }

}

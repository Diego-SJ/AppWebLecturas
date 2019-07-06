<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fichero_model extends CI_Model {

	function getPdf($id_lectura) {
        $this->db->where("idLectura",$id_lectura);
        $resultado = $this->db->get("Fichero");
        return $resultado->row();
    }

    function getPdfLectura($id_lectura) {
        $this->db->where("idLectura",$id_lectura);
        $resultado = $this->db->get("Fichero");
        return $resultado->result();
    }

    function deletePdf($id_lectura) {
        $this->db->where('idLectura', $id_lectura);
        return $this->db->delete('Fichero');
    }

    //verificar si ya hay un archivo pdf para equis lectura
    function checkFileExist($id_lectura,$data) {
        $this->db->where('idLectura', $id_lectura);
        $fila = $this->db->get('Fichero');

        if($fila->num_rows() > 0){//si existe un archivo para la lectura
            $this->db->where('idLectura', $id_lectura);
            $result = $this->db->update("Fichero",$data); //actualiza el nombre del archivo
            if($result){
                return true;
            } else {
                return false;
            }
        } else { //no existe un archivo
            if($this->db->insert("Fichero",$data)){ // inserta el nuevo archivo
                return true;
            } else {
                return false;
            }
        }
    }

}
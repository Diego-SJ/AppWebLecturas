<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class lectura_model extends CI_Model {

   	function getTotaLecturas($id_usuario){
     	$this->db->where('idUsuario',$id_usuario);
      	$fila = $this->db->get("Lectura");
        return $fila->result();
    }

    function getLectura($id_lectura) {
        $this->db->where("idLectura",$id_lectura);
        $resultado = $this->db->get("Lectura");
        return $resultado->row();
    }

    function detailLectura($id_lectura) {
        $this->db->where('idLectura', $id_lectura);
        $resultado = $this->db->get('vw_lectura_detail');
        return $resultado->result();
    }
}

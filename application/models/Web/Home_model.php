<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home_model extends CI_Model {

    function getAlumosDashboard($id_usuario){
    	$this->db->where("idUsuario",$id_usuario);
    	$fila = $this->db->get("vw_docente_home_totalalumnos");
    	return $fila->row();
    }

    function getLecturasDashboard($id_usuario){
    	$this->db->where("idUsuario",$id_usuario);
    	$fila = $this->db->get("vw_docente_home_totallecturas");
    	return $fila->row();
    }

    function getDocente($id_teacher){
        $this->db->where("idUsuario",$id_teacher);
        $fila = $this->db->get("Usuario");
        return $fila->row();
    }

    function updtDocente($id_teacher, $data){
        $this->db->where("idUsuario",$id_teacher);
        $res = $this->db->update("Usuario",$data);
        if($res > 0)
            return true;
        else
            return false;
    }
}
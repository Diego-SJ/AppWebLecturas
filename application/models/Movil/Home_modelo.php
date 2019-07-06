<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home_modelo extends CI_Model {

    function getHistorialAlumno($id_alumno) {
        $this->db->where("idAlumno",$id_alumno);
        $resultados = $this->db->get("vw_docente_aludetail_progress");
        return $resultados->row();    
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class home_model extends CI_Model {

    function getAdminDashboard(){
    	$fila = $this->db->get("vw_admin_dashboard");
    	return $fila->row();
    }

    function getTotalAlumnos(){
        $this->db->where("idEstado",1);
        $this->db->select("count(idAlumno) as total_alumno");
        $fila = $this->db->get("Alumno");
        return $fila->row();
    }
      function getTotaLecturas(){
        $this->db->where("idEstado",1);
        $this->db->select("count(idLectura) as total_lectura");
        $fila = $this->db->get("Lectura");
        return $fila->row();
    }

    function getTotalDocentes(){
        $this->db->where("tipo",2);
        $this->db->select("count(idUsuario) as total_docente");
        $fila = $this->db->get("Usuario");
        return $fila->row();
    }
}

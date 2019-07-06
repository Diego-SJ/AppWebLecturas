<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Perfil_modelo extends CI_Model {


    // TRAER TODAS LAS LECTURAS POR MAESTRO
    function getinfoAlumno($id_alumno) {
        $this->db->where("idAlumno",$id_alumno);
        $resultado = $this->db->get("vw_alumno_docente_alumno");
        return $resultado->row();
    }

    function updateinfoAlumno($usuario,$data) {
        $this->db->where('usuario', $usuario);
        return $this->db->update('Alumno', $data);
    }

    function getLecturasComplete($id_alumno) {
        $this->db->where("estado_lectura","2");
        $this->db->where("idEstado","5");
        $this->db->where("idAlumno",$id_alumno);
        $resultados = $this->db->get("vw_alumno_estadolecturas");
        return $resultados->result();
    }

    function getLecturasPendiente($id_alumno) {
        $this->db->where("estado_lectura","2");
        $this->db->where("idEstado","4");
        $this->db->where("idAlumno",$id_alumno);
        $resultados = $this->db->get("vw_alumno_estadolecturas");
        return $resultados->result();
    }

    function theme($theme,$id_alumno){
        $this->db->where('idAlumno', $id_alumno);
        return $this->db->update('Alumno', $theme);
    }
    function editAlumno($id_alumno,$data) {
        $this->db->where('idAlumno', $id_alumno);
        return $this->db->update('Alumno', $data);
    }
    function updatePassword($id_alumno,$data) {
        $this->db->where('idAlumno', $id_alumno);
        return $this->db->update('Alumno', $data);
    
    }

    function getTotalLBYTAvtivas($id_usuario) {
        $this->db->where("idUsuario",$id_usuario);
        $resultado = $this->db->get("vw_alumno_lecturaspublciadaspordocente",1);
        if ($resultado->num_rows() > 0){
            return $resultado->row_array();
        } else {
            return false;
        }
    }

    function getTotalLBYACompletas($id_alumno) {
        $this->db->where("idAlumno",$id_alumno);
        $resultado = $this->db->get("vw_alumno_lecturascompletadasporalumno",1);
        if ($resultado->num_rows() > 0){
            return $resultado->row_array();
        } else {
            return false;
        }
    }

}
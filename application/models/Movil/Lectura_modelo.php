<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lectura_modelo extends CI_Model {


    // TRAER TODAS LAS LECTURAS POR MAESTRO
    function getLecturasByTeacher($id_teacher) {
    	$this->db->where("idEstado","2");
        $this->db->where("idUsuario",$id_teacher);
        $resultados = $this->db->get("Lectura");
        return $resultados->result();
    }

    function getInfoLectura($id_lectura) {
        $this->db->where("idLectura",$id_lectura);
        $resultados = $this->db->get("Lectura");
        return $resultados->row();
    }

    function getLecturaArray($id_lectura){
        $this->db->where("idLectura",$id_lectura);
        $query = $this->db->get("Lectura");
        if ($query->num_rows() > 0){
            return $query->row_array();
        } else {
            return false;
        }
    }

    function getLecturaDetailByStudent($id_lectura,$id_alumno) {
    	$this->db->where("idAlumno",$id_alumno);
        $this->db->where("idLectura",$id_lectura);
        $resultados = $this->db->get("Lectura_Alumno");
        return $resultados->row();
    }

    function getLecturaFinishedBy($id_lectura) {
    	$this->db->where("idEstado","5");
        $this->db->where("idLectura",$id_lectura);
        $resultados = $this->db->get("vw_alumno_alumnosquefinalizaronxlectura");
        return $resultados->result();
    }

    function verifyStartLecture($id_lectura,$id_alumno) {
        $this->db->where("idAlumno",$id_alumno);
        $this->db->where("idLectura",$id_lectura);
        $resultado = $this->db->get("Lectura_Alumno");
        if ($resultado->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    function insertarLecturaAlumno($data) {
        return $this->db->insert("Lectura_Alumno",$data);
    }

    function updtLecturaAlumno($id_lectura,$id_alumno,$data) {
        $this->db->where("idAlumno",$id_alumno);
        $this->db->where("idLectura",$id_lectura);
        return $this->db->update('Lectura_Alumno', $data);
    }
}
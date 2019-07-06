<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Actividades_modelo extends CI_Model {


    // TRAER TODOS LOS REACTIVOS DE VERDADERO FALSO POR LECTURA Y PROFESOR
    function getReactVFByLectura($id_lectura,$id_teacher) {
    	$this->db->where("idLectura",$id_lectura);
        $this->db->where("idUsuario",$id_teacher);
        $resultados = $this->db->get("VerdaderoFalso");
        if ($resultados->num_rows() > 0){
            return $resultados->result();
        } else {
            return false;
        }    
    }

    function getReactOMByLectura($id_lectura,$id_teacher) {
        $this->db->where("idLectura",$id_lectura);
        $this->db->where("idUsuario",$id_teacher);
        $resultados = $this->db->get("OpcionMultiple");
        if ($resultados->num_rows() > 0){
            return $resultados->result();
        } else {
            return false;
        }    
    }

    function getReactRCByLectura($id_lectura,$id_teacher) {
        $this->db->where("idLectura",$id_lectura);
        $this->db->where("idUsuario",$id_teacher);
        $resultados = $this->db->get("RelacionarColumnas");
        if ($resultados->num_rows() > 0){
            return $resultados->result();
        } else {
            return false;
        }    
    }

    function checkReactiveOM($id_om,$resp){
        $this->db->where("resp_correcta",$resp);
        $this->db->where("idOpcionMultiple",$id_om);
        $result = $this->db->get("OpcionMultiple");
        if($result->num_rows() > 0){
            return $result->row_array();
        } else {
            return false;
        }
    }

    function checkReactiveVF($id_vf,$resp){
        $this->db->where("resp_correcta",$resp);
        $this->db->where("idVerdaderoFalso",$id_vf);
        $result = $this->db->get("VerdaderoFalso");
        if($result->num_rows() > 0){
            return $result->row_array();
        } else {
            return false;
        }
    }

    function checkReactiveRC($id_vf){
        $this->db->where("idRelacionarColumnas",$id_vf);
        $result = $this->db->get("RelacionarColumnas");
        if($result->num_rows() > 0){
            return $result->row_array();
        } else {
            return false;
        }
    }

    function getInfoLectura($id_lectura) {
        $this->db->where("idLectura",$id_lectura);
        $resultados = $this->db->get("Lectura");
        return $resultados->row();
    }

    function getLecturaDetailByStudent($id_lectura,$id_alumno) {
    	$this->db->where("idAlumno",$id_alumno);
        $this->db->where("idLectura",$id_lectura);
        $resultados = $this->db->get("Lectura_Alumno");
        return $resultados->row();
    }

    function getLecturaAlumnoArray($id_lectura,$id_alumno){
        $this->db->where("idAlumno",$id_alumno);
        $this->db->where("idLectura",$id_lectura);
        $query = $this->db->get("Lectura_Alumno");
        if ($query->num_rows() > 0){
            return $query->row_array();
        } else {
            return false;
        }
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
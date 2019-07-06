<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario_model extends CI_Model {

    //MODELO DOCENTE

    function updateUserTokenPass($email,$data) {
        $this->db->where('correo', $email);
        return $this->db->update('Usuario', $data);
    }

    function deleteUserTokenPass($token,$data) {
        $this->db->where('token_password', $token);
        return $this->db->update('Usuario', $data);
    }

    function eliminarAlumno($id_alumno) {
        $this->db->where('idAlumno', $id_alumno);
        return $this->db->delete('Alumno');
    }

    function getDataTeacer($id_usuario){
        $this->db->where('idUsuario',$id_usuario);
        $this->db->where('tipo', 2);
        $query = $this->db->get("Usuario",1);
        if ($query->num_rows() > 0){
            return $query->row_array();
        } else {
            return false;
        }
    }
}
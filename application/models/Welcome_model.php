<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome_model extends CI_Model {

    function usuarioExiste($usuario) {
        $this->db->where("usuario",$usuario);
        $query = $this->db->get("Usuario");
        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    function correoExiste($email) {
        $this->db->where("correo",$email);
        $query = $this->db->get("Usuario");
        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    function insertUsuario($data) {
        return $this->db->insert("Usuario",$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function getLogin($usuario_correo){
        $this->db->where("(correo = '$usuario_correo' OR usuario = '$usuario_correo')");
        $this->db->where('tipo', 2);
        $query = $this->db->get("Usuario",1);
        if ($query->num_rows() > 0){
            return $query->row_array();
        } else {
            return false;
        }
    }

    function getLoginAdmin($usuario_correo){
        $this->db->where("(correo = '$usuario_correo' OR usuario = '$usuario_correo')");
        $this->db->where('tipo', 3);
        $query = $this->db->get("Usuario",1);
        if ($query->num_rows() > 0){
            return $query->row_array();
        } else {
            return false;
        }
    }

    function getLoginAlumno($usuario_correo){
        $this->db->or_where('usuario', $usuario_correo);
        $query = $this->db->get("Alumno",1);
        if ($query->num_rows() > 0){
            return $query->row_array();
        } else {
            return false;
        }
    }

    function lastSession($id_teacher,$data) {
        $this->db->where('idUsuario', $id_teacher);
        return $this->db->update('Usuario', $data);
    }

    function lastSessionStudent($id_alumno,$data) {
        $this->db->where('idAlumno', $id_alumno);
        return $this->db->update('Alumno', $data);
    }

    function forgetPassword($token,$data){
        $this->db->where('token_password', $token);
        return $this->db->update('Usuario', $data);
    }

    function verifyToken($token){
        $this->db->where("token_password",$token);
        $query = $this->db->get("Usuario");
        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
}
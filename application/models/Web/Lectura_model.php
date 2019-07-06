<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lectura_model extends CI_Model {

    /*===================================================================================
                                    ** MODELO LECTURAS **
    ===================================================================================*/

    function insertarLectura($data) {
        return $this->db->insert("Lectura",$data);
    }

    function getAllLecturas($id_usuario) {
        $this->db->where("idUsuario",$id_usuario);
        $resultados = $this->db->get("Lectura");
        return $resultados->result();
    }

    function deleteData($id_lectura) {
        $this->db->where('idLectura', $id_lectura);
        $this->db->delete('Lectura');
    }

    function getLectura($id_lectura) {
        $this->db->where("idLectura",$id_lectura);
        $resultado = $this->db->get("Lectura");
        return $resultado->row();
    }
    
    function updateLectura($id_lectura,$data) {
        $this->db->where('idLectura', $id_lectura);
        return $this->db->update('Lectura', $data);
    }

    function eliminarLectura($id_lectura) {
        $success = false;
        $this->db->where('idLectura', $id_lectura);
        $first_delete = $this->db->delete('Lectura_Actividad');
        if($first_delete){
            $this->db->where('idLectura', $id_lectura);
            $second_delete = $this->db->delete('Lectura_Alumno');
            if($second_delete){
                $this->db->where('idLectura', $id_lectura);
                $third_delete = $this->db->delete('Pagina');
                if($third_delete){
                    $this->db->where('idLectura', $id_lectura);
                    $four_delete = $this->db->delete('OpcionMultiple');
                    if($four_delete){
                        $this->db->where('idLectura', $id_lectura);
                        $five_delete = $this->db->delete('VerdaderoFalso');
                        if($five_delete){
                            $this->db->where('idLectura', $id_lectura);
                            $six_delete = $this->db->delete('RelacionarColumnas');
                            if($six_delete){
                                $this->db->where('idLectura', $id_lectura);
                                $seven_delete = $this->db->delete('Lectura');
                                if($seven_delete){
                                    $success = true;
                                    return $success;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    function detailLectura($id_lectura) {
        $this->db->where('idEstado', "5");
        $this->db->where('idLectura', $id_lectura);
        $resultado = $this->db->get('vw_docente_lecdetail_tablealumnos');
        return $resultado->result();
    }
    
    function getActivitiesLectura($id_lectura,$id_usuario){
        $this->db->where('idLectura', $id_lectura);
        $this->db->where('idUsuario', $id_usuario);
        $resultado = $this->db->get("vw_reactivos_by_lectura");
        return $resultado->result();
    }

}
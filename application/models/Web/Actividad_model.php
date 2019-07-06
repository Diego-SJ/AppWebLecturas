<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Actividad_model extends CI_Model {


    /*===================================================================================
                                    ** MODELO REACTIVOS **
    ===================================================================================*/


    // TABLA REACTIVOS POR LECTURA
    function getActivitiesLectura($id_lectura,$id_usuario) {
        $this->db->where("idLectura",$id_lectura);
        $this->db->where("idUsuario",$id_usuario);
        $resultado = $this->db->get("vw_docente_lecdetail_reactivos");
        return $resultado->result();
    }

    // PUBLICAR ACTIVIDAD
    function publicarActividad($data) {
        return $this->db->insert("Lectura_Actividad",$data);
    }

    // TRAER ID POR PREGUNA
    function traerIdPregunta($columna,$tabla,$pregunta){
        $this->db->select($columna);
        $this->db->from($tabla);
        $this->db->where("pregunta", $pregunta); 
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->row();
        }
        return null; 
    }

    //TRAER FILA POR REACTIVO ***************************************
    function getFilaReactivo($id_reactivo){
        $this->db->where("pregunta", $pregunta); 
        $query = $this->db->get("Lectura_Actividad");
        if ($query->num_rows() > 0){
            return $query->row();
        }
        return null; 
    }

    //VERIFICAR LOS TIPOS DE ACTIVIDADES QUE TENDRA CADA LECTURA
    function checkIfExistActivities($id_lectura,$id_usuario){
        $this->db->where('idLectura',$id_lectura);
        $this->db->where('idUsuario',$id_usuario);
        $query = $this->db->get('vw_docente_check_if_exist_activitie');
        if($query->num_rows() > 0){
            return $query->row_array();
        } else {
            return false;
        }
    }

    
    /*===================================================================================
                                    ** ACTIVIDAD ESPECIFICA **
    ===================================================================================*/

    function traerId($id_aux,$tabla){
        $this->db->where("id_aux", $id_aux); 
        $query = $this->db->get($tabla);
        if ($query->num_rows() > 0){
            return $query->row();
        }
        return null; 
    }

    function getActividad($id_actividad) {
        $this->db->where("id",$id_actividad);
        $resultado = $this->db->get("Lectura_Actividad");
        return $resultado->row();
    }

    function deleteActividad($id_actividad) {
        $this->db->where('id', $id_actividad);
        return $this->db->delete('Lectura_Actividad');
    }

    /*===================================================================================
                                    ** OPCION MULTIPLE **
    ===================================================================================*/

    function getReactivoOpMul($id_actividad) {
        $this->db->where("idOpcionMultiple",$id_actividad);
        $resultado = $this->db->get("OpcionMultiple");
        return $resultado->row();
    }

    function insertarOpcionMultiple($data) {
        return $this->db->insert("OpcionMultiple",$data);
    }

    function deleteOM($id_om) {
        $this->db->where('idOpcionMultiple', $id_om);
        return $this->db->delete('OpcionMultiple');
    }

    function updateOpcMul($data,$id_op) {
        $this->db->where('idOpcionMultiple', $id_op);
        return $this->db->update('OpcionMultiple', $data);
    }

    /*===================================================================================
                                    ** RELACIONAR COLUMNAS **
    ===================================================================================*/

    function getReactivoRelCol($id_actividad) {
        $this->db->where("idRelacionarColumnas",$id_actividad);
        $resultado = $this->db->get("RelacionarColumnas");
        return $resultado->row();
    }

    function insertarRelacionarColumnas($data) {
        return $this->db->insert("RelacionarColumnas",$data);
    }

    function deleteRC($id_rc) {
        $this->db->where('idRelacionarColumnas', $id_om);
        return $this->db->delete('RelacionarColumnas');
    }

    function updateRelCol($data,$id_rc) {
        $this->db->where('idRelacionarColumnas', $id_rc);
        return $this->db->update('RelacionarColumnas', $data);
    }

    /*===================================================================================
                                    ** VERDADERO FALSO **
    ===================================================================================*/

    function getReactivoVerFal($id_actividad) {
        $this->db->where("idVerdaderoFalso",$id_actividad);
        $resultado = $this->db->get("VerdaderoFalso");
        return $resultado->row();
    }

    function insertarVerdaderoFlaso($data) {
        return $this->db->insert("VerdaderoFalso",$data);
    }

    function deleteVF($id_vf) {
        $this->db->where('idVerdaderoFalso', $id_vf);
        return $this->db->delete('VerdaderoFalso');
    }
    
    function updateVerFal($data,$id_vf) {
        $this->db->where('idVerdaderoFalso', $id_vf);
        return $this->db->update('VerdaderoFalso', $data);
    }

}
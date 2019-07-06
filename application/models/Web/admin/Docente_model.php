<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class docente_model extends CI_Model {

    function getTotalDocentes(){
        $this->db->where("tipo",2);
        $fila = $this->db->get("Usuario");
        return $fila->result();
    }
}

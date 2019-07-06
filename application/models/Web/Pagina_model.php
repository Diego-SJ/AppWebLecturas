<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pagina_model extends CI_Model {


    /*===================================================================================
                                    ** MODELO PAGINAS **
    ===================================================================================*/


    // TABLA PAGINAS POR LECTURA
    function insertarPaginaLectura($data) {
        return $this->db->insert("Pagina",$data);
    }

    function getPaginasLectura($id_lectura) {
        $this->db->where("idLectura",$id_lectura);
        $resultado = $this->db->get("Pagina");
        return $resultado->result();
    }

    function getPagina($id_pagina) {
        $this->db->where("idPagina",$id_pagina);
        $resultado = $this->db->get("Pagina");
        return $resultado->row();
    }

    function deletePagina($id_pagina,$id_lectura) {
        $query = $this->db->query('DELETE FROM Pagina WHERE idPagina ='.$id_pagina.' AND idLectura = '.$id_lectura);
        return true;
    }

    function updatePagina($data,$id_pagina,$id_lectura) {
        $this->db->where('idLectura', $id_lectura);
        $this->db->where('idPagina', $id_pagina);
        return $this->db->update('Pagina', $data);
    }


}
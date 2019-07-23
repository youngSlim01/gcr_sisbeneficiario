<?php

class UnidadeSanitaria_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function listar_unidades_sanitarias()
  {
    return $this->db->get('unidade_sanitaria')->result();
  }
}

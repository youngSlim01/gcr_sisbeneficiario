<?php
class Distrito_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function listar_distritos()
  {
    return $this->db->get('distrito')->result();
  }

}

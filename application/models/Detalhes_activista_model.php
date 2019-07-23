<?php
defined('BASEPATH')or exit('No direct script access allowed');
/**
 *
 */
class Detalhes_activista_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function insert_detalhes($dados)
  {
    return $this->db->insert('detalhes_activista',$dados);
  }
}
 ?>

<?php
defined('BASEPATH')or exit('No direct script access allowed')
/**
 *
 */
class Servico_model extends CI_Model
{

  function __construct(argument)
  {
    parent::__construct();
    $this->load->database();
  }

  public function listar_servicos($value='')
  {
    return $this->db->get('servico');
  }
  public function insert_service($data)
  {
    return $this->db->insert('servico',$data);
  }
}

 ?>

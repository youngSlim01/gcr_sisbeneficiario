<?php
/**
 *
 */
class Activista_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function contar_activistas_por_projecto($id){
    $this->db->select('*');
    $this->db->where('projecto_id', $id);
    $this->db->where('tipo_funcionario_id', 1);
    $resultado = $this->db->get('funcionario')->num_rows();
    return $resultado;
  }
}
 ?>

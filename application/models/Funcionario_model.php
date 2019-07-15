<?php
/**
 *
 */
class Funcionario_model extends CI_Model
{
  public function __construct(){
      parent::__construct();
      $this->load->database();
  }

  public function listarTiposFuncionarios()
  {
    return $this->db->get('tipo_funcionario')->result();
  }

  public function CadastrarTiposFuncionarios($nome)
  {
    return $this->db->insert('tipo_funcionario',$nome);
  }
}
 ?>

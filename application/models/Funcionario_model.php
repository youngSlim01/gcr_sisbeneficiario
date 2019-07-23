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

  public function listarActivistas()
  {
    $this->db->join('tipo_funcionario','tipo_funcionario_id=tipo_funcionario.id','inner');
    $this->db->join('projecto','projecto_id=projecto.id','inner');
    $this->db->where('tipo_funcionario_id',1);
    return $this->db->get('funcionario')->result();
  }

  public function listarSupervisores()
  {
    $this->db->join('tipo_funcionario','tipo_funcionario_id=tipo_funcionario.id','inner');
    $this->db->join('projecto','projecto_id=projecto.id','inner');
    $this->db->where('tipo_funcionario_id',2);
    return $this->db->get('funcionario')->result();
  }

  public function listarGestores()
  {
    $this->db->join('tipo_funcionario','tipo_funcionario_id=tipo_funcionario.id','inner');
    $this->db->join('projecto','projecto_id=projecto.id','inner');
    $this->db->where('tipo_funcionario_id',3);
    return $this->db->get('funcionario')->result();
  }

  public function listarFuncionarios()
  {
    $this->db->join('tipo_funcionario','tipo_funcionario_id=tipo_funcionario.id','inner');
    $this->db->join('projecto','projecto_id=projecto.id','inner');
    return $this->db->get('funcionario')->result();
  }

  public function contarFuncionarios()
  {
    $this->db->select('*');
    $resultado = $this->db->get('funcionario')->num_rows();
    return $resultado;
  }
  public function contarActivistas($id)
  {
  #  $this->db->where('tipo_funcionario_id',1);
  #  return $this->db->count_all('funcionario');

    $this->db->select('*');
		$this->db->where('tipo_funcionario_id', $id);
    $resultado = $this->db->get('funcionario')->num_rows();
    return $resultado;
  }
  public function listarTiposFuncionarios()
  {
    return $this->db->get('tipo_funcionario')->result();
  }

  public function CadastrarTiposFuncionarios($nome)
  {
    return $this->db->insert('tipo_funcionario',$nome);
  }

  public function cadastrarFuncionario($value)
  {
    return $this->db->insert('funcionario',$value);
  }

  public function ultimo_id()
  {
    return $this->db->insert_id();
  }
}
 ?>

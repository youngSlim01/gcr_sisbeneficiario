<?php
defined("BASEPATH")or exit('No script direct access allowed');
/**
 *
 */
class Beneficiario_model extends CI_model
{

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function contador()
  {
    return $this->db->count_all('beneficiario')+1;
  }
  public function get_all()
  {
    $this->db->query('beneficiario.*,distrito.nome_distrito');
    $this->db->where('beneficiario.id = reference.beneficiario_id');
    $this->db->join('distrito','distrito = distrito.id_distrito','inner');
    return $this->db->get('beneficiario')->result();
  }
  public function cadastrarbeneficiario($dados)
  {
    return $this->db->insert('beneficiario',$dados);
    #$this->db->insert_id();
  }

  public function actualizarRef_beneficiario($dados,$id)
  {
    $this->db->where('codigo_beneficiario',$id);
    return $this->db->update('beneficiario',$dados);
  }

  public function ultimo_id()
  {
    return $this->db->insert_id();
  }

  public function beneficiario_id($id)
  {
    $this->db->select('*');
		$this->db->where('id', $id);
    $resultado = $this->db->get('beneficiario')->row();
    return $resultado;
  }

  public function referencia_id($id)
  {
    $this->db->select('*');
		$this->db->where('beneficiario_id', $id);
    $resultado = $this->db->get('reference')->row();
    return $resultado->idreferencia;
  }

  public function referencia($id)
  {
    $this->db->select('*');
		$this->db->where('beneficiario_id', $id);
    return $resultado = $this->db->get('reference')->row();
  }

  public function addBeneficiario_reference($dados)
  {
    $this->db->insert('reference',$dados);
    return $this->db->insert_id();
  }
  public function contar_beneficiarios()
  {
    return $this->db->count_all('beneficiario');
  }

  public function contar_beneficiarios_por_projecto($id){
    $this->db->select('*');
    $this->db->where('projecto_id', $id);
    $resultado = $this->db->get('reference')->num_rows();
    return $resultado;
  }
  public function contar_beneficiarios_por_servico_no_projecto($id,$idserv){
    $this->db->select('*');
    $this->db->where('projecto_id', $id);
    $this->db->where('servico_id', $idserv);
    $resultado = $this->db->get('reference')->num_rows();
    return $resultado;
  }

  public function addcontra_reference($dados)
  {
    $this->db->insert('contra_reference',$dados);
    return $this->db->insert_id();
  }
}

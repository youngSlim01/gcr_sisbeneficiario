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

  public function cadastrarbeneficiario($dados)
  {
    $this->db->insert('beneficiario',$dados);
    return $this->db->insert_id();
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

  public function addBeneficiario_servico($dados)
  {
    $this->db->insert('beneficiario_servico',$dados);
    return $this->db->insert_id();
  }
  public function contar_beneficiarios()
  {
    return $this->db->count_all('beneficiario');
  }

  public function contar_beneficiarios_por_projecto($id){
    $this->db->select('*');
    $this->db->where('projecto_id', $id);
    $resultado = $this->db->get('beneficiario_servico')->num_rows();
    return $resultado;
  }
  public function contar_beneficiarios_por_servico_no_projecto($id,$idserv){
    $this->db->select('*');
    $this->db->where('projecto_id', $id);
    $this->db->where('servico_id', $idserv);
    $resultado = $this->db->get('beneficiario_servico')->num_rows();
    return $resultado;
  }
}

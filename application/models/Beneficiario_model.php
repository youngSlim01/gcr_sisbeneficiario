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
    return $this->db->query('SELECT `beneficiario`.*, `distrito`.`nome_distrito` FROM `beneficiario` INNER JOIN `distrito` ON `distrito` = `distrito`.`id_distrito` WHERE beneficiario.codigo_beneficiario NOT IN (SELECT contra_reference.beneficiario_codigo FROM contra_reference)')->result();
  }

  public function contra_reference()
  {
    return $this->db->query('SELECT `beneficiario`.*, `contra_reference`.`resultado`, `contra_reference`.`testado`, `distrito`.`nome_distrito` FROM `beneficiario` INNER JOIN `distrito` ON `distrito` = `distrito`.`id_distrito` INNER JOIN `contra_reference` ON `beneficiario_codigo` = `contra_reference`.`beneficiario_codigo` WHERE beneficiario.codigo_beneficiario IN (SELECT contra_reference.beneficiario_codigo FROM contra_reference) AND beneficiario.codigo_beneficiario = contra_reference.beneficiario_codigo')->result();
  }

  public function tb_posetivo($value='')
  {
    return $this->db->query('SELECT `beneficiario`.*, `contra_reference`.`resultado`, `contra_reference`.`testado`, `distrito`.`nome_distrito` FROM `beneficiario` INNER JOIN `distrito` ON `distrito` = `distrito`.`id_distrito` INNER JOIN `contra_reference` ON `beneficiario_codigo` = `contra_reference`.`beneficiario_codigo` WHERE beneficiario.codigo_beneficiario IN (SELECT contra_reference.beneficiario_codigo FROM contra_reference) AND beneficiario.codigo_beneficiario = contra_reference.beneficiario_codigo AND contra_reference.resultado = "Posetivo" AND contra_reference.testado = "TB"')->result();
  }

  public function contar_tb_posetivo($value='')
  {
    return $this->db->query('SELECT `beneficiario`.*, `contra_reference`.`resultado`, `contra_reference`.`testado`, `distrito`.`nome_distrito` FROM `beneficiario` INNER JOIN `distrito` ON `distrito` = `distrito`.`id_distrito` INNER JOIN `contra_reference` ON `beneficiario_codigo` = `contra_reference`.`beneficiario_codigo` WHERE beneficiario.codigo_beneficiario IN (SELECT contra_reference.beneficiario_codigo FROM contra_reference) AND beneficiario.codigo_beneficiario = contra_reference.beneficiario_codigo AND contra_reference.resultado = "Posetivo" AND contra_reference.testado = "TB"')->num_rows();
  }

  public function tb_negativo($value='')
  {
    return $this->db->query('SELECT `beneficiario`.*, `contra_reference`.`resultado`, `contra_reference`.`testado`, `distrito`.`nome_distrito` FROM `beneficiario` INNER JOIN `distrito` ON `distrito` = `distrito`.`id_distrito` INNER JOIN `contra_reference` ON `beneficiario_codigo` = `contra_reference`.`beneficiario_codigo` WHERE beneficiario.codigo_beneficiario IN (SELECT contra_reference.beneficiario_codigo FROM contra_reference) AND beneficiario.codigo_beneficiario = contra_reference.beneficiario_codigo AND contra_reference.resultado = "Negativo" AND contra_reference.testado = "TB"')->result();
  }

  public function contar_tb_negativo($value='')
  {
    return $this->db->query('SELECT `beneficiario`.*, `contra_reference`.`resultado`, `contra_reference`.`testado`, `distrito`.`nome_distrito` FROM `beneficiario` INNER JOIN `distrito` ON `distrito` = `distrito`.`id_distrito` INNER JOIN `contra_reference` ON `beneficiario_codigo` = `contra_reference`.`beneficiario_codigo` WHERE beneficiario.codigo_beneficiario IN (SELECT contra_reference.beneficiario_codigo FROM contra_reference) AND beneficiario.codigo_beneficiario = contra_reference.beneficiario_codigo AND contra_reference.resultado = "Negativo" AND contra_reference.testado = "TB"')->num_rows();
  }

  public function hiv_posetivo($value='')
  {
    return $this->db->query('SELECT `beneficiario`.*, `contra_reference`.`resultado`, `contra_reference`.`testado`, `distrito`.`nome_distrito` FROM `beneficiario` INNER JOIN `distrito` ON `distrito` = `distrito`.`id_distrito` INNER JOIN `contra_reference` ON `beneficiario_codigo` = `contra_reference`.`beneficiario_codigo` WHERE beneficiario.codigo_beneficiario IN (SELECT contra_reference.beneficiario_codigo FROM contra_reference) AND beneficiario.codigo_beneficiario = contra_reference.beneficiario_codigo AND contra_reference.resultado = "Posetivo" AND contra_reference.testado = "HIV"')->result();
  }

  public function contar_hiv_posetivo($value='')
  {
    return $this->db->query('SELECT `beneficiario`.*, `contra_reference`.`resultado`, `contra_reference`.`testado`, `distrito`.`nome_distrito` FROM `beneficiario` INNER JOIN `distrito` ON `distrito` = `distrito`.`id_distrito` INNER JOIN `contra_reference` ON `beneficiario_codigo` = `contra_reference`.`beneficiario_codigo` WHERE beneficiario.codigo_beneficiario IN (SELECT contra_reference.beneficiario_codigo FROM contra_reference) AND beneficiario.codigo_beneficiario = contra_reference.beneficiario_codigo AND contra_reference.resultado = "Posetivo" AND contra_reference.testado = "HIV"')->num_rows();
  }

  public function hiv_negativo($value='')
  {
    return $this->db->query('SELECT `beneficiario`.*, `contra_reference`.`resultado`, `contra_reference`.`testado`, `distrito`.`nome_distrito` FROM `beneficiario` INNER JOIN `distrito` ON `distrito` = `distrito`.`id_distrito` INNER JOIN `contra_reference` ON `beneficiario_codigo` = `contra_reference`.`beneficiario_codigo` WHERE beneficiario.codigo_beneficiario IN (SELECT contra_reference.beneficiario_codigo FROM contra_reference) AND beneficiario.codigo_beneficiario = contra_reference.beneficiario_codigo AND contra_reference.resultado = "Negativo" AND contra_reference.testado = "HIV"')->result();
  }

  public function contar_hiv_negativo($value='')
  {
    return $this->db->query('SELECT `beneficiario`.*, `contra_reference`.`resultado`, `contra_reference`.`testado`, `distrito`.`nome_distrito` FROM `beneficiario` INNER JOIN `distrito` ON `distrito` = `distrito`.`id_distrito` INNER JOIN `contra_reference` ON `beneficiario_codigo` = `contra_reference`.`beneficiario_codigo` WHERE beneficiario.codigo_beneficiario IN (SELECT contra_reference.beneficiario_codigo FROM contra_reference) AND beneficiario.codigo_beneficiario = contra_reference.beneficiario_codigo AND contra_reference.resultado = "Negativo" AND contra_reference.testado = "HIV"')->num_rows();
  }

  public function contar_contra_reference()
  {
    return $this->db->query('SELECT `beneficiario`.*, `contra_reference`.`resultado`, `contra_reference`.`testado`, `distrito`.`nome_distrito` FROM `beneficiario` INNER JOIN `distrito` ON `distrito` = `distrito`.`id_distrito` INNER JOIN `contra_reference` ON `beneficiario_codigo` = `contra_reference`.`beneficiario_codigo` WHERE beneficiario.codigo_beneficiario IN (SELECT contra_reference.beneficiario_codigo FROM contra_reference) AND beneficiario.codigo_beneficiario = contra_reference.beneficiario_codigo')->num_rows();
  }

  public function referidos()
  {
    return $this->db->query('SELECT `beneficiario`.*, `distrito`.`nome_distrito` FROM `beneficiario` INNER JOIN `distrito` ON `distrito` = `distrito`.`id_distrito` WHERE beneficiario.codigo_beneficiario IN (SELECT reference.beneficiario_codigo FROM reference)')->result();
  }

  public function contar_referidos()
  {
    return $this->db->query('SELECT `beneficiario`.*, `distrito`.`nome_distrito` FROM `beneficiario` INNER JOIN `distrito` ON `distrito` = `distrito`.`id_distrito` WHERE beneficiario.codigo_beneficiario IN (SELECT reference.beneficiario_codigo FROM reference)')->num_rows();
  }

  public function sem_contra_reference()
  {
    return $this->db->query('SELECT `beneficiario`.*, `distrito`.`nome_distrito` FROM `beneficiario` INNER JOIN `distrito` ON `distrito` = `distrito`.`id_distrito` WHERE beneficiario.codigo_beneficiario NOT IN (SELECT reference.beneficiario_codigo FROM reference)')->result();
  }

  public function contar_sem_contra_reference()
  {
    return $this->db->query('SELECT `beneficiario`.*, `distrito`.`nome_distrito` FROM `beneficiario` INNER JOIN `distrito` ON `distrito` = `distrito`.`id_distrito` WHERE beneficiario.codigo_beneficiario NOT IN (SELECT reference.beneficiario_codigo FROM reference)')->num_rows();
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

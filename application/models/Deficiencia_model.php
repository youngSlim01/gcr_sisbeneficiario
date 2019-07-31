<?php
class Deficiencia_model extends CI_Model
{
  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function listar_dificiencias()
  {
    $this->db->select('*');
    $query = $this->db->get('deficiencia');
    return $query->result();
  }

  public function insert_deficiencia($data)
  {
    return $this->db->insert('deficiencia',$data);
  }

  public function contador()
  {
    return $this->db->count_all('deficiencia')+1;
  }

  public function pegar_nome_dificiencia($id='')
  {
    $query = $this->db->query("SELECT * FROM dificiencia WHERE id = '$id'");

    $row = $query->row();

    if (isset($row))
    {
      return $row->nome_dificiencia;
    }
  }
  public function getDeficienciaBy_id($id)
  {);
    $this->db->where('id_beneficiencia',$id);
    return $this->db->get('beneficiencia')->row();
  }
}

 ?>

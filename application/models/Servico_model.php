<?php
class Servico_model extends CI_Model
{
  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function listar_servicos()
  {
    $this->db->select('*');
    $this->db->join('projecto','projecto_id=id','inner');
    $query = $this->db->get('servico');
    return $query->result();
  }
  public function insert_service($data)
  {
    return $this->db->insert('servico',$data);
  }

  public function contador()
  {
    return $this->db->count_all('servico')+1;
  }

  public function pegar_nome_projecto($id='')
  {
    $query = $this->db->query("SELECT * FROM projecto WHERE id = '$id'");

    $row = $query->row();

    if (isset($row))
    {
      return $row->nome;
    }
  }
  public function getServiceBy_id($id)
  {
    $this->db->join('projecto','projecto_id=id','inner');
    $this->db->where('id_servico',$id);
    return $this->db->get('servico')->row();
  }

  public function getServiceBy_id_Projecto ($id)
  {
    $this->db->where('projecto_id',$id);
    return $this->db->get('servico')->row();
  }

  public function listar_servicos_por_projecto($id)
  {
    $this->db->select('*');
    $this->db->where('projecto_id',$id);
    $this->db->join('projecto','projecto_id=id','inner');
    $query = $this->db->get('servico');
    return $query->result();
  }

  public function contar_ServiceBy_id_Projecto($id)
  {
    $this->db->select('*');
		$this->db->where('projecto_id', $id);
    $resultado = $this->db->get('servico')->num_rows();

    return $resultado;
  }

  public function editar($id,$data)
  {
    $this->db->where('id_servico',$id);
    return $this->db->update('servico',$data);
  }
}

 ?>

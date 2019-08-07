<?php
  class Projecto_model extends CI_Model { 
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function listarProjectos()
    {
      $query = $this->db->get('projecto');
      return $query->result();
    }

    public function listarProjectos_activo($id)
    {
      $this->db->where('status',$id);
      $resultado = $this->db->get('projecto')->result();
      return $resultado;
    }
    public function cadastrar($nome,$descricao,$codigo){
      $fields = array(
        'nome' =>$nome,
        'descricao'=>$descricao,
        'codigo'=>$codigo,
        'status'=>'activo'
      );
      return $this->db->insert('projecto',$fields);
    }

    public function contador($value='')
    {
      $sql = $this->db->count_all('projecto');
      return $sql+1;
    }

    public function getProjectById($id)
    {
      $this->db->where('id',$id);
      $resultado = $this->db->get('projecto')->row();
      return $resultado;
    }

    public function update($id,$data)
    {
        $this->db->where('id',$id);
        return $this->db->update('projecto',$data);
    }
    public function apagar($id)
    {
      $this->db->where('id',$id);
      return $this->db->delete('projecto');
    }

    public function contar_projecto()
    {
      return $this->db->count_all('projecto');
    }
  }

?>

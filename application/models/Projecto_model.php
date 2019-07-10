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

    public function cadastrar($nome,$descricao,$codigo){
      $fields = array(
        'nome' =>$nome,
        'descricao'=>$descricao,
        'codigo'=>$codigo,
        'status'=>'activo'
      );
      return $this->db->insert('projecto',$fields);
    }
  }

?>

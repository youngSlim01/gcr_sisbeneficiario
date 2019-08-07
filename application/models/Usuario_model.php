<?php
class Usuario_model extends CI_Model
{
  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function fazerLogin($email, $senha) {
       // $this->db->get('usuarios');
        $this->db->where('unome',$email);
        $this->db->where('usenha',$senha);

        $usuario=$this->db->get("usuario")->row_array();

        return $usuario;
    }

    public function get_user_id_from_username($email){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('unome',$email);

        return $this->db->get()->row('funcionario_id');
    }

    public function comparar_senha($user_id){
        $this->db->where('id',$user_id);
        $this->db->from('usuario');
        return $this->db->get()->row('usenha');
    }

    public function get_user($user_id){
        $this->db->where('funcionario_id',$user_id);
        $resultado = $this->db->get('usuario')->row();
        return $resultado;
    }

    public function actualizar_senha($dados,$id)
    {
      $this->db->where('funcionario_id',$id);
      return $this->db->update('usuario',$dados);
    }
}

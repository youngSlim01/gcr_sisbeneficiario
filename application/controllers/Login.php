<?php
defined('BASEPATH') or exit ('No direct script access allowed');
/**
 *
 */
class Login extends CI_Controller
{
  function __construct()
		{
			parent::__construct();
			$this->load->model('Usuario_model','usuario');
    	$this->load->library('form_validation');
    	$this->load->model("Funcionario_model",'funcionario');
		}


	 	public function index()
        {
          //echo md5('12345678');exit;
          //Regras de validação
	        $this->form_validation->set_rules('email','e-mail','trim|required');
	        $this->form_validation->set_rules('senha','palavra-passe','trim|required');

          //echo md5('admin');exit;
	        //verificar a validação
	        if($this->form_validation->run()==FALSE):
	            if(validation_errors()):
	                set_msg(validation_errors());
	            endif;
	        else:
	            //se a validação estiver correta executará esste codigo
	            $form = $this->input->post();
	            $email = $form['email'];
	            $senha = md5($form['senha']);

	            if($this->usuario->fazerLogin($email,$senha)):
	                //se o usuario estiver correcto executara isso
	                $user_id = $this->usuario->get_user_id_from_username($email);
	                $user    = $this->usuario->get_user($user_id);

	                $funcionario = $this->funcionario->buscarPorId($user_id);
                  $tipo_funcionario = $this->funcionario->buscarFuncaoPor_Id($funcionario->tipo_funcionario_id);
	             	  //print_r($tipo_funcionario->nome_funcao);exit;
	                //Se a validar estiver corecta vai passar dos forms para as variaveis abaixo!
	                $this->session->set_userdata('logged', TRUE);
	                $this->session->set_userdata('user_id',(int)$user_id);
	                $this->session->set_userdata('nome',(string)$funcionario->fnome);
	                $this->session->set_userdata('email',$email);
                  $this->session->set_userdata('funcao',(string)$tipo_funcionario->nome_funcao);

                  $this->session->set_userdata('data_admissao',$funcionario->data_created);

	                if($user->usenha != md5('12345678')):
	                	redirect(base_url(''),'refresh');
	                else:
	                	redirect(base_url('login/trocar/'.$user_id),'refresh');
	                endif;
	            else:
	                set_msg("Usuario e/ou senha incorrecta!");
	            endif;
	        endif;

	        $dados = array(

	        );

	        $this->load->view('login',$dados);
        }

        public function trocar($id)
        {
	        $dados = array(
            'codigo'=>$id,
	        );
          //Regras de validação
          $this->form_validation->set_rules('senha','e-mail','trim|required');
          $this->form_validation->set_rules('confirmsenha','palavra-passe','trim|required');

          //verificar a validação
          if($this->form_validation->run()==FALSE):
              if(validation_errors()):
                  set_msg(validation_errors());
              endif;
          else:
              //se a validação estiver correta executará esste codigo
              $form = $this->input->post();
              $senhaconfirm = $form['confirmsenha'];
              $senha = $form['senha'];

              $data = array('usenha' => md5($senha), );
              if($senha == $senhaconfirm):
                if($this->usuario->actualizar_senha($data,$id)):
                    echo '<script>alert("Senha actualizada com sucesso!")</script>';
                    redirect(base_url(''),'refresh');
                endif;
              else:
                set_msg("As senhas nao coscidem!");
              endif;
          endif;

	        $this->load->view('trocar_login',$dados);
        }

        public function recuperar_senha($id)
        {
	        $dados = array(
            'codigo'=>$id,
	        );
          //Regras de validação
          $this->form_validation->set_rules('senha','e-mail','trim|required');
          $this->form_validation->set_rules('confirmsenha','palavra-passe','trim|required');

          //verificar a validação
          if($this->form_validation->run()==FALSE):
              if(validation_errors()):
                  set_msg(validation_errors());
              endif;
          else:
              //se a validação estiver correta executará esste codigo
              $form = $this->input->post();
              $senhaconfirm = $form['confirmsenha'];
              $senha = $form['senha'];

              $data = array('usenha' => md5($senha), );
              if($senha == $senhaconfirm):
                if($this->usuario->actualizar_senha($data,$id)):
                    echo '<script>alert("Senha actualizada com sucesso!")</script>';
                    redirect(base_url(''),'refresh');
                endif;
              else:
                set_msg("As senhas nao coscidem!");
              endif;
          endif;

	        $this->load->view('esqueceu_senha',$dados);
        }

        public function sair(){
	        if ($this->session->userdata('logged')):
	            # code...
	            $this->session->unset_userdata('user_id');
	            $this->session->unset_userdata('nome');
	            $this->session->unset_userdata('logged');

	            set_msg("Voce saiu do sistema");
	            redirect(base_url('login'),'refresh');
	        endif;
    	}
}

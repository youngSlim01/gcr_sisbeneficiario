<?php
defined('BASEPATH') or exit ('No direct script access allowed');
/**
 *
 */
class Funcionario extends CI_Controller
{
  function __construct($value='')
  {
    parent::__construct();
    $this->load->model('Funcionario_model','f');
  }

  public function index($value='')
  {
    $dados = array('titulo' => "Activistas");
    $this->load->view('top',$dados);
    $this->load->view('funcionario/listar');
    $this->load->view('botton');
  }

  public function cadastrar($value='')
  {
    $dados = array('titulo' => "Activistas");
    $this->load->view('top',$dados);
    $this->load->view('funcionario/cadastrar');
    $this->load->view('botton');
  }

  public function listarTiposFuncionarios()
  {
    $dados = array(
      'titulo'=>'Cadastrar tipos de Funcionarios',
      'listar'=>$this->f->listarTiposFuncionarios()
    );
		$this->load->view('top',$dados);
    $this->load->View("configuracao/tipoFuncionario/listar");
		$this->load->view('botton');
  }

  public function CadastrarTiposFuncionarios()
  {
    $this->form_validation->set_rules('tiponome','Categoria','trim|required');
    if($this->form_validation->run()==false):
      if(validation_errors()):
        set_msg('<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alerta!</h4><h5>'.validation_errors().'
        </h5></div>');
      endif;
    else:
      $nom = $this->input->post('tiponome');
      $nome = array(
        'nome' => $nom,
        'status'=>'Activo'
      );

      if($this->f->CadastrarTiposFuncionarios($nome)):
        set_msg('<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Categoria '.$nom. ' registado com Sucesso!
        </div>');
        redirect(base_url('funcionario/listarTiposFuncionarios'),'refresh');
      else:
        set_msg('<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Info!</h4>
        Erro ocorido ao salvar!</div>');
        endif;
    endif;
    $dados = array('titulo'=>'Cadastrar tipos de Funcionarios');
		$this->load->view('top',$dados);
    $this->load->View("configuracao/tipoFuncionario/cadastrar");
		$this->load->view('botton');
  }

}
 ?>

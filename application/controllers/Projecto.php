<?php
/*
<div class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-warning"></i> Alert!</h4>
  Warning alert preview. This alert is dismissable.
</div>

<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-check"></i> Alert!</h4>
  Success alert preview. This alert is dismissable.
</div>
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Projecto extends CI_Controller
{
  public function __construct(){
      parent::__construct();
      $this->load->model('Projecto_model','p');
  }
  public function index($value='')
  {
    $dados = array(
      'titulo'=>'Projectos',
      'listar'=>$this->p->listarProjectos()
    );
    $this->load->view('top',$dados);
    $this->load->view('projecto/listar');
    $this->load->view('botton');
  }

  public function cadastrar()
  {

    $dados = array('titulo'=>'cadastrar Projecto');
    $this->form_validation->set_rules('pronome','Nome do projecto','trim|required');
    $this->form_validation->set_rules('prodescricao','Descricao do projecto','trim|required');
    if($this->form_validation->run()==false):
      if(validation_errors()):
        set_msg('<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alerta!</h4><h5>'.validation_errors().'
        </h5></div>');
      endif;
    else:
      $form_data = $this->input->post();
      $nome = $form_data['pronome'];
      $descricao = $form_data['prodescricao'];
      $codigo = "GCR1901";

      if($this->p->cadastrar($nome,$descricao,$codigo)):
        set_msg('<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Info!</h4>
        Projecto '.$nome. ' registado com Sucesso!
        </div>');
        redirect(base_url('projecto'),'refresh');
      else:
        set_msg('<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Info!</h4>
        Erro ocorido ao salvar o projecto!</div>');
      endif;

    endif;

    $this->load->view('top',$dados);
    $this->load->view('projecto/cadastrar');
    $this->load->view('botton');
  }
}

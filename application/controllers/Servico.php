<?php
defined('BASEPATH') or exit ('No direct access allowed');

class Servico extends CI_Controller
{
  public function __construct($value='')
  {
    parent::__construct();
    $this->load->model('Projecto_model','p');
    $this->load->model('Servico_model','s');
  }

  public function index($value='')
  {
    $dados = array(
      'titulo'=>'Servi&ccedil;os',
      'listar_servicos'=>$this->s->listar_servicos(),
    );
    $this->load->view('top',$dados);
    $this->load->view('servico/listar');
    $this->load->view('botton');
  }

  public function cadastrar($value='')
  {
    $dados = array(
      'titulo'=>'cadastrar Servi&ccedil;o',
      'listarProjectos'=>$this->p->listarProjectos()
    );

    $this->form_validation->set_rules('servnome','Nome do servico','trim|required');
    $this->form_validation->set_rules('servdescricao','descricao','trim|required');
    if($this->form_validation->run()==false){
      if(validation_errors()){
        set_msg('<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alerta!</h4><h5>'.validation_errors().'
        </h5></div>');
      }
    }else{
      $datestring = '%Y';
      $ano_actual = strftime($datestring);
      $ano_actual = substr($ano_actual,(strlen($ano_actual)-2),strlen($ano_actual));

      $nome = $this->input->post('servnome');
      $descricao = $this->input->post('servdescricao');
      $projecto = $this->input->post('servprojecto');


      $cod_proj = $this->s->pegar_nome_projecto($projecto);
      $cod_proj = substr($cod_proj,0,3);
      $codigo = "GCR".$ano_actual.mb_strtoupper($cod_proj)."0".$this->s->contador();

      $dados = array(
        'codigo_servico' => $codigo,
        'nome_servico' => $nome,
        'descricao_servico' => $descricao,
        'projecto_id' => $projecto,
        'status_servico'=>'Activo'
      );

      if($this->s->insert_service($dados)):
        set_msg('<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Servico '.$nome. ' registado com Sucesso!
        </div>');
        redirect(base_url('servico'),'refresh');
      else:
        set_msg('<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Info!</h4>
        Erro ocorido ao registar o servico!</div>');
      endif;
    }
    $this->load->view('top',$dados);
    $this->load->view('servico/cadastrar');
    $this->load->view('botton');
  }

  public function editar($id='')
  {
    $dados = array(
      'titulo'=>'Alterar Servi&ccedil;o',
      'servico'=>$this->s->getServiceBy_id($id),
      'projectos'=>$this->p->listarProjectos(),
    );

    $this->form_validation->set_rules('servnome','Nome do servico','trim|required');
    $this->form_validation->set_rules('servdescricao','descricao','trim|required');
    if($this->form_validation->run()==false):
      if(validation_errors()):
        set_msg('<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alerta!</h4><h5>'.validation_errors().'
        </h5></div>');
      endif;
    else:
      $id = $this->input->post('servid');
      $nome_servico = $this->input->post('servnome');
      $descricao = $this->input->post('servdescricao');
      $nome_projecto = $this->input->post('idprojecto');
      $estado = $this->input->post('status');

      $dados = array(
        'id_servico'=>$id,
        'nome_servico' => $nome_servico,
        'descricao_servico' => $descricao,
        'projecto_id' => $nome_projecto,
        'status_servico'=> $estado
      );

      if($this->s->editar($id,$dados)):
        set_msg('<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Servico '.$this->input->post('servcodigo'). ' alterado com Sucesso!
        </div>');
        redirect(base_url('servico'),'refresh');
      else:
        set_msg('<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Info!</h4>
        Erro ocorido ao alterar o servico!</div>');
      endif;
    endif;
    $this->load->view('top',$dados);
    $this->load->view('servico/editar');
    $this->load->view('botton');
  }
  public function definicao($id='')
  {
    $dados = array(
      'titulo' => 'Configuracoes de projecto',
      'projecto' => $this->s->getServiceBy_id($id),

   );

    $this->load->view('top',$dados);
    $this->load->view('servico/definicao');
    $this->load->view('botton');
  }
}

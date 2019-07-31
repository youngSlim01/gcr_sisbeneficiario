<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Beneficiario extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model('Servico_model','s');
  }

  public function index($value='')
  {
    $dados = array('titulo'=>'Beneficiarios');
		$this->load->view('top',$dados);
    $this->load->View("beneficiario/listar");
		$this->load->view('botton');
  }

  public function dashboard()
  {
    $dados = array('titulo'=>'Dados dos Beneficiarios');
		$this->load->view('top',$dados);
    $this->load->View("beneficiario/index");
		$this->load->view('botton');
  }

  public function cadastrar()
  {
    $dados = array(
      'titulo'=>'Cadastar Beneficiario',
      'distritos'=>$this->d->listar_distritos(),
    );

    $this->form_validation->set_rules('bnome','Nome do Beneficiario','required|trim');
    $this->form_validation->set_rules('bdata_nasc','Data de nascimento','required|trim');
    $this->form_validation->set_rules('bsexo','Sexo','required|trim');
    $this->form_validation->set_rules('bceluar','Celular','trim');
    $this->form_validation->set_rules('bmorada','Morada','required|trim');
    $this->form_validation->set_rules('breferido','Referido','required|trim');

    if($this->form_validation->run()==false):
      if(validation_errors()):
        set_msg('<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alerta!</h4><h5>'.validation_errors().'
        </h5></div>');
      endif;
    else:
      $datestring = '%Y';
      $ano_actual = strftime($datestring);
      $codigo = "GCRBEN0".$this->ben->contador()."/".$ano_actual;

      $nome = $this->input->post('bnome');
      $sexo = $this->input->post('bsexo');
      $idade = $this->input->post('bdata_nasc');
      $celular = $this->input->post('bceluar');
      $morada = $this->input->post('bmorada');
      $referido = $this->input->post('breferido');
      $Vulnerabilidade = $this->input->post('bvulnerabilidade');
      $obs = $this->input->post('bobs');
      $distrito = $this->input->post('bdistrito');
      $deficiencia = $this->input->post('bdeficiencia');
      $func_id = 1;
      $data = array(
        'codigo_beneficiario'=>$codigo,
        'nome' => $nome,
        'data_nascimento' => date('y-m-d', strtotime($idade)),
        'sexo' => $sexo,
        'bairro' => $morada,
        'celular'=>$celular,
        'distrito'=>$distrito,
        'obs'=>$obs,
        'dificiencia'=>$deficiencia,
        'Vulnerabilidade' => $Vulnerabilidade,
        'referido' => $referido,
        'funcionario_id'=>$func_id,
        'data_created' => date('Y-m-d H:i:s'),
      );

    #  print_r($data);exit;
      if($this->ben->cadastrarbeneficiario($data)):
        set_msg('<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Beneficiario '.$nome. ' registado com Sucesso!
        </div>');
        redirect('beneficiario/referir/'.$this->ben->ultimo_id());
      else:
        set_msg('<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Erro ocorido ao registar, tente novamente</div>');
      endif;
    endif;

		$this->load->view('top',$dados);
    $this->load->View("beneficiario/cadastrar");
		$this->load->view('botton');
  }
  public function referir($id="")
  {
    $dados = array(
      'titulo'=>'Referir Beneficiario',
      'distritos'=>$this->d->listar_distritos(),
      'last_inserted' =>$this->ben->beneficiario_id($id),
      'listar_servicos'=>$this->s->listar_servicos(),
    );

    $this->form_validation->set_rules('rss_tb','Sinais e sintomas','required|trim');
    $this->form_validation->set_rules('rnit_index','NIT','required|trim');

    if($this->form_validation->run()==false):
      if(validation_errors()):
        set_msg('<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alerta!</h4><h5>'.validation_errors().'
        </h5></div>');
      endif;
    else:
      $codigo = $this->input->post('rcodigo_beneficiario');
      $cotacto_tb = $this->input->post('rcontacto_tb');
      $servico = $this->input->post('rservico');
      $nit = $this->input->post('rnit_index');
      $sinais = $this->input->post('rss_tb');
      $diagnostico = $this->input->post('rdiagnosticado');

      $datas = array(
        'beneficiario_id' => $this->ben->beneficiario_id($id)->id,
        'codigo_beneficiario'=>$codigo,
        'servico_id'=>$servico,
        'projecto_id'=>$this->s->getServiceBy_id($servico)->projecto_id,
      );

      if($this->ben->addBeneficiario_servico($datas)):
        set_msg('<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Beneficiario '.$codigo. ' adicionado com Sucesso!
        </div>');
        redirect('beneficiario/diagnostico/'.$this->ben->ultimo_id());
      else:

      endif;
    endif;
    $this->load->view('top',$dados);
    $this->load->View("beneficiario/referencia");
		$this->load->view('botton');
  }

  public function diagnostico($id)
  {
    $dados = array(
      'titulo'=>'Dados de diagnostico do Beneficiario',
      'distritos'=>$this->d->listar_distritos(),
    );

    $this->load->view('top',$dados);
    $this->load->View("beneficiario/diagnostico");
		$this->load->view('botton');
  }
}

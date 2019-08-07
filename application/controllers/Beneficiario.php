<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Beneficiario extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model('Servico_model','s');
    $this->load->model('Funcionario_model','func');

  }

  public function index()
  {
    $dados = array(
      'titulo'=>'Beneficiarios',
      'beneficiarios' => $this->ben->get_all(),
    );

    //print_r($this->ben->get_all());exit;
		$this->load->view('top',$dados);
    $this->load->View("beneficiario/listar");
		$this->load->view('botton');
  }

  public function dashboard()
  {
    $dados = array(
      'titulo'=>'Dados dos Beneficiarios',
      'contar_referidos'=>$this->ben->contar_referidos(),
      'contar_cr'=>$this->ben->contar_contra_reference(),
      'contar_scr'=>$this->ben->contar_sem_contra_reference(),
    );
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
      $func_id = $this->session->userdata('user_id');
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

        if($referido==1):
          set_msg('<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          Beneficiario '.$nome. ' registado com Sucesso!
          </div>');
          redirect('beneficiario/referir/'.$this->ben->ultimo_id());
        else:
          set_msg('<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          Beneficiario '.$nome. ' registado com Sucesso!
          </div>');
          redirect('beneficiario','refresh');
        endif;
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
  public function referir($id)
  {
    $dados = array(
      'titulo'=>'Referir Beneficiario',
      'distritos'=>$this->d->listar_distritos(),
      'last_inserted' =>$this->ben->beneficiario_id($id),
      'listar_servicos'=>$this->s->listar_servicos(),
      'unid_sanitarias'=>$this->ud->listar_unidades_sanitarias(),
      'projecto'=>$this->func->get_project_cod_by_code_in_supervisor(20),
    );
    $id_projecto = $dados['projecto']->id;
    $dados['activistas']=$this->act->listar_activistas_por_projecto($id_projecto);

    //print_r($dados['activistas']); exit;

    $this->form_validation->set_rules('runidade_sanitaria','Unidade sanitaria','required|trim');
    $this->form_validation->set_rules('rservico','Servico','required|trim');

    if($this->form_validation->run()==false):
      if(validation_errors()):
        set_msg('<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alerta!</h4><h5>'.validation_errors().'
        </h5></div>');
      endif;
    else:
      $codigo = $this->input->post('rcodigo_beneficiario');
      $activista = $this->input->post('rcod_activista');
      $servico = $this->input->post('rservico');
      $unid_sanitaria = $this->input->post('runidade_sanitaria');
      $supervisor = $this->input->post('rcodigo_supervisor');
      $diagnostico = $this->input->post('rdiagnosticado');

      $datas = array(
        'activista_id'=>$activista,
        'supervisor_id'=>$supervisor,
        'unidade_sanitaria_id'=>$unid_sanitaria,
        'date_created'=>data_actual(),
        'beneficiario_id' =>$id,# $this->ben->beneficiario_id($id)->id,
        'beneficiario_codigo'=>$codigo,
        'servico_id'=>$servico,
        'projecto_id'=>$this->s->getServiceBy_id($servico)->projecto_id,
      );

      if($this->ben->addBeneficiario_reference($datas)):
        $dados = array('referido' => 1,);
        if($this->ben->actualizarRef_beneficiario($dados,$codigo)):
          set_msg('<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          Beneficiario '.$codigo. ' adicionado com Sucesso!
          </div>');
          redirect('beneficiario');
      endif;
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
      'ben'=>$this->ben->referencia($id),
      'idref'=>$id
    );

    $this->form_validation->set_rules('clinico_nome','Nome do clinico','trim|required');
    $this->form_validation->set_rules('nit','NIT','required|trim');
    $this->form_validation->set_rules('nid','NID','required|trim');

    if($this->form_validation->run()==false):
      if(validation_errors()):
        set_msg('<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alerta!</h4><h5>'.validation_errors().'
        </h5></div>');
      endif;
    else:
      $nome_clinico = $this->input->post('clinico_nome');
      $nit = $this->input->post('nit');
      $nid = $this->input->post('nid');
      $exame = $this->input->post('exame');
      $resultado = $this->input->post('tratamento');
      $id_refer = $this->ben->referencia_id($id);
      $observacoes = $this->input->post('obs');
      $benef_codigo = $this->input->post('codigo_beneficiario');

      $datas = array(
        'idreferencia' => $id_refer,
        'nome_clinico'=>$nome_clinico,
        'nit'=>$nit,
        'nid'=>$nid,
        'beneficiario_codigo'=>$benef_codigo,
        'testado'=>$exame,
        'resultado'=>$resultado,
        'date_created'=>data_actual(),
        'obs'=>$observacoes,
      );

      if($this->ben->addcontra_reference($datas)):
        set_msg('<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Beneficiario '.$codigo. ' contra-referido com Sucesso!
        </div>');
        redirect('beneficiario/todoscontrareferidos');
      else:
        set_msg('<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Erro ao contra-referir!
        </div>');
        redirect('beneficiario');
      endif;
    endif;

    $this->load->view('top',$dados);
    $this->load->View("beneficiario/diagnostico");
		$this->load->view('botton');
  }

  public function referidos()
  {
    $dados = array(
      'titulo'=>'Beneficiarios contrareferidos',
      'beneficiarios' => $this->ben->referidos(),
    );

    $this->load->view('top',$dados);
    $this->load->View("beneficiario/referidos/listar");
		$this->load->view('botton');
  }

  public function contrareferidos()
  {
    $dados = array(
      'titulo'=>'Beneficiarios contrareferidos',
      'beneficiarios' => $this->ben->contra_reference(),
    );

    $this->load->view('top',$dados);
    $this->load->View("beneficiario/contrareferidos/index");
		$this->load->view('botton');
  }

  public function todoscontrareferidos()
  {
    $dados = array(
      'titulo'=>'Beneficiarios contrareferidos',
      'beneficiarios' => $this->ben->contra_reference(),
    );

    $this->load->view('top',$dados);
    $this->load->View("beneficiario/contrareferidos/listar");
		$this->load->view('botton');
  }

  public function hivp()
  {
    $dados = array(
      'titulo'=>'Beneficiarios contrareferidos',
      'beneficiarios' => $this->ben->hiv_posetivo(),
    );

    $this->load->view('top',$dados);
    $this->load->View("beneficiario/contrareferidos/listar");
		$this->load->view('botton');
  }

  public function hivn()
  {
    $dados = array(
      'titulo'=>'Beneficiarios contrareferidos',
      'beneficiarios' => $this->ben->hiv_negativo(),
    );

    $this->load->view('top',$dados);
    $this->load->View("beneficiario/contrareferidos/listar");
		$this->load->view('botton');
  }

  public function tbp()
  {
    $dados = array(
      'titulo'=>'Beneficiarios contrareferidos',
      'beneficiarios' => $this->ben->tb_posetivo(),
    );

    $this->load->view('top',$dados);
    $this->load->View("beneficiario/contrareferidos/listar");
    $this->load->view('botton');
  }

  public function tbn()
  {
    $dados = array(
      'titulo'=>'Beneficiarios contrareferidos',
      'beneficiarios' => $this->ben->tb_negativo(),
    );

    $this->load->view('top',$dados);
    $this->load->View("beneficiario/contrareferidos/listar");
		$this->load->view('botton');
  }

  public function semcontrareferencias()
  {
    $dados = array(
      'titulo'=>'Beneficiarios contrareferidos',
      'beneficiarios' => $this->ben->sem_contra_reference(),
    );

    $this->load->view('top',$dados);
    $this->load->View("beneficiario/semcontrareferencias/listar");
		$this->load->view('botton');
  }
}

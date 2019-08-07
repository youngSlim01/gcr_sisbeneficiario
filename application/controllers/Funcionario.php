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

  public function index()
  {
    $dados = array(
      'titulo' => "Supervisores e Activistas",
      'listar'=>$this->f->listarActivistas(),
      'contar_activista'=>$this->f->contarActivistas(1),
    );
    $this->load->view('top',$dados);
    $this->load->view('funcionario/listar');
    $this->load->view('botton');
  }

  public function listarFuncionarios()
  {
    $datestring = '%Y';
    $dados = array(
      'titulo' => "Funcionarios",
      'listar'=>$this->f->listarFuncionarios(),
      'contar_activista'=>$this->f->contarFuncionarios(),
      'ano_actual'=>strftime($datestring),
    );
    $this->load->view('top',$dados);
    $this->load->view('funcionario/listar_todos');
    $this->load->view('botton');
  }

  public function listar_gestores()
  {
    $dados = array(
      'titulo' => "Gestores",
      'listar'=>$this->f->listarGestores(),
      'contar_activista'=>$this->f->contarActivistas(1),
    );
    $this->load->view('top',$dados);
    $this->load->view('funcionario/listar');
    $this->load->view('botton');
  }

  public function listar_supervisores()
  {
    $dados = array(
      'titulo' => "Supervisores",
      'listar'=>$this->f->listarSupervisores(),
      'contar_activista'=>$this->f->contarActivistas(1),
    );
    $this->load->view('top',$dados);
    $this->load->view('funcionario/listar');
    $this->load->view('botton');
  }

  public function cadastrar($value='')
  {
    $dados = array(
      'titulo' => "Funcionarios",
      'categorias'=>$this->f->listarTiposFuncionarios(),
      'projectos'=>$this->p->listarProjectos(),
      'distritos'=>$this->d->listar_distritos(),
      'unid_sanitarias'=>$this->ud->listar_unidades_sanitarias(),
    );
    $this->form_validation->set_rules('unome','Email','trim|required');
    $this->form_validation->set_rules('fnome','Nome de funcionario','trim|required');
    if($this->form_validation->run()==false):
      if(validation_errors()):
        set_msg('<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alerta!</h4><h5>'.validation_errors().'
        </h5></div>');
      endif;
    else:
      $nome = $this->input->post('fnome');
      $sexo = $this->input->post('fsexo');
      $projecto = $this->input->post('fprojecto');
      $categoria = $this->input->post('fcategoria');
      $distrito = $this->input->post('fdistrito');
      $dataNascimento = $this->input->post('fdata_nascimento');
      $unid_sanitaria = $this->input->post('funidade_sanitaria');
      $now = date('Y-m-d H:i:s');
      $email = $this->input->post('unome');
      $pass = md5("12345678");

      $dados = array(
        'fnome' => $nome,
        'Sexo' => $sexo,
        'data_nascimento' => date('y-m-d H:i:s', strtotime($dataNascimento)),
        'tipo_funcionario_id' => $categoria,
        'projecto_id' => $projecto,
        'data_created' => $now,
      );

      if($categoria == 1){
        if($this->f->cadastrarFuncionario($dados)):
          $detalhes = array(
            'id_activista' =>$this->f->ultimo_id(),
            'unidade_sanitaria_id'=>$unid_sanitaria,
            'distrito_id'=>$distrito,
          );
          $last_id = $this->f->ultimo_id();
          if($this->det->insert_detalhes($detalhes)):
            $user = array(
              'unome' => $email,
              'usenha' => $pass,
              'nivel' => $categoria,
              'funcionario_id' => $last_id
            );
            if($this->f->cadastrar_usuario($user)):
              set_msg('<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              Activista '.$nome. ' registado com Sucesso!
              </div>');
              redirect(base_url('funcionario'),'refresh');
            endif;
          endif;
        endif;
      }elseif($categoria==2) {
        if($this->f->cadastrarFuncionario($dados)):
          $detalhe = array(
            'id_activista' =>$this->f->ultimo_id(),
            'distrito_id'=>$distrito,
          );
          $last_id = $this->f->ultimo_id();
          if($this->det->insert_detalhes($detalhe)):
            $user = array(
              'unome' => $email,
              'usenha' => $pass,
              'nivel' => $categoria,
              'funcionario_id' => $last_id
            );
            if($this->f->cadastrar_usuario($user)):
              set_msg('<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              Supervisor(a) '.$nome. ' registado com Sucesso!
              </div>');
              redirect(base_url('funcionario/listar_supervisores'),'refresh');
            endif;
          endif;
        else:
          set_msg('<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          Erro ocorido ao salvar!</div>');
        endif;
      }elseif($categoria==3) {
          if($this->f->cadastrarFuncionario($dados)):
            $last_id = $this->f->ultimo_id();
            $user = array(
              'unome' => $email,
              'usenha' => $pass,
              'nivel' => $categoria,
              'funcionario_id' => $last_id
            );
            if($this->f->cadastrar_usuario($user)):
              set_msg('<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              Gestor(a) '.$nome. ' registado com Sucesso!
              </div>');
              redirect(base_url('funcionario/listarFuncionarios'),'refresh');
          endif;
        else:
          set_msg('<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          Erro ocorido ao salvar!</div>');
        endif;
      }elseif($categoria==4) {
        $data = array(
          'fnome' => $nome,
          'Sexo' => $sexo,
          'data_nascimento' => date('y-m-d H:i:s', strtotime($dataNascimento)),
          'tipo_funcionario_id' => $categoria,
          'data_created' => $now,
        );
          $last_id = $this->f->ultimo_id();
        if($this->f->cadastrarFuncionario($data)):
          $user = array(
            'unome' => $email,
            'usenha' => $pass,
            'nivel' => $categoria,
            'funcionario_id' => $last_id
          );
          if($this->f->cadastrar_usuario($user)):
            set_msg('<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Coordenador(a) '.$nome. ' registado com Sucesso!
            </div>');
            redirect(base_url('funcionario/listarFuncionarios'),'refresh');
          endif;
        else:
          set_msg('<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          Erro ocorido ao salvar!</div>');
        endif;
      }


    endif;
    $this->load->view('top',$dados);
    $this->load->view('funcionario/cadastrar');
    $this->load->view('botton');
  }

  public function editar($value)
  {
    $dados = array(
      'titulo' => "Funcionarios",
      'categorias'=>$this->f->listarTiposFuncionarios(),
      'projectos'=>$this->p->listarProjectos(),
      'distritos'=>$this->d->listar_distritos(),
      'unid_sanitarias'=>$this->ud->listar_unidades_sanitarias(),
    );
    $this->form_validation->set_rules('unome','Email','trim|required');
    $this->form_validation->set_rules('fnome','Nome de funcionario','trim|required');
    if($this->form_validation->run()==false):
      if(validation_errors()):
        set_msg('<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alerta!</h4><h5>'.validation_errors().'
        </h5></div>');
      endif;
    else:
      $nome = $this->input->post('fnome');
      $sexo = $this->input->post('fsexo');
      $projecto = $this->input->post('fprojecto');
      $categoria = $this->input->post('fcategoria');
      $distrito = $this->input->post('fdistrito');
      $dataNascimento = $this->input->post('fdata_nascimento');
      $unid_sanitaria = $this->input->post('funidade_sanitaria');
      $now = date('Y-m-d H:i:s');
      $email = $this->input->post('unome');
      $pass = "12345678";

      $dados = array(
        'fnome' => $nome,
        'Sexo' => $sexo,
        'data_nascimento' => date('y-m-d H:i:s', strtotime($dataNascimento)),
        'tipo_funcionario_id' => $categoria,
        'projecto_id' => $projecto,
        'data_created' => $now,
      );

      if($categoria == 1){
        if($this->f->cadastrarFuncionario($dados)):
          $detalhes = array(
            'id_activista' =>$this->f->ultimo_id(),
            'unidade_sanitaria_id'=>$unid_sanitaria,
            'distrito_id'=>$distrito,
          );
          $last_id = $this->f->ultimo_id();
          if($this->det->insert_detalhes($detalhes)):
            $user = array(
              'unome' => $email,
              'usenha' => $pass,
              'nivel' => $categoria,
              'funcionario_id' => $last_id
            );
            if($this->f->cadastrar_usuario($user)):
              set_msg('<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              Activista '.$nome. ' registado com Sucesso!
              </div>');
              redirect(base_url('funcionario'),'refresh');
            endif;
          endif;
        endif;
      }elseif($categoria==2) {
        if($this->f->cadastrarFuncionario($dados)):
          $detalhe = array(
            'id_activista' =>$this->f->ultimo_id(),
            'distrito_id'=>$distrito,
          );
          $last_id = $this->f->ultimo_id();
          if($this->det->insert_detalhes($detalhe)):
            $user = array(
              'unome' => $email,
              'usenha' => $pass,
              'nivel' => $categoria,
              'funcionario_id' => $last_id
            );
            if($this->f->cadastrar_usuario($user)):
              set_msg('<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              Supervisor(a) '.$nome. ' registado com Sucesso!
              </div>');
              redirect(base_url('funcionario'),'refresh');
            endif;
          endif;
        else:
          set_msg('<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          Erro ocorido ao salvar!</div>');
        endif;
      }elseif($categoria==3) {
          if($this->f->cadastrarFuncionario($dados)):
            $last_id = $this->f->ultimo_id();
            $user = array(
              'unome' => $email,
              'usenha' => $pass,
              'nivel' => $categoria,
              'funcionario_id' => $last_id
            );
            if($this->f->cadastrar_usuario($user)):
              set_msg('<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              Gestor(a) '.$nome. ' registado com Sucesso!
              </div>');
              redirect(base_url('funcionario/listarFuncionarios'),'refresh');
          endif;
        else:
          set_msg('<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          Erro ocorido ao salvar!</div>');
        endif;
      }elseif($categoria==4) {
        $data = array(
          'fnome' => $nome,
          'Sexo' => $sexo,
          'data_nascimento' => date('y-m-d H:i:s', strtotime($dataNascimento)),
          'tipo_funcionario_id' => $categoria,
          'data_created' => $now,
        );
          $last_id = $this->f->ultimo_id();
        if($this->f->cadastrarFuncionario($data)):
          $user = array(
            'unome' => $email,
            'usenha' => $pass,
            'nivel' => $categoria,
            'funcionario_id' => $last_id
          );
          if($this->f->cadastrar_usuario($user)):
            set_msg('<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Coordenador(a) '.$nome. ' registado com Sucesso!
            </div>');
            redirect(base_url('funcionario/listarFuncionarios'),'refresh');
          endif;
        else:
          set_msg('<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          Erro ocorido ao salvar!</div>');
        endif;
      }


    endif;
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
        'nome_funcao' => $nom,
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

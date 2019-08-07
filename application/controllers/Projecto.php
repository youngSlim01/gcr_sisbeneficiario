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
      $this->load->model('Servico_model','s');
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
      $datestring = '%Y';
      $ano_actual = strftime($datestring);
      $ano_actual = substr($ano_actual,(strlen($ano_actual)-2),strlen($ano_actual));

      $form_data = $this->input->post();
      $nome = $form_data['pronome'];
      $descricao = $form_data['prodescricao'];
      $codigo = "GCR".$ano_actual."0".$this->p->contador();;

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

  function remover($id){
    if($this->p->apagar($id)):
      set_msg('<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Info!</h4>
      Projecto removido com Sucesso!
      </div>');
      redirect(base_url('projecto'),'refresh');
    endif;
  }
  public function editar($id='')
  {
    $dados = array(
      'titulo' => 'Alterar projecto',
      'projecto' => $this->p->getProjectById($id),

   );

   $this->form_validation->set_rules("pronome",'Nome do projecto','trim|required');
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

     $idproduto = $this->input->post('proid');
     $nome = $form_data['pronome'];
     $descricao = $form_data['prodescricao'];
     $status = $this->input->post('status');

     $data = array(
       'id' => $idproduto,
       'nome' => $nome,
       'descricao'=> $descricao,
       'status'=>$status
     );

     if($this->p->update($idproduto,$data)):
       set_msg('<div class="alert alert-success alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       Projecto '.$nome. ' modificado com Sucesso!
       </div>');
       redirect(base_url('projecto'),'refresh');
     else:
       set_msg('<div class="alert alert-success alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <h4><i class="icon fa fa-warning"></i> Info!</h4>
       Erro ocorido ao efectuar a projecto!</div>');
     endif;
   endif;

   $this->load->view('top',$dados);
   $this->load->view('projecto/editar');
   $this->load->view('botton');
  #redirect(base_url('projecto'),'refresh');
  }
  public function definicao($id)
  {
    $dados = array(
      'titulo' => 'Configuracoes de projecto',
      'projecto' => $this->p->getProjectById($id),
      'contar_beneficiarios_do_projecto' => $this->ben->contar_beneficiarios_por_projecto($id),
      'contar_activistas_do_projecto' => $this->act->contar_activistas_por_projecto($id),
      'contar_servico_do_projecto' => $this->s->contar_ServiceBy_id_Projecto($id),
    );
    
    $this->load->view('top',$dados);
    $this->load->view('projecto/definicao');
    $this->load->view('botton');
  }

  public function pservico($id)
  {
    $dados = array(
      'titulo' => 'Servicos do projecto',
      'projecto' => $this->p->getProjectById($id),
      'listar_servicos_por_projecto' =>$this->s->listar_servicos_por_projecto($id)
   );

    $this->load->view('top',$dados);
    $this->load->view('projecto/servico_projecto');
    $this->load->view('botton');
  }
}

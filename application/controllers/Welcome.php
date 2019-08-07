<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
      parent::__construct();
      $this->load->model('Projecto_model','p');
			$this->load->model('Servico_model','s');
			verifica_login();
  }
	public function index()
	{
		$dados = array(
			'titulo'=>'Dashboard',
			'listar'=>$this->p->listarProjectos_activo('Activo'),
			'contar_beneficiarios'=>$this->ben->contar_beneficiarios(),
			'contar_projecto'=>$this->p->contar_projecto(),
			'contar_activista'=>$this->f->contarActivistas(1),
			'contar_servico'=>$this->s->contar_servicos(),
		);
		$this->load->view('top',$dados);
		$this->load->view('index');
		$this->load->view('botton');
	}

	public function projecto()
	{
		$dados = array(
			'titulo'=>'Projectos',
			'listar'=>$this->p->listarProjectos(),
		);
		$this->load->view('top',$dados);
		$this->load->view('projecto/index');
		$this->load->view('botton');
	}

	public function servico()
	{
		$dados = array(
			'titulo'=>'Servi&ccedil;os',
			'listar_servicos'=>$this->s->listar_servicos(),
		);
		$this->load->view('top',$dados);
		$this->load->view('servico/index');
		$this->load->view('botton');
	}
}

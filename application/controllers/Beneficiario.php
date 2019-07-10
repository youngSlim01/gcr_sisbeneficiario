<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Beneficiario extends CI_Controller
{

  public function index($value='')
  {
    $dados = array('titulo'=>'Beneficiarios');
		$this->load->view('top',$dados);
    $this->load->View("beneficiario/listar");
		$this->load->view('botton');
  }

  public function dashboard($value='')
  {
    $dados = array('titulo'=>'Dados dos Beneficiarios');
		$this->load->view('top',$dados);
    $this->load->View("beneficiario/index");
		$this->load->view('botton');
  }

  public function cadastrar($value='')
  {
    $dados = array('titulo'=>'Cadastar Beneficiario');
		$this->load->view('top',$dados);
    $this->load->View("beneficiario/cadastrar");
		$this->load->view('botton');
  }
}

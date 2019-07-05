<?php
defined('BASEPATH') or exit ('No direct access allowed');

class Servico extends CI_Controller
{
  public function index($value='')
  {
    $dados = array('titulo'=>'Servi&ccedil;os');
    $this->load->view('top',$dados);
    $this->load->view('servico/listar');
    $this->load->view('botton');
  }

  public function cadastrar($value='')
  {
    $dados = array('titulo'=>'cadastrar Servi&ccedil;o');
    $this->load->view('top',$dados);
    $this->load->view('servico/cadastrar');
    $this->load->view('botton');
  }
}

<?php
defined('BASEPATH') or exit ('No direct access allowed');

class Projecto extends CI_Controller
{
  public function index($value='')
  {
    $dados = array('titulo'=>'Projectos');
    $this->load->view('top',$dados);
    $this->load->view('projecto/listar');
    $this->load->view('botton');
  }

  public function cadastrar($value='')
  {
    $dados = array('titulo'=>'cadastrar Projecto');
    $this->load->view('top',$dados);
    $this->load->view('projecto/cadastrar');
    $this->load->view('botton');
  }
}

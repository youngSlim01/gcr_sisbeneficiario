<?php
  defined('BASEPATH')or exit ('No direct script access allowed');

  /**
   *
   */
  class Activista extends CI_Controller
  {
    public function index($value='')
    {
      $dados = array('titulo' => "Activistas");
      $this->load->view('top',$dados);
      $this->load->view('activista/listar');
      $this->load->view('botton');
    }

    public function cadastrar($value='')
    {
      $dados = array('titulo' => "Activistas");
      $this->load->view('top',$dados);
      $this->load->view('activista/cadastrar');
      $this->load->view('botton');
    }
  }

 ?>

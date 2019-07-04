<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rare extends CI_Controller {
	
	public function index()
	{
		$dados = array('titulo'=>'Projecto Rare TB/HIV');
		$this->load->view('top',$dados);
		$this->load->view('projecto/rare');
		$this->load->view('botton');
	}
}

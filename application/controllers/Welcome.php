<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index()
	{
		$dados = array('titulo'=>'Dashboard');
		$this->load->view('top',$dados);
		$this->load->view('index');
		$this->load->view('botton');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists('set_msg')):
	//seta uma mensagem via session para ser lida posteriormente
	function set_msg($msg=NULL){
		$ci = & get_instance();
		$ci->session->set_userdata('aviso',$msg);
	}
endif;

if(!function_exists('get_msg')):
	//retorna uma mensagem definida pela funcao set_msg
	function get_msg(){
		$ci = & get_instance();
		$retorno = $ci->session->userdata('aviso');
		$ci->session->unset_userdata('aviso');
		return $retorno;
	}
endif;

if(!function_exists('ano_actual')):
	//retorna uma definicao definida pela funcao ano_actual
	function ano_actual(){
		$ci = & get_instance();
		$datestring = '%Y';
		$retorno = strftime($datestring);
		return $retorno;
	}
endif;

if(!function_exists('data_actual')):
	//retorna uma definicao definida pela funcao ano_actual
	function data_actual(){
		$ci = & get_instance();
		$now = date('Y-m-d H:i:s');
		$retorno = strftime($now);
		return $retorno;
	}
endif;

if(!function_exists('verifica_login')){
	//verifica se o usuario esta logado, caso nao redireciona para login
	function verifica_login(){
		$redireciona=base_url('login');
		$ci = & get_instance();
		if($ci->session->userdata('logged') != TRUE):
			set_msg('<div class="alert alert-warnig"><strong>Atencao</strong> Area restrita!</div>');
			redirect($redireciona,'refresh');
		endif;
	}
}

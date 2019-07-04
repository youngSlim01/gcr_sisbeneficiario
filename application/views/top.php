<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>SisBeneficiario - GCR</title>
	<meta name="description" content="Sistema de registo Beneficiario">
	<meta name="author" content="GCR">
	<meta name="keyword" content="GCR, Girl Child Right, GCR Dashboard, Sistema de Beneficiario, SisBeneficiario">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="<?php echo base_url();?>rg_assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>rg_assets/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="<?php echo base_url();?>rg_assets/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="<?php echo base_url();?>rg_assets/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
</head>

<body>
		<!-- start: Header -->
	<div class="navbar ">
		<div class="navbar-inner green">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#"><span>SisBeneficiario</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav ">
					<ul class="nav pull-right"
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> Gil dos Santos
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Definicoes da conta</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Perfil</a></li>
								<li><a href="#"><i class="halflings-icon off"></i> Terminar sessao</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="#"><i class="icon-dashboard"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
						<li><a href="#"><i class="icon-edit"></i><span class="hidden-tablet"> Beneficiarios</span></a></li>
						<li><a href="#"><i class="icon-list-alt"></i><span class="hidden-tablet"> Graficos</span></a></li>
						<li><a href="#"><i class="icon-tasks"></i><span class="hidden-tablet"> Relatorios</span></a></li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Definicoes</span><span class="label label-important"> 2 </span></a>
							<ul>
								<li><a class="submenu" href=""><i class="icon-file-alt"></i><span class="hidden-tablet"> Projectos</span></a></li>
								<li><a class="submenu" href=""><i class="icon-file-alt"></i><span class="hidden-tablet"> Servicos</span></a></li>
							</ul>	
						</li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#"><?php echo $titulo?></a></li>
			</ul>
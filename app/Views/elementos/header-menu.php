<!DOCTYPE html>
<!--
Template Name: NobleUI - HTML Bootstrap 5 Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_admin
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Pig.In</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/demo1/style.css">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon.png" />
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:../../partials/_sidebar.html -->
		<nav class="sidebar">
      <div class="sidebar-header">
        <a href="<?= base_url() ?>/" class="sidebar-brand">
          <h3>PIG Industrias</h3>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Principal</li>
          <li class="nav-item">
            <a href="<?= base_url() ?>" class="nav-link">
              <i class="link-icon" data-feather="pie-chart"></i>
              <span class="link-title">Estadisticas</span>
            </a>
          </li>
          <!-- Account -->
          <li class="nav-item nav-category">Cuenta</li>
          <li class="nav-item">
            <a href="<?= base_url() ?>/CreateUser/" class="nav-link">
              <i class="link-icon" data-feather="user-plus"></i>
              <span class="link-title">Crear nuevo usuario</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>/ListarUsuarios/" class="nav-link">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Lista de usuarios</span>
            </a>
          </li>
          <!-- Roles -->
          <li class="nav-item"> 
            <a class="nav-link" data-bs-toggle="collapse" href="#roles" role="button" aria-expanded="false" aria-controls="roles">
              <i class="link-icon" data-feather="user-check"></i>
              <span class="link-title">Roles</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="roles">
              <ul class="nav sub-menu">                 
                <li class="nav-item">
                  <a href="<?= base_url() ?>/Rol/" class="nav-link">Crear rol</a>
                </li>      
                <li class="nav-item">
                  <a href="<?= base_url() ?>/ListarRoles/" class="nav-link">Lista de roles</a>
                </li>                         
              </ul>
            </div>
          </li>
          <!-- Cerdos -->
          <li class="nav-item nav-category">Cerdos</li>
          <li class="nav-item">
            <a href="<?= base_url() ?>/Cerdos/" class="nav-link">
              <i class="link-icon" data-feather="plus-circle"></i>
              <span class="link-title">Añadir cerdo</span>
            </a>
          </li>             
          <li class="nav-item">
            <a href="<?= base_url() ?>/ListarCerdos/" class="nav-link">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">Lista de cerdos</span>
            </a>
          </li>
          <!-- Lotes -->
          <li class="nav-item"> 
            <a class="nav-link" data-bs-toggle="collapse" href="#lotes" role="button" aria-expanded="false" aria-controls="lotes">
              <i class="link-icon" data-feather="flag"></i>
              <span class="link-title">Lotes</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="lotes">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="<?= base_url() ?>/Lote/" class="nav-link">Crear lote</a>
                </li> 
                <li class="nav-item">
                  <a href="<?= base_url() ?>/ListarLotes/" class="nav-link">Lista de lotes</a>
                </li>  
              </ul>
            </div>
          </li>             
          <!-- Productos -->
          <li class="nav-item nav-category">Productos</li>
          <li class="nav-item">
            <a href="<?= base_url() ?>/Productos/" class="nav-link">
              <i class="link-icon" data-feather="plus-circle"></i>
              <span class="link-title">Añadir producto</span>
            </a>
          </li>             
          <li class="nav-item">
            <a href="<?= base_url() ?>/ListarProductos/" class="nav-link">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">Lista de productos</span>
            </a>
          </li>           
          <!-- Documentos -->
          <li class="nav-item nav-category">Docs</li>
          <li class="nav-item">
            <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
              <i class="link-icon" data-feather="hash"></i>
              <span class="link-title">Documentation</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
	
		<div class="page-wrapper">
				
			<!-- partial:../../partials/_navbar.html -->
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					<form class="search-form">
						<div class="input-group">
              <div class="input-group-text">
                <i data-feather="search"></i>
              </div>
							<input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
						</div>
					</form>
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="profile">
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
								<div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
									<div class="mb-3">
										<img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
									</div>
									<div class="text-center">
										<p class="tx-16 fw-bolder">UserName</p>
										<p class="tx-12 text-muted">faraonlovesheldi@pigindustries.com</p>
									</div>
								</div>
                <ul class="list-unstyled p-1">
                  <li class="dropdown-item py-2">
                    <a href="../../pages/general/profile.html" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="user"></i>
                      <span>Perfil</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="javascript:;" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="edit"></i>
                      <span>Editar Perfil</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="<?= base_url() ?>/inicio/salir" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="log-out"></i>
                      <span>Salir</span>
                    </a>
                  </li>
                </ul>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- partial -->

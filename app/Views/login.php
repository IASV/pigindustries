<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  
	<title>Pig Industries</title>

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
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col-md-4 pe-md-0">
                  <div class="auth-side-wrapper">
                    <img src="<?= base_url() ?>/assets/images/peppa.jpg" class="imagen" alt="" width= 215 height= 452>
                  </div>
                </div>
                <div class="col-md-8 ps-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2">Noble<span>UI</span></a>
                    <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                      <div class="mb-3">
                        <label for="userEmail" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="usuario">
                      </div>
                      <div class="mb-3">
                        <label for="userPassword" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" autocomplete="current-password">
                      </div>
                      
                      <div>

                        <button class="btn btn-primary me-2 mb-2 mb-md-0 text-white" onclick="entrar()">Iniciar Sesion</button>
                        
                      </div>
                      
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- core:js -->
	<script src="<?= base_url() ?>/assets/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="<?= base_url() ?>/assets/vendors/feather-icons/feather.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
	<!-- End custom js for this page -->

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>

<script>

  const Toast = Swal.mixin({
    toast: true,
    position: 'bottom',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  

  function entrar() {
  

    $.post("<?= base_url() ?>/login/entrar", {'usuario': $("#usuario").val(), 'password': $("#password").val()}, function (data) {
     
      if (data=='error') {
        
        Toast.fire({
          icon: 'error',
          title: 'Error inicio de sesion '
        });

      }


      if (data=='ok') {
        
        window.location.href = '<?= base_url() ?>';
      }

      
      
    });

  }

</script>
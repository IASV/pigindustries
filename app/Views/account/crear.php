<div class="page-content">
  <!-- <div class="col-md-8 ps-md-0">
    <div class="auth-form-wrapper px-4 py-5">
      <a href="#" class="noble-ui-logo logo-light d-block mb-2">Create account</a>
      <h5 class="text-muted fw-normal mb-4">User information.</h5>
      <form class="forms-sample">
        <div class="mb-3">
          <label for="exampleInputUsername1" class="form-label">Username</label>
          <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="Username" placeholder="Username">
        </div>
        <div class="mb-3">
          <label for="userEmail" class="form-label">Email address</label>
          <input type="email" class="form-control" id="userEmail" placeholder="Email">
        </div>
        <div class="mb-3">
          <label for="userPassword" class="form-label">Password</label>
          <input type="password" class="form-control" id="userPassword" autocomplete="current-password" placeholder="Password">
        </div>
        <div>
          <button class="btn btn-primary text-white me-2 mb-2 mb-md-0">Create</button>
        </div>
      </form>
    </div> -->
  <!-- </div> -->

  <div class="col-md-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <a href="#" class="noble-ui-logo logo-light d-block mb-2">Crear Cuenta</a>
        <h5 class="text-muted fw-normal mb-4">User information.</h5>
        <form class="forms-sample">
          <div class="row">
            <div class="col-sm-4">
              <label for="exampleInputUsername1" class="form-label">Usuario</label>
              <input type="text" class="form-control" autocomplete="Username" placeholder="usuario" id="usuario">
            </div>
            <div class="col-sm-4">
              <label for="userPassword" class="form-label">Contraseña</label>
              <input type="password" class="form-control" autocomplete="current-password" placeholder="Contraseña" id="contraseña">
            </div>
            <div class="col-sm-4">
              <label class="form-label">Roll</label>
              <select class="custom-select" id="inputGroupSelect04" style="padding: 0.469rem 0.8rem; width:100%; line-height: 1.5; font-weight: 400; line-height: 1.5; background-color: #fff; background-clip: padding-box; border: 1px solid #e9ecef;">
                <?php foreach ($roles as $rol) : ?>
                  <option value="<?= $rol['id_rol'] ?>"><?= $rol['rol'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <br>
  <hr>
  <br>
  <div class="card">
    <div class="card-body">
      <h6 class="card-title">Información Personal</h6>
      <form>
        <div class="row">
          <div class="col-sm-4">
            <div class="mb-3">
              <label class="form-label">Nombres</label>
              <input type="text" class="form-control" placeholder="Nombres" id="nombre">
            </div>
          </div><!-- Col -->
          <div class="col-sm-4">
            <div class="mb-3">
              <label class="form-label">Apellidos</label>
              <input type="text" class="form-control" placeholder="Apellidos" id="apellidos">
            </div>
          </div><!-- Col -->
          <div class="col-sm-4">
            <div class="mb-3">
              <label class="form-label">Cedula</label>
              <input type="number" class="form-control" placeholder="cedula" id="cedula">
            </div>
          </div><!-- Col -->
        </div><!-- Row -->
        <div class="row">
          <div class="col-sm-4">
            <div class="mb-3">
              <label class="form-label">Fecha de Nacimiento</label>
              <input type="date" class="form-control" placeholder="Fecha nacimeinto" id="fecha-nacimiento">
            </div>
          </div><!-- Col -->
          <div class="col-sm-4">
            <div class="mb-3">
              <label class="form-label">Telefono</label>
              <input type="number" class="form-control" placeholder="Telefono" id="estado">
            </div>
          </div><!-- Col -->
          <div class="col-sm-4">
            <div class="mb-3">
              <label class="form-label">Correo</label>
              <input type="email" class="form-control" placeholder="Correo" id="correo">
            </div>
          </div><!-- Col -->
        </div><!-- Row -->
      </form>
      <button type="button" class="btn btn-primary submit" onclick="crear()">Crear</button>
    </div>
  </div>
</div>


<script>

  function add(){

    $.post("<?= base_url() ?>/crear/add",)
  }
</script>
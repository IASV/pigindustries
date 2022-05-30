<div class="page-content">
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Añadir Animal</h6>
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Raza</label>
                                    <input type="text" class="form-control" placeholder="Raza animal" id="raza">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Peso</label>
                                    <input type="text" class="form-control"  placeholder="Peso animal" id="peso">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Fecha de Nacimiento</label>
                                    <input type="text" class="form-control" placeholder="Fecha nacimeinto animal" id="fecha-nacimiento" >
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Estado</label>
                                    <input type="text" class="form-control" placeholder="Estado animal" id="estado">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Lote</label>
                                    <input type="text" class="form-control" placeholder="Lote animal" id="lote">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                    </form>
                    <button type="button" class="btn btn-primary submit" onclick="crear()">Crear</button>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">animales</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Raza</th>
                                    <th>Peso</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Pietran</td>
                                    <td>12</td>
                                    <td>12/julio/2021</td>
                                    <th>Vivo</th>
                                    <td>
                                        <a class="btn btn-danger text-white me-2 mb-2 mb-md-0" href="">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



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

  

  function crear() {
  

    $.post("<?= base_url() ?>/Cerdos/crear", {'raza': $("#raza").val(), 'peso': $("#peso").val(), 'fecha_nacimiento': $("#fecha_nacimiento").val(),'estado': $("#estado").val(), 'lote': $("#lote").val()}, function (data) {
     
        console.log(data["raza"]);
      if (data=='error') {
        
        Toast.fire({
          icon: 'error',
          title: 'No se pudo realizar el registro '
        });

      }


      if (data=='ok') {
        
        window.location.href = '<?= base_url() ?>';
      }
      
    });

  }

</script>
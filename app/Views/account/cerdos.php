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
                                    <label class="form-label" for="fecha-nacimiento">Fecha de nacimiento</label>
                                    <input type="date" class="form-control"  placeholder="Fecha nacimiento" id="fecha-nacimiento" require>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Peso</label>
                                    <input type="number" class="form-control" placeholder="Peso" id="peso" >
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="estado">Estado</label>
                                    <select class="form-select" name="estado" id="estado">
                                        <option value="vivo">Vivo</option>
                                        <option value="enfermo">Enfermo</option>
                                        <option value="muerto">Muerto</option>
                                        <option value="sacrificio">Sacrificado</option>
                                    </select>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="lote">Lote</label>
                                    <select class="form-select" name="lote" id="lote">
                                        <?php foreach($lotes as $lote): ?>
                                        <option value="<?= $lote['nombre'] ?>"><?= $lote['nombre'] ?></option>                                        
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                    </form>
                    <button type="button" class="btn btn-primary submit" onclick="create()">Crear</button>
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

  

  function create() {
  
    $.post("<?= base_url() ?>/Cerdos/create", {'raza': $("#raza").val(), 'peso': $("#peso").val(), 'fecha_nacimiento': $("#fecha_nacimiento").val(),'estado': $("#estado").val(), 'lote': $("#lote").val()}, function (data) {
     
        console.log(data['raza']);

    });

  }

</script>
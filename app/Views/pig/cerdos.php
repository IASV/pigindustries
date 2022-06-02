<div class="page-content">
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Añadir Animal</h6>
                    <form>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Raza</label>
                                    <input type="text" class="form-control" placeholder="Raza animal" id="raza">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="fecha-nacimiento">Fecha de nacimiento</label>
                                    <input type="date" class="form-control"  placeholder="Fecha nacimiento" id="fecha-nacimiento" require>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="fecha-nacimiento">Comprado</label>
                                    <input type="number" class="form-control"  placeholder="Precio" id="comprado" require>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Peso (kg)</label>
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
                                        <option value="<?= $lote['id'] ?>"><?= $lote['nombre'] ?></option>                                        
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Enfermedad</label>
                                    <input type="text" disabled="disabled" class="form-control" placeholder="Nombre" id="enfermedad">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="fecha-nacimiento">Fecha del sacrificio</label>
                                    <input type="date" disabled="disabled" class="form-control"  placeholder="Fecha sacrificio" id="fecha-sacrificio" require>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="fecha-nacimiento">Causa de muerte</label>
                                    <input type="text" disabled="disabled" class="form-control"  placeholder="Causa" id="causa-muerte" require>
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
                                    <th>Peso (kg)</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Estado</th>
                                    <th>Lote</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($animales as $animal): ?>
                                <tr>
                                    <td><?= $animal['id'] ?></td>
                                    <td><?= $animal['raza'] ?></td>
                                    <td><?= $animal['peso'] ?></td>
                                    <td><?= $animal['fecha_nacimiento'] ?></td>
                                    <th><?= $animal['estado'] ?></th>
                                    <th><?= $animal['lote'] ?></th>
                                    <td>                                        
                                        <a class="btn btn-danger text-white me-2 mb-2 mb-md-0" href="<?= base_url() ?>/Cerdos/delete/<?= $animal['id'] ?>">Eliminar</a>
                                        <a class="btn btn-primary text-white me-2 mb-2 mb-md-0" href="">Editar</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
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

$( function() {
    $("#estado").change( function() {
        if ($(this).val() === "enfermo") {
            $('#enfermedad').prop("disabled", false);
        } /*
        else if ($(this).val() === "muerto") {
            $('#causa-muerte').prop("disabled", true);
        }
        else if ($(this).val() === "sacrificio") {
            $('#fecha-sacrificio').prop("disabled", true);
        } */ 
        else {
            $('#enfermedad').prop("disabled", true);
            //$('#fecha-sacrificio').prop("disabled", false);
            //$('#causa-muerte').prop("disabled", false);
        }
    });
});
  
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
  
    let formData = {
        'raza': $("#raza").val(), 
        'fecha-nacimiento': $("#fecha-nacimiento").val(),
        'peso': $("#peso").val(),         
        'estado': $("#estado").val(), 
        'lote': $("#lote").val()
    }

    $.post("<?= base_url() ?>/Cerdos/create", formData, function (data) {     

        console.log(formData);

        if (data=='error') {        
            Toast.fire({
                icon: 'error',
                title: 'Error '
            });
        }
        if (data=='ok') {                    
            window.location.href = '<?= base_url() ?>/Cerdos';
        }

    });

  }

</script>
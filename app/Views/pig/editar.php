<div class="page-content">
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <a class="btn text-dark" href="javascript: history.go(-1)">
                            <i class="link-icon" data-feather="arrow-left"></i>
                        </a>
                        <h6 class="btn card-title">Actualizar Animal - ID <?= $animal['id'] ?></h6>
                    </div>                    
                    <form>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Raza</label>
                                    <input type="text" class="form-control" placeholder="Raza animal" id="raza" value="<?= $animal['raza'] ?>">
                                    <input type="hidden" class="form-control" placeholder="Raza animal" id="id" value="<?= $animal['id'] ?>">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="fecha-nacimiento">Fecha de nacimiento</label>
                                    <input type="date" class="form-control"  placeholder="Fecha nacimiento" id="fecha-nacimiento" value="<?= $animal['fecha_nacimiento'] ?>" require>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                            <? if($precio['adquirido'] != 0):  ?>
                                <div class="mb-2 form-label">                                
                                    <input class="form-check-input" onchange="comprobar(this);" type="checkbox" value="" id="comprado" checked>
                                    <label class="form-check-label" for="comprado">Comprado</label>                                                                                                                                                                                                         
                                </div>
                                <div class="mb-3">
                                    <input type="number" value="<?= $precio['adquirido'] ?>" class="form-control"  placeholder="Precio" id="precio" require>       
                                </div>
                            <? else: ?> 
                                <div class="mb-2 form-label">                                                                                                                                                                                                      
                                    <input class="form-check-input" onchange="comprobar(this);" type="checkbox" value="" id="comprado">
                                    <label class="form-check-label" for="comprado">Comprado</label>                                    
                                </div>
                                <div class="mb-3">
                                    <input type="number" disabled="disabled" class="form-control"  placeholder="Precio"  value='0' id="precio" require>       
                                </div>
                            <? endif; ?>   
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Peso (kg)</label>
                                    <input type="number" class="form-control" placeholder="Peso" id="peso" value="<?= $animal['peso'] ?>">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="estado">Estado</label>
                                    <select class="form-select" onchange="verifica(this.value)" name="estado" id="estado">
                                        <?php $estados = ['sano','enfermo','muerto','sacrificio']; foreach($estados as $estado): ?>
                                            <? if($estado == $animal['estado']):  ?>
                                            <option value="<?= $estado ?>" selected="true"><?= $estado?></option>
                                            <? else: ?>
                                            <option value="<?= $estado ?>"><?= $estado?></option>
                                            <? endif; ?>                                                                                               
                                        <?php endforeach ?>                                  
                                    </select>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="lote">Lote</label>
                                    <select class="form-select" name="lote" id="lote">
                                        <?php foreach($lotes as $lote): ?>
                                            <? if($lote['nombre'] == $animal['lote']):  ?>
                                                <option value="<?= $lote['id'] ?>" selected="true"><?= $lote['nombre'] ?></option>  
                                            <? else: ?>
                                                <option value="<?= $lote['id'] ?>"><?= $lote['nombre'] ?></option>
                                            <? endif; ?>                                                                                               
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Enfermedad</label>
                                    <? if($enfermedad['nombre'] != ''): ?>
                                        <input type="text" class="form-control" placeholder="Nombre" id="enfermedad" value="<?= $enfermedad['nombre'] ?>">
                                    <? else: ?>
                                        <input type="text" disabled="disabled" class="form-control" placeholder="Nombre" id="enfermedad">
                                    <? endif; ?>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="fecha-nacimiento">Fecha del sacrificio</label>
                                    <? if($sacrificio['fecha'] != ''): ?>
                                        <input type="date" class="form-control"  placeholder="Fecha sacrificio" id="fecha-sacrificio" value="<?= $sacrificio['fecha'] ?>" require>
                                    <? else: ?>
                                        <input type="date" disabled="disabled" class="form-control"  placeholder="Fecha sacrificio" id="fecha-sacrificio" require>
                                    <? endif; ?>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="fecha-nacimiento">Causa de muerte</label>
                                    <? if($muerte['causa'] != ''): ?>
                                        <input type="text" class="form-control"  placeholder="Causa" id="causa-muerte" value="<?= $muerte['causa'] ?>" require>
                                    <? else: ?>
                                        <input type="text" disabled="disabled" class="form-control"  placeholder="Causa" id="causa-muerte" require>
                                    <? endif; ?>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                    </form>
                    <button type="button" class="btn btn-primary submit" onclick="update()">Actualizar</button>
                    <a class="btn text-info me-2 mb-2 mb-md-0 " href="<?= base_url() ?>/Cerdos/view/<?= $animal['id'] ?>">
                        <i class="link-icon" data-feather="eye"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>

<script>

function comprobar(obj){
    const precio = document.getElementById("precio");

    if(obj.checked == true) {
        precio.disabled = false;        
    } else {
        precio.disabled = true;
        precio.value = 0;
    }
};

function verifica(value){
    const inputEnfermedad = document.getElementById("enfermedad");
    const inputMuerto          = document.getElementById("causa-muerte");
    const inputSacrificio       = document.getElementById("fecha-sacrificio");

    if(value == 'enfermo'){
        inputEnfermedad.disabled = false;
        inputMuerto.disabled = true;        
        inputSacrificio.disabled =true;        
        inputMuerto.value = '';
        inputSacrificio.value = '';
    } else if(value == 'muerto'){
        inputEnfermedad.disabled = true;
        inputMuerto.disabled = false;
        inputSacrificio.disabled =true;
        inputEnfermedad.value = '';
        inputSacrificio.value = '';
    } else if(value == 'sacrificio'){
        inputEnfermedad.disabled = true;
        inputMuerto.disabled = true;
        inputSacrificio.disabled = false;
        inputEnfermedad.value = '';
        inputMuerto.value = '';
    } else if(value == 'sano'){
        inputEnfermedad.disabled = true;
        inputMuerto.disabled = true;
        inputSacrificio.disabled = true;
        inputEnfermedad.value = '';
        inputMuerto.value = '';
        inputSacrificio.value = '';
    }
};
  
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

  

  function update() {
    const estado = document.getElementById("estado");
    const check = document.getElementById("comprado")

    let formData = {
        'id': $("#id").val(),
        'raza': $("#raza").val(), 
        'fecha-nacimiento': $("#fecha-nacimiento").val(),
        'peso': $("#peso").val(),         
        'estado': $("#estado").val(), 
        'lote': $("#lote").val(),
        'enfermedad': '',
        'fecha-sacrificio': '',
        'causa-muerte': '',
        'precio': '0'
    }

    if(estado.value == 'enfermo') formData['enfermedad'] = $("#enfermedad").val();
    else if(estado.value == 'muerto') formData['causa-muerte'] = $("#causa-muerte").val();
    else if(estado.value == 'sacrificio') formData['fecha-sacrificio'] = $("#fecha-sacrificio").val();

    if(check.checked == true) formData['precio'] = $("#precio").val();

    console.log(formData);

    $.post("<?= base_url() ?>/Cerdos/update", formData, function (data) {     

        if (data=='error') {        
            Toast.fire({
                icon: 'error',
                title: 'Error '
            });
        }
        if (data=='ok') {                    
            Toast.fire({
                icon: 'success',
                title: 'Good job!'
            });
            window.location.href = '<?= base_url() ?>/Cerdos/edit/<?= $animal['id'] ?>';            
        }

    });

  }

</script>
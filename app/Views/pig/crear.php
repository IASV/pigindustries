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
                                <div class="mb-2 form-label">
                                    <input class="form-check-input" onchange="comprobar(this);" type="checkbox" value="" id="comprado">
                                    <label class="form-check-label" for="comprado">Comprado</label>                                                                                                                                           
                                </div>
                                <div class="mb-3">
                                    <input type="number" disabled="disabled" class="form-control"  placeholder="Precio" id="precio" require>       
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
                                    <select class="form-select" onchange="verifica(this.value)" name="estado" id="estado">
                                        <option value="sano">Sano</option>
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
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>

<script>

function comprobar(obj){
    const precio = document.getElementById("precio");

    if(obj.checked == true) {
        precio.disabled = false;
    } else {
        precio.disabled = true;
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
    } else if(value == 'muerto'){
        inputEnfermedad.disabled = true;
        inputMuerto.disabled = false;
        inputSacrificio.disabled =true;
    } else if(value == 'sacrificio'){
        inputEnfermedad.disabled = true;
        inputMuerto.disabled = true;
        inputSacrificio.disabled = false;
    } else if(value == 'sano'){
        inputEnfermedad.disabled = true;
        inputMuerto.disabled = true;
        inputSacrificio.disabled = true;
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

  

  function create() {
    const estado = document.getElementById("estado");
    const check = document.getElementById("comprado")

    let formData = {
        'raza': $("#raza").val(), 
        'fecha-nacimiento': $("#fecha-nacimiento").val(),
        'peso': $("#peso").val(),         
        'estado': $("#estado").val(), 
        'lote': $("#lote").val(),
        'enfermedad': '',
        'fecha-sacrificio': '',
        'causa-muerte': '',
        'precio': 0
    }

    if(estado.value == 'enfermo') formData['enfermedad'] = $("#enfermedad").val();
    else if(estado.value == 'muerto') formData['causa-muerte'] = $("#causa-muerte").val();
    else if(estado.value == 'sacrificio') formData['fecha-sacrificio'] = $("#fecha-sacrificio").val();

    if(check.checked == true) formData['precio'] = $("#precio").val();

    console.log(formData);

    $.post("<?= base_url() ?>/Cerdos/create", formData, function (data) {     
        if (data=='error') {                
            Toast.fire({
                icon: 'error',
                title: 'Error'
            });
        }
        if (data=='ok') {                
            Swal.fire(
                'Created!',
                'Your register has been created.',
                'success'
            )                                
        }
    });
  }

</script>
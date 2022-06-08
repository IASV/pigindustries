<div class="page-content container-fluid d-flex vh-90">
    <div class="row w-80">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <a class="btn text-dark" href="javascript: history.go(-1)">
                                <i class="link-icon" data-feather="arrow-left"></i>
                            </a>
                            <h6 class="btn card-title">Información del animal</h6>
                        </div> 
                        <br>
                        <form>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary"><b>ID</b></label>
                                        <br>
                                        <label class="form-label"><?= $animal['id'] ?></label>
                                    </div>                            
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary"><b>Raza</b></label>
                                        <br>
                                        <label class="form-label"><?= $animal['raza'] ?></label>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary" for="fecha-nacimiento"><b>Fecha de nacimiento</b></label>
                                        <br>
                                        <label class="form-label" for="fecha-nacimiento"><?= $animal['fecha_nacimiento'] ?></label>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary"><b>Peso (kg)</b></label>
                                        <br>
                                        <label class="form-label"><?= $animal['peso'] ?></label>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary" for="estado"><b>Estado</b></label>
                                        <br>
                                        <label class="form-label" for="estado"><?= $animal['estado'] ?></label>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary" for="lote"><b>Lote</b></label>
                                        <br>
                                        <label class="form-label" for="lote"><?= $animal['lote'] ?></label>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->                        
                        </form>
                    </div>                
                </div> 
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">                     
                        <h6 class="card-title">Información de salud</h6>
                        <br>
                        <form>                        
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary"><b>Enfermedad</b></label>
                                        <br>
                                        <label class="form-label"><?= $enfermedad['nombre'] ?></label>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary" for="fecha-nacimiento"><b>Fecha del sacrificio</b></label>
                                        <br>
                                        <label class="form-label" for="fecha-nacimiento"><?= $sacrificio['fecha'] ?></label>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary" for="fecha-nacimiento"><b>Causa de muerte</b></label>
                                        <br>
                                        <label class="form-label" for="fecha-nacimiento"><?= $muerte['causa'] ?></label>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                        </form>
                    </div>
                </div>
            </div>
        </div>        

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Información de adquisición</h6>
                        <br>
                        <form>                        
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary"><b>Forma de adquisición</b></label>
                                        <br>
                                        <label class="form-label"><?= $forma['forma'] ?></label>
                                        <br>
                                        <label class="form-label"><?= $precio['adquirido'] ?></label>                                        
                                    </div>
                                </div><!-- Col -->                                
                            </div><!-- Row -->
                        </form>
                    </div>
                </div>
            </div>
        </div> 

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary me-2 mb-2 mb-md-0" href="<?= base_url() ?>/Cerdos/edit/<?= $animal['id'] ?>">Editar</a>
            </div>        
        </div>

    </div>

    <div class="row w-50">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Historial de peso</h6>        
                    <br>            
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PESO</th>
                                    <th>FECHA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($historialPeso as $key => $peso): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $peso['peso'] ?></td>
                                    <td><?= $peso['fecha'] ?></td>
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
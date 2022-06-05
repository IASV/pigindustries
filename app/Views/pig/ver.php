<div class="page-content container-fluid d-flex vh-90">
    <div class="row w-80">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Información del animal</h6>
                        <br>
                        <form>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary"><b>ID</b></label>
                                        <br>
                                        <label class="form-label">id</label>
                                    </div>                            
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary"><b>Raza</b></label>
                                        <br>
                                        <label class="form-label">raza</label>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary" for="fecha-nacimiento"><b>Fecha de nacimiento</b></label>
                                        <br>
                                        <label class="form-label" for="fecha-nacimiento">fecha de nacimiento</label>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary"><b>Peso (kg)</b></label>
                                        <br>
                                        <label class="form-label">peso (kg)</label>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary" for="estado"><b>Estado</b></label>
                                        <br>
                                        <label class="form-label" for="estado">estado</label>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary" for="lote"><b>Lote</b></label>
                                        <br>
                                        <label class="form-label" for="lote">lote</label>
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
                        <h6 class="card-title">Estado del animal</h6>
                        <br>
                        <form>                        
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary"><b>Enfermedad</b></label>
                                        <br>
                                        <label class="form-label">enfermedad</label>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary" for="fecha-nacimiento"><b>Fecha del sacrificio</b></label>
                                        <br>
                                        <label class="form-label" for="fecha-nacimiento">fecha del sacrificio</label>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary" for="fecha-nacimiento"><b>Causa de muerte</b></label>
                                        <br>
                                        <label class="form-label" for="fecha-nacimiento">fausa de muerte</label>
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
                                        <label class="form-label">forma</label>
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
                <button class="btn btn-primary text-white me-2 mb-2 mb-md-0" onclick="edit()">Editar</button>    
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
                                <tr>
                                    <td>43</td>
                                    <td>Peso 1</td>
                                    <td>10-20-2019</td>
                                </tr>
                                <tr>
                                    <td>43</td>
                                    <td>Peso 1</td>
                                    <td>10-20-2019</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    
    </div>        

</div>
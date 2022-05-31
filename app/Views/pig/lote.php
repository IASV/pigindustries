<div class="page-content">
    <div class="col-md-8 ps-md-0">
        <div class="auth-form-wrapper px-4 py-5">
            <a href="#" class="noble-ui-logo logo-light d-block mb-2">Create lote</a>
            <h5 class="text-muted fw-normal mb-4">Information.</h5>
            <form class="forms-sample">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Enter the name of the lote</label>
                    <input type="text" class="form-control" id="nombre" autocomplete="nombre" placeholder="name">
                </div> 
                <div>          
                    <button class="btn btn-primary text-white me-2 mb-2 mb-md-0" onclick="add()">Create</button>        
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Lotes</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>LOTE</th>
                                    <th>OPTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($lotes as $key => $l): ?>
                                <tr>
                                    <td><?= ($key + 1)?></td>
                                    <td><?= $l['nombre'] ?></td>
                                    <td>
                                        <a class="btn btn-danger text-white me-2 mb-2 mb-md-0" href="<?= base_url() ?>/Lote/delete/<?= $l['id'] ?>">Delete</a>
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

  

    function add() {
        $.post("<?= base_url() ?>/Lote/add", {'nombre': $("#nombre").val()}, function (data) {        
            if (data=='error') {        
                Toast.fire({
                    icon: 'error',
                    title: 'Error '
                });
            }
            if (data=='ok') {        
                window.location.href = '<?= base_url() ?>/Lote';
            }
        });    
    }

</script>
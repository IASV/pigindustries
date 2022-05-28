<div class="page-content">
  <div class="col-md-8 ps-md-0">
    <div class="auth-form-wrapper px-4 py-5">
      <a href="#" class="noble-ui-logo logo-light d-block mb-2">Create rol</a>
      <h5 class="text-muted fw-normal mb-4">Information.</h5>
      <form class="forms-sample">
        <div class="mb-3">
          <label for="exampleInputUsername1" class="form-label">Enter the name of the role</label>
          <input type="text" class="form-control" id="rol" autocomplete="Rol" placeholder="rol">
        </div> 
        <div>          
          <button class="btn btn-primary text-white me-2 mb-2 mb-md-0" onclick="add()">Create</button>        
        </div>
      </form>
    </div>
  </div>
</div>

<div>
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Tables</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Data Table</h6>
                <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                                <td>2011/07/25</td>
                                <td>$170,750</td>
                            </tr>
                            <tr>
                                <td>Ashton Cox</td>
                                <td>Junior Technical Author</td>
                                <td>San Francisco</td>
                                <td>66</td>
                                <td>2009/01/12</td>
                                <td>$86,000</td>
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

  

  function add() {
  

    $.post("<?= base_url() ?>/Rol/add", {'rol': $("#rol").val()}, function (data) {

        console.log(data);
        if (data=='error') {
        
        Toast.fire({
          icon: 'error',
          title: 'Error '
        });

      }


      if (data=='ok') {
        
        window.location.href = '<?= base_url() ?>';
      }

      
      
    });
    }

</script>
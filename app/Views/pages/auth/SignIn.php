<?= $this->extend('layout/AuthLayout') ?>

<?= $this->section('content') ?>  

        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="#" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>BPS Monitoring</h3>
                            </a>
                            <h3>Sign In</h3>
                        </div>
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <i class="fa fa-exclamation-circle me-2"></i><?php echo session()->getFlashdata('error'); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                        <form id="LoginForm">
                            <div class="form-floating mb-3">
                                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="bapaklogeming">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?= $this->endSection() ?>

<?= $this->section('javascript') ?>  

<script>

$(document).ready(function() {
    $('#LoginForm').submit(function(event) {
        event.preventDefault();
  
        const usernameInput = $('input[name="username"]');
        const passwordInput = $('input[name="password');

        const username = usernameInput.val();
        const password = passwordInput.val();
    
        if (!username) {
          showAlert('error', 'Input Invalid', 'Username tidak boleh kosong');
          return;
        }
  
        if (!password) {
          showAlert('error', 'Input Invalid', 'Password tidak boleh kosong.');
          return;
        }
  
        $.ajax({
            url: `${base_url}`,
            type: 'POST',
            data: { username, password },
            dataType: 'JSON',
            success: function(response) {
                console.log(response)
                if (response.status) {
                    swal.fire({
                        icon: response.icon,
                        title: response.title,
                        text: response.text,
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 3000
                    }).then (function(response) {
                        window.location.href = `${base_url}dashboard`;
                    });
                } else {
                    showAlert(response.icon, response.title, response.text);
                }
            },
            error: function(response) {
                showAlert(response.icon, response.title, response.text);
            }
        });
    });
  });
  
  function showAlert(icon, title, text) {
    Swal.fire({ icon, title, text });
  }

</script>

<?= $this->endSection() ?>
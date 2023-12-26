<?= $this->extend('layout/AuthLayout') ?>

<?= $this->section('content') ?>  

    <div class="bg-white rounded-lg justify-center w-[600px] p-10">
        <div class="mb-6 mt-[-100px] p-8 bg-bps-green-fade rounded-lg flex flex-col items-center justify-center">
            <img src="<?= base_url('assets/img/logo.png') ?>" class="mb-4">
            <h3 class="text-white text-2xl font-bold">BPS MONITORING</h3>
        </div>

        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i><?php echo session()->getFlashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form id="LoginForm">
            <div class="mb-4 relative">
                <input type="text" name="username" id="username" class="form-input mt-1 block w-full p-3 rounded-md bg-gray-100 border border-gray-300" placeholder="Username">
            </div>

            <div class="mb-4 relative">
                <input type="password" name="password" id="password" class="form-input mt-1 block w-full p-3 rounded-md bg-gray-100 border border-gray-300" placeholder="Password">
                <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePasswordVisibility()">
                    <i id="password-toggle" class="fa fa-eye"></i>
                </span>
            </div>

            <button type="submit" class="btn btn-primary py-3 w-full mb-4 bg-bps-green rounded-md text-white">SIGN IN</button>
        </form>
    </div>

<?= $this->endSection() ?>

<?= $this->section('javascript') ?>  

<script>
    $(document).ready(function() {
        $('#LoginForm').submit(function(event) {
            event.preventDefault();
    
            const usernameInput = $('input[name="username"]');
            const passwordInput = $('input[name="password"]');

            const username = usernameInput.val();
            const password = passwordInput.val();
        
            if (!username) {
                showAlert('error', 'Input Invalid', 'Username cannot be empty.');
                return;
            }
    
            if (!password) {
                showAlert('error', 'Input Invalid', 'Password cannot be empty.');
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

    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var passwordToggle = document.getElementById("password-toggle");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordToggle.classList.remove("fa-eye");
            passwordToggle.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            passwordToggle.classList.remove("fa-eye-slash");
            passwordToggle.classList.add("fa-eye");
        }
    }

</script>

<?= $this->endSection() ?>

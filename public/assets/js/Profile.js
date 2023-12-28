function save() {
    const id = $('#id').val();
    const password = $('#new_password').val();
    const passwordConfirm = $('#confirm_new_password').val();

    if (password !== passwordConfirm) {
        showAlert('error', 'Error', 'Password and Konfirmasi Password do not match.');
        return;
    }

    const url = `${base_url}dashboard/profile/ganti/password/${id}`;
    $.ajax({
      url,
      type: 'POST',
      data: $('#changePassword').serialize(),
      dataType: 'JSON',
      success: (respond) => {
        if (respond.status) {
            showAlert(respond.icon, respond.title, respond.text)
        } else {
            showAlert(respond.icon, respond.title, respond.text);
        }
      },
      error: (error) => {
        showAlert('error', error, 'Telah terjadi error, silahkan hubungi admin.');
      },
    });
}

function showAlert(icon, title, text, callback) {
    Swal.fire({
        icon: icon, 
        title: title, 
        text: text,
        timer: 3000,
        showCancelButton: false,
        showConfirmButton: false
    }).then(() => location.reload());
}

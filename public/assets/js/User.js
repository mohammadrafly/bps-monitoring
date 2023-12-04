function updateData(id) {
    save_method = 'update';
    $('#form')[0].reset(); 
    $.ajax({
        url : `${base_url}dashboard/users/edit/${id}`,
        type: 'GET',
        dataType: 'JSON',
        success: function(respond)
        {   
            console.log(respond)
            $('[name="id"]').val(respond.data.id);
            $('[name="name"]').val(respond.data.name);
            $('[name="username"]').val(respond.data.username);
            $('[name="role"]').val(respond.data.role);
            $('#modal').modal('show');
            $('.modal-title').text('Edit User'); 

            $('#password-input').hide();
            $('#email-input').hide();
        },
        error: function (textStatus)
        {
            alert(textStatus);
        }
    });
}

function save() {
    const id = $('#id').val();
    const url = id ? `${base_url}dashboard/users/edit/${id}` : `${base_url}dashboard/users`;
    
    $.ajax({
      url,
      type: 'POST',
      data: $('#form').serialize(),
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

function deleteData(id) {
    
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `${base_url}dashboard/users/delete/${id}`,
                type: 'GET',
                dataType: 'JSON',
                success: function (respond) {
                    showAlert(respond.icon, respond.title, respond.text);
                },
                error: function (textStatus) {
                    showAlert('error', textStatus, 'Telah terjadi error');
                }
            });
        } else if (result.isDenied) {
          Swal.fire('Changes are not saved', '', 'info')
        }
      })
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

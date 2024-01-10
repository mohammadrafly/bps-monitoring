$('#default-modal .close-button').on('click', function() {
    hideModal();
});

function hideModal() {
    $('#default-modal').addClass('hidden');
    $('#form')[0].reset();
    location.reload();
}

function showModal() {
    $('#default-modal').removeClass('hidden');
}

function updateData(id) {
    save_method = 'update';
    $('#form')[0].reset(); 
    $.ajax({
        url : `${base_url}dashboard/tanaman/edit/${id}`,
        type: 'GET',
        dataType: 'JSON',
        success: function(respond)
        {   
            console.log(respond)
            $('[name="id"]').val(respond.data.id);
            $('[name="nama_tanaman"]').val(respond.data.nama_tanaman);
            $('#default-modal').removeClass('hidden');
            $('.modal-title').text('Edit Tanaman');
            $('.button-title').text('Update tanaman');
            showModal(); 
        },
        error: function (textStatus)
        {
            alert(textStatus);
        }
    });
}

function save() {
    const id = $('#id').val();
    const url = id ? `${base_url}dashboard/tanaman/edit/${id}` : `${base_url}dashboard/tanaman`;
    
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
                url: `${base_url}dashboard/tanaman/delete/${id}`,
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

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
    $.ajax({
        url : `${base_url}dashboard/progres/edit/${id}`,
        type: 'GET',
        dataType: 'JSON',
        success: function(respond) {   
            console.log(respond)
            $('[name="id"]').val(respond.data.id);
            $('[name="nama_ks"]').val(respond.data.nama_ks);
            $('[name="id_operator"]').val(respond.data.id_operator);
            $('[name="target"]').val(respond.data.target);
            $('[name="realisasi"]').val(respond.data.realisasi);
            $('[name="total_absolut"]').val(respond.data.total_absolut);
            $('#default-modal').removeClass('hidden');
            $('.modal-title').text('Edit Progres');
            $('.button-title').text('Update progres');
            showModal(); 
        },
        error: function (textStatus) {
            alert(textStatus);
        }
    });
}

function save() {
    const id = $('#id').val();
    const url = id ? `${base_url}dashboard/progres/edit/${id}` : `${base_url}dashboard/progres`;
    
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
                url: `${base_url}dashboard/progres/delete/${id}`,
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

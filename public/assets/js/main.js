const base_url = "http://localhost:8080/";

function openCustomModal(modalId) {
    $('#' + modalId).modal('show');
}

$('#modal').on('hidden.bs.modal', function () {
    location.reload();
});

new DataTable('#bps-datatable');

document.addEventListener('DOMContentLoaded', function () {
    var relativeElement = document.querySelector('.relative');

    if (relativeElement) {
        var dropdown = relativeElement.querySelector('.hidden');

        if (dropdown) {
            relativeElement.addEventListener('click', function () {
                var isHidden = dropdown.classList.contains('hidden');
                dropdown.classList.toggle('hidden', !isHidden);
            });
        } else {
            console.error("Dropdown element with class 'hidden' not found.");
        }
    } else {
        console.error("Element with class 'relative' not found.");
    }
});
function signOut() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to sign out?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, I Want to Sign Out!'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url:`${base_url}logout`,
                type: 'GET',
                dataType: 'JSON',
                success: function (respond) {
                    swal.fire({
                        icon: respond.icon,
                        title: respond.title,
                        text: respond.text,
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 3000
                    }).then (function() {
                        window.location.href = `${base_url}`;
                    });
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal.hideLoading();
                    swal.fire("!Opps ", "Something went wrong, try again later", "error");
                }
            });
        };
    });
}
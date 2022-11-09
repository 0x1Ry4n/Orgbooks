// Sweet alerts without export module 

function confirmDialog(confirmed) {
    $(document).ready(function() {
        Swal.fire({
            title: 'Você tem certeza?',
            text: "Não será possível reverter essa ação!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim'
        }).then((result) => {
            if (result.isConfirmed) {
                swal(
                    'O Registro foi ' + confirmed + ' com sucesso!',
                    'success'
                );
            }
        });
    })
}

function errorDialog(message, location) {
    $(document).ready(function() {
        Swal.fire({
            title: 'Erro!',
            text: message,
            icon: 'error',
            timer: 3500
        }).then(() => {
            document.location = location;
        }).catch(swal.noop);
    });
}

function successDialog(message, location) { 
    $(document).ready(function() {
        Swal.fire({
            title: 'Sucesso!',
            text: message,
            icon: 'success',
            timer: 1500
        }).then((result) => {
            if (result) {
                document.location = location;
            }
        }).catch(swal.noop);
    });
}

// toastr alerts without export module

function toastrError(message) {
    toastr.error(message);
}

function toastrSuccess(message) {
    toastr.success(message);
}


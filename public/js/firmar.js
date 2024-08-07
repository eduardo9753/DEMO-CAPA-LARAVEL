$(function () {
    console.log('FIRMA CARGADA DESDE AJAX');

    var canvas = document.getElementById('signature-pad');
    var signaturePad = new SignaturePad(canvas); // Amarillo

    // Ajusta el tamaño del canvas
    canvas.width = canvas.offsetWidth;
    canvas.height = canvas.offsetHeight;

    $('#limpiarFirma').on('click', function() {
        limpiarFirma();
    });

    $('#frmAjaxFirma').on('submit', function (e) {
        e.preventDefault(); // Para evitar el recargado de la página
        guardarFirma();
    });

    function guardarFirma() {
        // Verifica si el canvas está vacío
        if (signaturePad.isEmpty()) {
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: 'Por favor, firme el documento antes de enviar.',
                showConfirmButton: true
            });
            return; // No envía el formulario si el canvas está vacío
        }

        // Convertir la firma a una cadena en Base64
        var signatureData = signaturePad.toDataURL('image/png');

        // Insertar la firma en el campo oculto
        $('#signature').val(signatureData);

        // Enviar el formulario
        var form = this;
        $.ajax({
            url: $(form).attr('action'), // Lee la ruta del formulario
            method: $(form).attr('method'), // Método de envío GET|POST
            data: new FormData(form), // Datos del formulario
            processData: false,
            contentType: false,
            dataType: 'json',

            beforeSend: function () {
                // Puedes agregar un spinner o algo similar aquí
            },

            success: function (data) {
                if (data.code == 0) {
                    $.each(data.error, function (prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    signaturePad.clear(); // Limpia la firma
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: data.msg,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.reload(); // Recargar la página después de mostrar la alerta
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Hubo un error al guardar la firma.',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    }

    function limpiarFirma()
    {
        signaturePad.clear();
    }
});

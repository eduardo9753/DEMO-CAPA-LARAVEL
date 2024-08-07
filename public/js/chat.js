document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('chat-form').addEventListener('submit', function (event) {
        event.preventDefault();

        let message = document.getElementById('message').value;
        let chatLog = document.getElementById('chat-log');

        // Mostrar el mensaje del usuario en el chat
        let userMessageDiv = document.createElement('div');
        userMessageDiv.className = 'message user-message';
        userMessageDiv.innerText = message;
        chatLog.appendChild(userMessageDiv);

        $.ajax({
            url: $(this).attr('action'),    // Lee la ruta del formulario
            method: $(this).attr('method'), // Método de envío GET|POST
            data: $(this).serialize(),      // Datos del formulario en formato URL-encoded
            dataType: 'json',               // Espera una respuesta en formato JSON
            success: function (data) {
                console.log('Datos recibidos:', data);

                if (data.messages && data.messages.length > 0) {
                    data.messages.forEach(function (msg) {
                        let botMessageDiv = document.createElement('div');
                        botMessageDiv.className = 'message bot-message';

                        if (msg.type === 'text') {
                            // Añadir texto con HTML interpretado
                            botMessageDiv.innerHTML = msg.content;
                        } else if (msg.type === 'image') {
                            let img = document.createElement('img');
                            img.src = msg.content;
                            img.alt = 'Imagen de respuesta';
                            img.style.maxWidth = '100%'; // Asegurar que la imagen no se salga del contenedor
                            botMessageDiv.appendChild(img);
                        }

                        chatLog.appendChild(botMessageDiv);
                    });
                } else {
                    let botMessageDiv = document.createElement('div');
                    botMessageDiv.className = 'message bot-message';
                    botMessageDiv.innerText = 'No se recibió respuesta del bot.';
                    chatLog.appendChild(botMessageDiv);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error en la solicitud:', xhr.responseText);
            }
        });

        document.getElementById('message').value = '';
    });
});

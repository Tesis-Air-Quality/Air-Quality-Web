
function actualizarContadorBot() {
            fetch('./contador.php')
                .then(response => response.json())
                .then(data => {
                    const contadorSpan = document.getElementById('botellas');
                    console.log(contadorSpan.textContent = data.botellas);

                })
                .catch(error => {
                    console.error('Error al obtener el valor del contador: ' );
                });
        }

        actualizarContadorBot();
        setInterval(actualizarContadorBot, 3000);


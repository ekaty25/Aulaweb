document.getElementById('agendamentoForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    var formData = new FormData(this);

    fetch('processar_agendamento.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('mensagem').innerHTML = data;
    })
    .catch(error => {
        document.getElementById('mensagem').innerHTML = "Erro ao agendar passeio: " + error.message;
    });
});

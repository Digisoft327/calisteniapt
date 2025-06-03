// Ativar Tooltips
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
})

// Validação de Formulários
document.querySelectorAll('.needs-validation').forEach(form => {
    form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }
        form.classList.add('was-validated')
    }, false)
})

// Carregamento Dinâmico de Eventos
document.getElementById('calendar').addEventListener('click', async () => {
    const response = await fetch('/api/events')
    const events = await response.json()
    // Implementar lógica do calendário
})
document.addEventListener('DOMContentLoaded', () => {

    // ===== Autofoco no primeiro input =====
    const firstInput = document.querySelector('form input');
    if(firstInput) firstInput.focus();

    // ===== Função para mostrar toast =====
    function mostrarToast(msg, tipo = 'success') {
        const toastDiv = document.createElement('div');
        toastDiv.className = `toast align-items-center text-bg-${tipo} border-0`;
        toastDiv.setAttribute('role','alert');
        toastDiv.setAttribute('aria-live','assertive');
        toastDiv.setAttribute('aria-atomic','true');
        toastDiv.innerHTML = `<div class="d-flex">
                                <div class="toast-body">${msg}</div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                              </div>`;
        document.body.appendChild(toastDiv);
        const toast = new bootstrap.Toast(toastDiv, {delay:3000});
        toast.show();
        toastDiv.addEventListener('hidden.bs.toast', () => toastDiv.remove());
    }

    // ===== Validação e envio do formulário =====
    const form = document.getElementById('form-categoria');
    form.addEventListener('submit', (e) => {
        const titulo = document.getElementById('titulo');
        if(!titulo.value.trim()){
            e.preventDefault();
            mostrarToast('Preencha o campo categoria!', 'danger');
            titulo.focus();
        } else {
            e.preventDefault(); // evita reload para exemplo
            mostrarToast('Categoria cadastrada com sucesso!', 'success');
            form.reset();
            titulo.focus();
            // Aqui você poderia enviar via AJAX para atualizar tabela sem reload
        }
    });

    // ===== Animação dos cards =====
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        setTimeout(() => {
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            card.style.opacity = 1;
            card.style.transform = 'translateY(0)';
        }, 100);
    });

    // ===== Busca em tempo real na tabela =====
    const busca = document.getElementById('busca');
    const tabela = document.getElementById('tabela-categorias');
    busca.addEventListener('input', () => {
        const filtro = busca.value.toLowerCase();
        Array.from(tabela.tBodies[0].rows).forEach(row => {
            const texto = row.cells[0].textContent.toLowerCase();
            row.style.display = texto.includes(filtro) ? '' : 'none';
        });
    });

    // ===== Confirmação ao excluir =====
    tabela.addEventListener('click', (e) => {
        if(e.target.classList.contains('excluir')){
            if(!confirm('Tem certeza que deseja excluir esta categoria?')){
                e.preventDefault();
            } else {
                mostrarToast('Categoria excluída!', 'warning');
                e.target.closest('tr').remove();
            }
        }
    });

});


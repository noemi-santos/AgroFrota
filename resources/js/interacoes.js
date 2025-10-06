document.addEventListener('DOMContentLoaded', () => {

    // ===== Validação de formulários =====
    const forms = document.querySelectorAll('form');

    forms.forEach(form => {
        form.addEventListener('submit', (e) => {
            const inputs = form.querySelectorAll('input[required], select[required]');
            let valido = true;

            inputs.forEach(input => {
                if(!input.value.trim()) {
                    alert(`Por favor, preencha o campo "${input.name}"`);
                    input.focus();
                    valido = false;
                    e.preventDefault();
                    return false;
                }
            });

            if(valido){
                // Feedback visual de envio
                const card = form.closest('.card');
                if(card){
                    card.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
                    card.style.transform = 'scale(1.02)';
                    setTimeout(() => {
                        card.style.transform = 'scale(1)';
                    }, 300);
                }
            }
        });
    });

    // ===== Exemplo de animação de aparição de cards =====
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.style.opacity = 0;
        card.style.transform = 'translateY(20px)';
        setTimeout(() => {
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            card.style.opacity = 1;
            card.style.transform = 'translateY(0)';
        }, 100);
    });

});

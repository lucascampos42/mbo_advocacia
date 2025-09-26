/**
 * Tradução das mensagens de validação HTML5 para português
 */
document.addEventListener('DOMContentLoaded', function() {
    // Mensagens de validação em português
    const validationMessages = {
        valueMissing: 'Por favor, preencha este campo.',
        typeMismatch: {
            email: 'Por favor, insira um endereço de e-mail válido.',
            url: 'Por favor, insira uma URL válida.',
            tel: 'Por favor, insira um número de telefone válido.'
        },
        patternMismatch: 'Por favor, use o formato solicitado.',
        tooLong: 'Por favor, reduza este texto para {maxlength} caracteres ou menos.',
        tooShort: 'Por favor, use pelo menos {minlength} caracteres.',
        rangeUnderflow: 'O valor deve ser maior ou igual a {min}.',
        rangeOverflow: 'O valor deve ser menor ou igual a {max}.',
        stepMismatch: 'Por favor, selecione um valor válido.',
        badInput: 'Por favor, insira um valor válido.'
    };

    // Função para definir mensagem personalizada
    function setCustomValidity(input) {
        const validity = input.validity;
        
        if (validity.valueMissing) {
            input.setCustomValidity(validationMessages.valueMissing);
        } else if (validity.typeMismatch) {
            const type = input.type;
            const message = validationMessages.typeMismatch[type] || 'Por favor, insira um valor válido.';
            input.setCustomValidity(message);
        } else if (validity.patternMismatch) {
            input.setCustomValidity(validationMessages.patternMismatch);
        } else if (validity.tooLong) {
            const message = validationMessages.tooLong.replace('{maxlength}', input.maxLength);
            input.setCustomValidity(message);
        } else if (validity.tooShort) {
            const message = validationMessages.tooShort.replace('{minlength}', input.minLength);
            input.setCustomValidity(message);
        } else if (validity.rangeUnderflow) {
            const message = validationMessages.rangeUnderflow.replace('{min}', input.min);
            input.setCustomValidity(message);
        } else if (validity.rangeOverflow) {
            const message = validationMessages.rangeOverflow.replace('{max}', input.max);
            input.setCustomValidity(message);
        } else if (validity.stepMismatch) {
            input.setCustomValidity(validationMessages.stepMismatch);
        } else if (validity.badInput) {
            input.setCustomValidity(validationMessages.badInput);
        } else {
            input.setCustomValidity('');
        }
    }

    // Aplicar validação personalizada a todos os campos do formulário
    const form = document.querySelector('.contact-form-wrapper');
    if (form) {
        const inputs = form.querySelectorAll('input, select, textarea');
        
        inputs.forEach(function(input) {
            // Evento quando o campo perde o foco
            input.addEventListener('blur', function() {
                setCustomValidity(this);
            });
            
            // Evento quando o usuário digita
            input.addEventListener('input', function() {
                setCustomValidity(this);
            });
            
            // Evento quando o formulário é submetido
            input.addEventListener('invalid', function() {
                setCustomValidity(this);
            });
        });
        
        // Evento de submissão do formulário
        form.addEventListener('submit', function(e) {
            inputs.forEach(function(input) {
                setCustomValidity(input);
            });
        });
    }
});
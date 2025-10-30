/**
 * Funcionalidade do Botão Flutuante do WhatsApp
 * MBO Advocacia - Tema WordPress
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('WhatsApp script loaded');
    const whatsappButton = document.getElementById('whatsapp-link');
    const whatsappFloat = document.getElementById('whatsapp-float');
    
    console.log('WhatsApp button element:', whatsappButton);
    console.log('WhatsApp float element:', whatsappFloat);
    
    if (!whatsappButton) {
        console.log('WhatsApp button not found!');
        return;
    }

    // Configurações do WhatsApp (serão passadas via wp_localize_script)
    const whatsappConfig = window.whatsappData || {
        number: '5531999999999',
        message: 'Olá! Gostaria de agendar uma consulta jurídica.',
        buttonText: 'Fale Conosco'
    };

    /**
     * Gera a URL do WhatsApp com a mensagem personalizada
     */
    function generateWhatsAppURL() {
        const baseURL = 'https://wa.me/';
        const encodedMessage = encodeURIComponent(whatsappConfig.message);
        return `${baseURL}${whatsappConfig.number}?text=${encodedMessage}`;
    }

    /**
     * Configura o link do WhatsApp
     */
    function setupWhatsAppLink() {
        const whatsappURL = generateWhatsAppURL();
        whatsappButton.href = whatsappURL;
        
        // Adiciona evento de clique para analytics (opcional)
        whatsappButton.addEventListener('click', function(e) {
            // Analytics tracking (se disponível)
            if (typeof gtag !== 'undefined') {
                gtag('event', 'click', {
                    'event_category': 'WhatsApp',
                    'event_label': 'Botão Flutuante',
                    'value': 1
                });
            }
            
            // Facebook Pixel tracking (se disponível)
            if (typeof fbq !== 'undefined') {
                fbq('track', 'Contact', {
                    content_name: 'WhatsApp Button',
                    content_category: 'Contact'
                });
            }
            
            console.log('WhatsApp button clicked:', whatsappURL);
        });
    }

    /**
     * Animação de entrada do botão
     */
    function animateButtonEntrance() {
        const whatsappFloat = document.getElementById('whatsapp-float');
        if (whatsappFloat) {
            // Pequeno delay para garantir que o CSS foi carregado
            setTimeout(() => {
                whatsappFloat.style.opacity = '1';
                whatsappFloat.style.visibility = 'visible';
                whatsappFloat.style.transform = 'scale(1)';
            }, 1000);
        }
    }

    /**
     * Controla a visibilidade do botão baseado no scroll
     * Sincroniza com o botão "voltar ao topo" (posicionado acima) para melhor UX
     */
    function handleScrollVisibility() {
        const whatsappFloat = document.getElementById('whatsapp-float');
        const backToTopButton = document.getElementById('back-to-top');
        if (!whatsappFloat) return;

        let isVisible = true;
        let lastScrollTop = 0;

        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            // Mostra ambos os botões quando há scroll suficiente
            if (scrollTop > 300) {
                if (!isVisible) {
                    whatsappFloat.style.transform = 'translateY(0) scale(1)';
                    whatsappFloat.style.opacity = '1';
                    isVisible = true;
                }
            } else {
                // Esconde quando está próximo do topo
                if (isVisible && scrollTop < 100) {
                    whatsappFloat.style.transform = 'translateY(20px) scale(0.9)';
                    whatsappFloat.style.opacity = '0.8';
                    isVisible = false;
                }
            }
            
            lastScrollTop = scrollTop;
        });
    }

    /**
     * Adiciona efeitos de hover e interação
     */
    function addInteractionEffects() {
        const whatsappFloat = document.getElementById('whatsapp-float');
        if (!whatsappFloat) return;

        // Efeito de shake sutil a cada 10 segundos para chamar atenção
        setInterval(() => {
            if (document.visibilityState === 'visible') {
                whatsappFloat.style.animation = 'whatsappPulse 0.6s ease-in-out';
                setTimeout(() => {
                    whatsappFloat.style.animation = '';
                }, 600);
            }
        }, 10000);

        // Pausa a animação quando o mouse está sobre o botão
        whatsappFloat.addEventListener('mouseenter', () => {
            whatsappFloat.style.animationPlayState = 'paused';
        });

        whatsappFloat.addEventListener('mouseleave', () => {
            whatsappFloat.style.animationPlayState = 'running';
        });
    }

    /**
     * Suporte para teclado (acessibilidade)
     */
    function addKeyboardSupport() {
        whatsappButton.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                whatsappButton.click();
            }
        });
    }

    /**
     * Detecta se o usuário está em um dispositivo móvel
     */
    function isMobileDevice() {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    }

    /**
     * Ajusta o comportamento para dispositivos móveis
     */
    function optimizeForMobile() {
        if (isMobileDevice()) {
            // Em dispositivos móveis, usa o app do WhatsApp se disponível
            whatsappButton.addEventListener('click', function(e) {
                const whatsappURL = generateWhatsAppURL();
                const appURL = whatsappURL.replace('https://wa.me/', 'whatsapp://send?phone=');
                
                // Tenta abrir o app primeiro, depois fallback para web
                const link = document.createElement('a');
                link.href = appURL;
                link.click();
                
                // Fallback para web após um pequeno delay
                setTimeout(() => {
                    if (document.visibilityState === 'visible') {
                        window.open(whatsappURL, '_blank');
                    }
                }, 500);
                
                e.preventDefault();
            });
        }
    }

    /**
     * Inicializa todas as funcionalidades
     */
    function init() {
        setupWhatsAppLink();
        animateButtonEntrance();
        handleScrollVisibility();
        addInteractionEffects();
        addKeyboardSupport();
        optimizeForMobile();
        
        console.log('WhatsApp button initialized successfully');
    }

    // Inicializa o botão
    init();
});

/**
 * Função global para atualizar as configurações do WhatsApp
 * Útil para atualizações dinâmicas via Customizer
 */
window.updateWhatsAppConfig = function(newConfig) {
    if (window.whatsappData) {
        Object.assign(window.whatsappData, newConfig);
        
        // Atualiza o link se o botão existir
        const whatsappButton = document.getElementById('whatsapp-link');
        if (whatsappButton) {
            const baseURL = 'https://wa.me/';
            const encodedMessage = encodeURIComponent(window.whatsappData.message);
            whatsappButton.href = `${baseURL}${window.whatsappData.number}?text=${encodedMessage}`;
        }
        
        // Atualiza o texto do botão
        const whatsappText = document.querySelector('.whatsapp-text');
        if (whatsappText && newConfig.buttonText) {
            whatsappText.textContent = newConfig.buttonText;
        }
    }
};
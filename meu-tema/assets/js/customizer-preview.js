/**
 * Customizer Preview JavaScript
 * Atualiza as cores em tempo real no preview do customizador
 */

(function($) {
    'use strict';

    // Função para atualizar variável CSS
    function updateCSSVariable(property, value) {
        document.documentElement.style.setProperty(property, value);
    }

    // Cor Dourada Principal
    wp.customize('mbo_color_dourado_principal', function(value) {
        value.bind(function(newval) {
            updateCSSVariable('--dourado-principal', newval);
            updateCSSVariable('--cor-destaque', newval);
            updateCSSVariable('--accent-color', newval);
        });
    });

    // Cor Dourada Clara
    wp.customize('mbo_color_dourado_claro', function(value) {
        value.bind(function(newval) {
            updateCSSVariable('--dourado-claro', newval);
            updateCSSVariable('--cor-hover', newval);
        });
    });

    // Cor de Fundo Principal
    wp.customize('mbo_color_fundo_principal', function(value) {
        value.bind(function(newval) {
            updateCSSVariable('--fundo-principal', newval);
            updateCSSVariable('--preto-marmore', newval);
            updateCSSVariable('--primary-color', newval);
        });
    });

    // Cor de Texto Principal
    wp.customize('mbo_color_texto_principal', function(value) {
        value.bind(function(newval) {
            updateCSSVariable('--texto-principal', newval);
            updateCSSVariable('--branco-suave', newval);
            updateCSSVariable('--text-color', newval);
        });
    });

})(jQuery);
<?php
/**
 * Funções e definições do tema MBO Advocacia
 */

// Previne acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Configuração do tema
 */
function mbo_advocacia_setup() {
    // Adiciona suporte a tradução
    load_theme_textdomain('mbo-advocacia', get_template_directory() . '/languages');

    // Adiciona suporte automático para feed links
    add_theme_support('automatic-feed-links');

    // Permite que o WordPress gerencie o título da página
    add_theme_support('title-tag');

    // Adiciona suporte a imagens destacadas
    add_theme_support('post-thumbnails');

    // Define tamanhos de imagem personalizados
    add_image_size('mbo-featured', 800, 400, true);
    add_image_size('mbo-thumbnail', 300, 200, true);

    // Registra menus de navegação
    register_nav_menus(array(
        'primary' => esc_html__('Menu Principal', 'mbo-advocacia'),
        'footer'  => esc_html__('Menu do Rodapé', 'mbo-advocacia'),
    ));

    // Adiciona suporte a HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Adiciona suporte a formatos de post
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ));

    // Adiciona suporte a logo personalizado
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // Adiciona suporte a cores personalizadas
    add_theme_support('custom-background', array(
        'default-color' => 'f8f9fa',
        'default-image' => '',
    ));

    // Adiciona suporte ao editor de blocos
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_editor_style('editor-style.css');
}
add_action('after_setup_theme', 'mbo_advocacia_setup');

/**
 * Define a largura do conteúdo
 */
function mbo_advocacia_content_width() {
    $GLOBALS['content_width'] = apply_filters('mbo_advocacia_content_width', 800);
}
add_action('after_setup_theme', 'mbo_advocacia_content_width', 0);

/**
 * Registra áreas de widgets
 */
function mbo_advocacia_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar Principal', 'mbo-advocacia'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Adicione widgets aqui.', 'mbo-advocacia'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Rodapé 1', 'mbo-advocacia'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Primeira coluna do rodapé.', 'mbo-advocacia'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Rodapé 2', 'mbo-advocacia'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Segunda coluna do rodapé.', 'mbo-advocacia'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Rodapé 3', 'mbo-advocacia'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Terceira coluna do rodapé.', 'mbo-advocacia'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'mbo_advocacia_widgets_init');

/**
 * Enfileira scripts e estilos
 */
function mbo_advocacia_scripts() {
    // Estilo principal do tema
    wp_enqueue_style('mbo-advocacia-style', get_stylesheet_uri(), array(), '1.0.1');

    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3');

    // Estilo personalizado
    wp_enqueue_style('mbo-advocacia-custom', get_template_directory_uri() . '/assets/css/custom.css', array('bootstrap-css'), '1.0.0');

    // Font Awesome para ícones
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');

    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap', array(), null);

    // Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.3', true);

    // Script principal do tema
    wp_enqueue_script('mbo-advocacia-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'bootstrap-js'), '1.0.1', true);

    // Script de rolagem suave
    wp_enqueue_script('mbo-advocacia-smooth-scroll', get_template_directory_uri() . '/assets/js/smooth-scroll.js', array('mbo-advocacia-script'), '1.0.0', true);

    // Script de animação do contador
    wp_enqueue_script('mbo-advocacia-counter-animation', get_template_directory_uri() . '/assets/js/counter-animation.js', array(), '1.0.0', true);

    // Script de validação de formulário (apenas na página inicial)
    if (is_front_page()) {
        wp_enqueue_script('mbo-advocacia-form-validation', get_template_directory_uri() . '/assets/js/form-validation.js', array('jquery'), '1.0.0', true);
    }

    // Script do botão WhatsApp (se habilitado)
    if (get_theme_mod('mbo_whatsapp_enable', true)) {
        wp_enqueue_script('mbo-advocacia-whatsapp', get_template_directory_uri() . '/assets/js/whatsapp-button.js', array(), '1.0.1', true);
        
        // Passa as configurações do WhatsApp para o JavaScript
        wp_localize_script('mbo-advocacia-whatsapp', 'whatsappData', array(
            'number' => get_theme_mod('mbo_whatsapp_number', '5531999999999'),
            'message' => get_theme_mod('mbo_whatsapp_message', 'Olá! Gostaria de agendar uma consulta jurídica.'),
            'buttonText' => get_theme_mod('mbo_whatsapp_button_text', 'Fale Conosco'),
            'position' => get_theme_mod('mbo_whatsapp_position', 'bottom-right')
        ));
    }

    // Script para comentários
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'mbo_advocacia_scripts');

/**
 * Personaliza o excerpt
 */
function mbo_advocacia_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'mbo_advocacia_excerpt_length', 999);

function mbo_advocacia_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'mbo_advocacia_excerpt_more');

/**
 * Adiciona classes CSS personalizadas ao body
 */
function mbo_advocacia_body_classes($classes) {
    // Adiciona classe se não há sidebar
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'mbo_advocacia_body_classes');

/**
 * Customiza a navegação de posts
 */
function mbo_advocacia_post_navigation() {
    $prev_post = get_previous_post();
    $next_post = get_next_post();

    if ($prev_post || $next_post) {
        echo '<nav class="post-navigation" role="navigation">';
        echo '<div class="nav-links">';
        
        if ($prev_post) {
            echo '<div class="nav-previous">';
            echo '<a href="' . get_permalink($prev_post->ID) . '" rel="prev">';
            echo '<span class="meta-nav">&larr;</span> ';
            echo '<span class="post-title">' . get_the_title($prev_post->ID) . '</span>';
            echo '</a>';
            echo '</div>';
        }
        
        if ($next_post) {
            echo '<div class="nav-next">';
            echo '<a href="' . get_permalink($next_post->ID) . '" rel="next">';
            echo '<span class="post-title">' . get_the_title($next_post->ID) . '</span>';
            echo ' <span class="meta-nav">&rarr;</span>';
            echo '</a>';
            echo '</div>';
        }
        
        echo '</div>';
        echo '</nav>';
    }
}



/**
 * Adiciona meta tags personalizadas
 */
function mbo_advocacia_meta_tags() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<meta name="theme-color" content="var(--texto-azul-claro)">';
}
add_action('wp_head', 'mbo_advocacia_meta_tags');

/**
 * Remove versão do WordPress do head por segurança
 */
remove_action('wp_head', 'wp_generator');

/**
 * Customiza o formulário de pesquisa
 */
function mbo_advocacia_search_form($form) {
    $form = '<form role="search" method="get" class="search-form" action="' . home_url('/') . '">
        <label>
            <span class="screen-reader-text">' . _x('Pesquisar por:', 'label', 'mbo-advocacia') . '</span>
            <input type="search" class="search-field" placeholder="' . esc_attr_x('Pesquisar...', 'placeholder', 'mbo-advocacia') . '" value="' . get_search_query() . '" name="s" />
        </label>
        <input type="submit" class="search-submit" value="' . esc_attr_x('Pesquisar', 'submit button', 'mbo-advocacia') . '" />
    </form>';

    return $form;
}
add_filter('get_search_form', 'mbo_advocacia_search_form');

/**
 * Adiciona suporte a comentários personalizados
 */
function mbo_advocacia_comment_form_defaults($defaults) {
    $defaults['comment_notes_before'] = '<p class="comment-notes">' . 
        __('Seu endereço de e-mail não será publicado.', 'mbo-advocacia') . 
        '</p>';
    
    return $defaults;
}
add_filter('comment_form_defaults', 'mbo_advocacia_comment_form_defaults');

/**
 * Função para exibir informações de contato (para uso em widgets)
 */
function mbo_advocacia_contact_info() {
    $phone = get_theme_mod('mbo_phone', '(11) 9999-9999');
    $email = get_theme_mod('mbo_email', 'contato@mboadvocacia.com.br');
    $address = get_theme_mod('mbo_address', 'São Paulo, SP');
    
    echo '<div class="contact-info">';
    if ($phone) {
        echo '<p><i class="fa fa-phone"></i> ' . esc_html($phone) . '</p>';
    }
    if ($email) {
        echo '<p><i class="fa fa-envelope"></i> ' . esc_html($email) . '</p>';
    }
    if ($address) {
        echo '<p><i class="fa fa-map-marker"></i> ' . esc_html($address) . '</p>';
    }
    echo '</div>';
}

/**
 * Menu fallback se nenhum menu for definido
 */
function mbo_advocacia_fallback_menu() {
    echo '<ul id="primary-menu" class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Início', 'mbo-advocacia') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/sobre')) . '">' . esc_html__('Sobre', 'mbo-advocacia') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/servicos')) . '">' . esc_html__('Serviços', 'mbo-advocacia') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog')) . '">' . esc_html__('Blog', 'mbo-advocacia') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contato')) . '">' . esc_html__('Contato', 'mbo-advocacia') . '</a></li>';
    echo '</ul>';
}

/**
 * Class Name: bootstrap_5_wp_nav_menu_walker
 * Description: A custom WordPress nav walker class for Bootstrap 5.
 * Version: 1.0.0
 * Author: AlexWebLab
 * Author URI: https://alexweblab.com
 * License: MIT
 */
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_Menu
{
    private $current_item;
    private $dropdown_menu_alignment_values = [
        'dropdown-menu-start',
        'dropdown-menu-end',
        'dropdown-menu-sm-start',
        'dropdown-menu-sm-end',
        'dropdown-menu-md-start',
        'dropdown-menu-md-end',
        'dropdown-menu-lg-start',
        'dropdown-menu-lg-end',
        'dropdown-menu-xl-start',
        'dropdown-menu-xl-end',
        'dropdown-menu-xxl-start',
        'dropdown-menu-xxl-end'
    ];

    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $dropdown_menu_classes[] = "";
        foreach($this->current_item->classes as $class) {
            if(in_array($class, $this->dropdown_menu_alignment_values)) {
                $dropdown_menu_classes[] = $class;
            }
        }
        $indent = str_repeat("\t", $depth);
        $output .= "\n" . $indent . '<ul class="dropdown-menu ' . esc_attr(implode(" ", $dropdown_menu_classes)) . '">' . "\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $this->current_item = $item;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';

        $classes[] = 'menu-item-' . $item->ID;

        if ($depth == 0) {
            $classes[] = 'nav-item';
        }

        if ($depth > 0) {
            $classes[] = 'dropdown-menu-item';
        }

        if( in_array('menu-item-has-children', $classes) ) {
            $classes[] = 'dropdown';
        }

        if( in_array('current-menu-item', $classes) ) {
            $classes[] = 'active';
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $active_class = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $nav_link_class = ( $depth == 0 ) ? 'nav-link' : 'dropdown-item';
        $attributes .= (in_array('menu-item-has-children', $item->classes)) ? ' class="'. $nav_link_class .' ' . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"' : ' class="'. $nav_link_class .' ' . $active_class . '"';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/**
 * Customizer - Campos personalizados para página inicial
 */
function mbo_advocacia_customize_register($wp_customize) {
    // === SEÇÃO DE CORES DO TEMA ===
    $wp_customize->add_section('mbo_colors_section', array(
        'title'    => __('Cores do Tema', 'mbo-advocacia'),
        'priority' => 25,
        'description' => __('Personalize as cores principais do tema MBO Advocacia', 'mbo-advocacia'),
    ));

    // Cor Principal Dourada
    $wp_customize->add_setting('mbo_color_dourado_principal', array(
        'default'           => '#C9A64E',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mbo_color_dourado_principal', array(
        'label'       => __('Cor Dourada Principal', 'mbo-advocacia'),
        'description' => __('Cor principal da marca (botões, destaques)', 'mbo-advocacia'),
        'section'     => 'mbo_colors_section',
    )));

    // Cor Dourada Clara
    $wp_customize->add_setting('mbo_color_dourado_claro', array(
        'default'           => '#E4C97D',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mbo_color_dourado_claro', array(
        'label'       => __('Cor Dourada Clara', 'mbo-advocacia'),
        'description' => __('Variação clara da cor dourada (hover, textos)', 'mbo-advocacia'),
        'section'     => 'mbo_colors_section',
    )));

    // Cor de Fundo Principal
    $wp_customize->add_setting('mbo_color_fundo_principal', array(
        'default'           => '#1A1A1A',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mbo_color_fundo_principal', array(
        'label'       => __('Cor de Fundo Principal', 'mbo-advocacia'),
        'description' => __('Cor de fundo principal do site', 'mbo-advocacia'),
        'section'     => 'mbo_colors_section',
    )));

    // Cor de Texto Principal
    $wp_customize->add_setting('mbo_color_texto_principal', array(
        'default'           => '#F5F5F5',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mbo_color_texto_principal', array(
        'label'       => __('Cor de Texto Principal', 'mbo-advocacia'),
        'description' => __('Cor principal dos textos', 'mbo-advocacia'),
        'section'     => 'mbo_colors_section',
    )));

    // Seção da Página Inicial
    $wp_customize->add_section('mbo_homepage_section', array(
        'title'    => __('Página Inicial', 'mbo-advocacia'),
        'priority' => 30,
    ));

    // Card de Experiência
    $wp_customize->add_setting('mbo_experience_text', array(
        'default'           => 'Mais de 15 anos de experiência',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_experience_text', array(
        'label'   => __('Texto do Card de Experiência', 'mbo-advocacia'),
        'section' => 'mbo_homepage_section',
        'type'    => 'text',
    ));

    // Nome da Advogada
    $wp_customize->add_setting('mbo_lawyer_name', array(
        'default'           => 'Dra. Marília Bueno Osório',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_lawyer_name', array(
        'label'   => __('Nome da Advogada (H1)', 'mbo-advocacia'),
        'section' => 'mbo_homepage_section',
        'type'    => 'text',
    ));

    // Especialidade
    $wp_customize->add_setting('mbo_specialty', array(
        'default'           => 'Especialista em Direito da Saúde',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_specialty', array(
        'label'   => __('Especialidade (H2)', 'mbo-advocacia'),
        'section' => 'mbo_homepage_section',
        'type'    => 'text',
    ));

    // Descrição
    $wp_customize->add_setting('mbo_description', array(
        'default'           => 'Advocacia especializada com foco na defesa dos seus direitos na área da saúde. Experiência sólida em Minas Gerais com atendimento personalizado e resultados efetivos.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('mbo_description', array(
        'label'   => __('Descrição (Parágrafo)', 'mbo-advocacia'),
        'section' => 'mbo_homepage_section',
        'type'    => 'textarea',
    ));

    // === BOTÃO PRIMÁRIO ===
    
    // Ativar/Desativar Botão Primário
    $wp_customize->add_setting('mbo_primary_button_enable', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('mbo_primary_button_enable', array(
        'label'   => __('Exibir Botão Primário', 'mbo-advocacia'),
        'section' => 'mbo_homepage_section',
        'type'    => 'checkbox',
    ));

    // Texto do Botão Primário
    $wp_customize->add_setting('mbo_primary_button_text', array(
        'default'           => 'Consulta Gratuita',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_primary_button_text', array(
        'label'   => __('Texto do Botão Primário', 'mbo-advocacia'),
        'section' => 'mbo_homepage_section',
        'type'    => 'text',
    ));

    // Link do Botão Primário
    $wp_customize->add_setting('mbo_primary_button_link', array(
        'default'           => '#contato',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('mbo_primary_button_link', array(
        'label'       => __('Link do Botão Primário', 'mbo-advocacia'),
        'description' => __('URL para onde o botão deve levar (ex: #contato, /contato, https://wa.me/5531999999999)', 'mbo-advocacia'),
        'section'     => 'mbo_homepage_section',
        'type'        => 'url',
    ));

    // === BOTÃO SECUNDÁRIO ===
    
    // Ativar/Desativar Botão Secundário
    $wp_customize->add_setting('mbo_secondary_button_enable', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('mbo_secondary_button_enable', array(
        'label'   => __('Exibir Botão Secundário', 'mbo-advocacia'),
        'section' => 'mbo_homepage_section',
        'type'    => 'checkbox',
    ));

    // Texto do Botão Secundário
    $wp_customize->add_setting('mbo_secondary_button_text', array(
        'default'           => 'Fale Conosco',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_secondary_button_text', array(
        'label'   => __('Texto do Botão Secundário', 'mbo-advocacia'),
        'section' => 'mbo_homepage_section',
        'type'    => 'text',
    ));

    // Link do Botão Secundário
    $wp_customize->add_setting('mbo_secondary_button_link', array(
        'default'           => '#sobre',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('mbo_secondary_button_link', array(
        'label'       => __('Link do Botão Secundário', 'mbo-advocacia'),
        'description' => __('URL para onde o botão deve levar (ex: #sobre, /sobre, mailto:contato@exemplo.com)', 'mbo-advocacia'),
        'section'     => 'mbo_homepage_section',
        'type'        => 'url',
    ));

    // === PERSONALIZAÇÃO DE FUNDO ===
    
    // Imagem de Fundo
    $wp_customize->add_setting('mbo_hero_background_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mbo_hero_background_image', array(
        'label'       => __('Imagem de Fundo do Cabeçalho', 'mbo-advocacia'),
        'description' => __('Selecione uma imagem para usar como fundo do cabeçalho da página inicial', 'mbo-advocacia'),
        'section'     => 'mbo_homepage_section',
        'settings'    => 'mbo_hero_background_image',
    )));

    // Ativar/Desativar Camada de Cor
    $wp_customize->add_setting('mbo_hero_overlay_enable', array(
        'default'           => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('mbo_hero_overlay_enable', array(
        'label'       => __('Ativar Camada de Cor sobre a Imagem', 'mbo-advocacia'),
        'description' => __('Adiciona uma camada de cor sobre a imagem de fundo para melhorar a legibilidade', 'mbo-advocacia'),
        'section'     => 'mbo_homepage_section',
        'type'        => 'checkbox',
    ));

    // Cor da Camada
    $wp_customize->add_setting('mbo_hero_overlay_color', array(
        'default'           => 'var(--preto-marmore)',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mbo_hero_overlay_color', array(
        'label'   => __('Cor da Camada', 'mbo-advocacia'),
        'section' => 'mbo_homepage_section',
    )));

    // Transparência da Camada (0-100)
    $wp_customize->add_setting('mbo_hero_overlay_opacity', array(
        'default'           => 50,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('mbo_hero_overlay_opacity', array(
        'label'       => __('Transparência da Camada (%)', 'mbo-advocacia'),
        'description' => __('0 = Transparente, 100 = Opaco', 'mbo-advocacia'),
        'section'     => 'mbo_homepage_section',
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 100,
            'step' => 5,
        ),
    ));

    // CSS Personalizado para o Cabeçalho
    $wp_customize->add_setting('mbo_hero_custom_css', array(
        'default'           => '',
        'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('mbo_hero_custom_css', array(
        'label'       => __('CSS Personalizado do Cabeçalho', 'mbo-advocacia'),
        'description' => __('Adicione CSS personalizado para o cabeçalho da página inicial (apenas propriedades CSS, sem seletores)', 'mbo-advocacia'),
        'section'     => 'mbo_homepage_section',
        'type'        => 'textarea',
    ));

    // === SEÇÃO SOBRE ===
    
    // Seção Sobre no Customizer
    $wp_customize->add_section('mbo_about_section', array(
        'title'    => __('Seção Sobre', 'mbo-advocacia'),
        'priority' => 31,
    ));

    // Título da Seção Sobre
    $wp_customize->add_setting('mbo_about_title', array(
        'default'           => 'Sobre a Dra. Marília',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_about_title', array(
        'label'   => __('Título da Seção Sobre', 'mbo-advocacia'),
        'section' => 'mbo_about_section',
        'type'    => 'text',
    ));

    // Descrição da Seção Sobre
    $wp_customize->add_setting('mbo_about_description', array(
        'default'           => 'Profissional dedicada com mais de 15 anos de experiência em Direito da Saúde, oferecendo soluções jurídicas especializadas em Minas Gerais.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('mbo_about_description', array(
        'label'   => __('Descrição da Seção Sobre', 'mbo-advocacia'),
        'section' => 'mbo_about_section',
        'type'    => 'textarea',
    ));

    // Tópico 1 - Experiência Comprovada
    $wp_customize->add_setting('mbo_feature_1_title', array(
        'default'           => 'Experiência Comprovada',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_feature_1_title', array(
        'label'   => __('Tópico 1 - Título', 'mbo-advocacia'),
        'section' => 'mbo_about_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('mbo_feature_1_text', array(
        'default'           => 'Mais de 15 anos atuando exclusivamente em Direito da Saúde, com centenas de casos bem-sucedidos.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('mbo_feature_1_text', array(
        'label'   => __('Tópico 1 - Texto', 'mbo-advocacia'),
        'section' => 'mbo_about_section',
        'type'    => 'textarea',
    ));

    // Tópico 2 - Atendimento Humanizado
    $wp_customize->add_setting('mbo_feature_2_title', array(
        'default'           => 'Atendimento Humanizado',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_feature_2_title', array(
        'label'   => __('Tópico 2 - Título', 'mbo-advocacia'),
        'section' => 'mbo_about_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('mbo_feature_2_text', array(
        'default'           => 'Compreendemos que questões de saúde são delicadas e oferecemos suporte completo aos nossos clientes.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('mbo_feature_2_text', array(
        'label'   => __('Tópico 2 - Texto', 'mbo-advocacia'),
        'section' => 'mbo_about_section',
        'type'    => 'textarea',
    ));

    // Tópico 3 - Atuação em MG
    $wp_customize->add_setting('mbo_feature_3_title', array(
        'default'           => 'Atuação em MG',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_feature_3_title', array(
        'label'   => __('Tópico 3 - Título', 'mbo-advocacia'),
        'section' => 'mbo_about_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('mbo_feature_3_text', array(
        'default'           => 'Conhecimento profundo da legislação e práticas jurídicas específicas de Minas Gerais.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('mbo_feature_3_text', array(
        'label'   => __('Tópico 3 - Texto', 'mbo-advocacia'),
        'section' => 'mbo_about_section',
        'type'    => 'textarea',
    ));

    // === CARD DE RESULTADOS ===

    // Título do Card de Resultados
    $wp_customize->add_setting('mbo_results_title', array(
        'default'           => 'Resultados que Falam',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_results_title', array(
        'label'   => __('Título do Card de Resultados', 'mbo-advocacia'),
        'section' => 'mbo_about_section',
        'type'    => 'text',
    ));

    // Estatística 1
    $wp_customize->add_setting('mbo_stat_1_number', array(
        'default'           => '15+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_stat_1_number', array(
        'label'   => __('Estatística 1 - Número', 'mbo-advocacia'),
        'section' => 'mbo_about_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('mbo_stat_1_label', array(
        'default'           => 'Anos de Experiência',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_stat_1_label', array(
        'label'   => __('Estatística 1 - Rótulo', 'mbo-advocacia'),
        'section' => 'mbo_about_section',
        'type'    => 'text',
    ));

    // Estatística 2
    $wp_customize->add_setting('mbo_stat_2_number', array(
        'default'           => '500+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_stat_2_number', array(
        'label'   => __('Estatística 2 - Número', 'mbo-advocacia'),
        'section' => 'mbo_about_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('mbo_stat_2_label', array(
        'default'           => 'Casos Resolvidos',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_stat_2_label', array(
        'label'   => __('Estatística 2 - Rótulo', 'mbo-advocacia'),
        'section' => 'mbo_about_section',
        'type'    => 'text',
    ));

    // Estatística 3
    $wp_customize->add_setting('mbo_stat_3_number', array(
        'default'           => '95%',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_stat_3_number', array(
        'label'   => __('Estatística 3 - Número', 'mbo-advocacia'),
        'section' => 'mbo_about_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('mbo_stat_3_label', array(
        'default'           => 'Taxa de Sucesso',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_stat_3_label', array(
        'label'   => __('Estatística 3 - Rótulo', 'mbo-advocacia'),
        'section' => 'mbo_about_section',
        'type'    => 'text',
    ));

    // Estatística 4
    $wp_customize->add_setting('mbo_stat_4_number', array(
        'default'           => '24h',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_stat_4_number', array(
        'label'   => __('Estatística 4 - Número', 'mbo-advocacia'),
        'section' => 'mbo_about_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('mbo_stat_4_label', array(
        'default'           => 'Resposta Média',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_stat_4_label', array(
        'label'   => __('Estatística 4 - Rótulo', 'mbo-advocacia'),
        'section' => 'mbo_about_section',
        'type'    => 'text',
    ));

    // === SEÇÃO ÁREAS DE ATUAÇÃO ===
    $wp_customize->add_section('mbo_atuacao_section', array(
        'title'    => __('Áreas de Atuação', 'mbo-advocacia'),
        'priority' => 32,
    ));

    // Título
    $wp_customize->add_setting('mbo_atuacao_title', array(
        'default'           => 'Áreas de Atuação',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_atuacao_title', array(
        'label'   => __('Título da Seção', 'mbo-advocacia'),
        'section' => 'mbo_atuacao_section',
        'type'    => 'text',
    ));

    // Texto
    $wp_customize->add_setting('mbo_atuacao_text', array(
        'default'           => 'Especialização completa em Direito da Saúde com foco em resultados práticos e efetivos.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('mbo_atuacao_text', array(
        'label'   => __('Texto da Seção', 'mbo-advocacia'),
        'section' => 'mbo_atuacao_section',
        'type'    => 'textarea',
    ));

    // === CARDS DE SERVIÇOS ===
    
    // Card 1 - Planos de Saúde
    $wp_customize->add_setting('mbo_service_1_title', array(
        'default'           => 'Planos de Saúde',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_service_1_title', array(
        'label'   => __('Card 1 - Título', 'mbo-advocacia'),
        'section' => 'mbo_atuacao_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('mbo_service_1_description', array(
        'default'           => 'Negativa de cobertura, reembolsos, autorização de procedimentos e cirurgias.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('mbo_service_1_description', array(
        'label'   => __('Card 1 - Descrição', 'mbo-advocacia'),
        'section' => 'mbo_atuacao_section',
        'type'    => 'textarea',
    ));

    // Card 2 - Erro Médico
    $wp_customize->add_setting('mbo_service_2_title', array(
        'default'           => 'Erro Médico',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_service_2_title', array(
        'label'   => __('Card 2 - Título', 'mbo-advocacia'),
        'section' => 'mbo_atuacao_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('mbo_service_2_description', array(
        'default'           => 'Responsabilidade civil por negligência, imperícia ou imprudência médica.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('mbo_service_2_description', array(
        'label'   => __('Card 2 - Descrição', 'mbo-advocacia'),
        'section' => 'mbo_atuacao_section',
        'type'    => 'textarea',
    ));

    // Card 3 - Direito do Paciente
    $wp_customize->add_setting('mbo_service_3_title', array(
        'default'           => 'Direito do Paciente',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_service_3_title', array(
        'label'   => __('Card 3 - Título', 'mbo-advocacia'),
        'section' => 'mbo_atuacao_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('mbo_service_3_description', array(
        'default'           => 'Defesa dos direitos fundamentais do paciente e acesso à saúde de qualidade.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('mbo_service_3_description', array(
        'label'   => __('Card 3 - Descrição', 'mbo-advocacia'),
        'section' => 'mbo_atuacao_section',
        'type'    => 'textarea',
    ));

    // Card 4 - Judicialização da Saúde
    $wp_customize->add_setting('mbo_service_4_title', array(
        'default'           => 'Judicialização da Saúde',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_service_4_title', array(
        'label'   => __('Card 4 - Título', 'mbo-advocacia'),
        'section' => 'mbo_atuacao_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('mbo_service_4_description', array(
        'default'           => 'Ações contra o SUS para garantir tratamentos e medicamentos essenciais.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('mbo_service_4_description', array(
        'label'   => __('Card 4 - Descrição', 'mbo-advocacia'),
        'section' => 'mbo_atuacao_section',
        'type'    => 'textarea',
    ));

    // Card 5 - Regulamentação
    $wp_customize->add_setting('mbo_service_5_title', array(
        'default'           => 'Regulamentação',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_service_5_title', array(
        'label'   => __('Card 5 - Título', 'mbo-advocacia'),
        'section' => 'mbo_atuacao_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('mbo_service_5_description', array(
        'default'           => 'Consultoria em regulamentação sanitária e compliance para profissionais da saúde.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('mbo_service_5_description', array(
        'label'   => __('Card 5 - Descrição', 'mbo-advocacia'),
        'section' => 'mbo_atuacao_section',
        'type'    => 'textarea',
    ));

    // Card 6 - Consultoria Preventiva
    $wp_customize->add_setting('mbo_service_6_title', array(
        'default'           => 'Consultoria Preventiva',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_service_6_title', array(
        'label'   => __('Card 6 - Título', 'mbo-advocacia'),
        'section' => 'mbo_atuacao_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('mbo_service_6_description', array(
        'default'           => 'Orientação jurídica preventiva para evitar problemas futuros na área da saúde.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('mbo_service_6_description', array(
        'label'   => __('Card 6 - Descrição', 'mbo-advocacia'),
        'section' => 'mbo_atuacao_section',
        'type'    => 'textarea',
    ));

    // Seção de Contato
    $wp_customize->add_section('mbo_contact_section', array(
        'title'    => __('Informações de Contato', 'mbo-advocacia'),
        'priority' => 35,
    ));

    // Telefone
    $wp_customize->add_setting('mbo_contact_phone', array(
        'default'           => '(31) 9999-9999',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_contact_phone', array(
        'label'   => __('Telefone', 'mbo-advocacia'),
        'section' => 'mbo_contact_section',
        'type'    => 'text',
    ));

    // E-mail
    $wp_customize->add_setting('mbo_contact_email', array(
        'default'           => 'contato@mboadvocacia.com.br',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('mbo_contact_email', array(
        'label'   => __('E-mail', 'mbo-advocacia'),
        'section' => 'mbo_contact_section',
        'type'    => 'email',
    ));

    // Localização
    $wp_customize->add_setting('mbo_contact_location', array(
        'default'           => 'Belo Horizonte - MG',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_contact_location', array(
        'label'   => __('Localização', 'mbo-advocacia'),
        'section' => 'mbo_contact_section',
        'type'    => 'text',
    ));

    // Horário de Atendimento
    $wp_customize->add_setting('mbo_contact_hours', array(
        'default'           => 'Segunda a Sexta: 8h às 18h',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_contact_hours', array(
        'label'   => __('Horário de Atendimento', 'mbo-advocacia'),
        'section' => 'mbo_contact_section',
        'type'    => 'text',
    ));

    // Google Maps Embed URL
    $wp_customize->add_setting('mbo_google_maps_url', array(
        'default'           => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3751.8984!2d-43.9378!3d-19.9167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTnCsDU1JzAwLjEiUyA0M8KwNTYnMTYuMSJX!5e0!3m2!1spt-BR!2sbr!4v1234567890123',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('mbo_google_maps_url', array(
        'label'       => __('URL do Google Maps (Embed)', 'mbo-advocacia'),
        'description' => __('Cole aqui a URL de incorporação do Google Maps', 'mbo-advocacia'),
        'section'     => 'mbo_contact_section',
        'type'        => 'url',
    ));

    // === SEÇÃO DO RODAPÉ ===
    $wp_customize->add_section('mbo_footer_section', array(
        'title'    => __('Configurações do Rodapé', 'mbo-advocacia'),
        'priority' => 40,
    ));

    // Nome do Site no Rodapé
    $wp_customize->add_setting('mbo_footer_site_name', array(
        'default'           => 'MBO Advocacia',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_footer_site_name', array(
        'label'   => __('Nome do Site', 'mbo-advocacia'),
        'section' => 'mbo_footer_section',
        'type'    => 'text',
    ));

    // Logo do Rodapé
    $wp_customize->add_setting('mbo_footer_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mbo_footer_logo', array(
        'label'       => __('Logo do Rodapé', 'mbo-advocacia'),
        'description' => __('Faça upload da logo que aparecerá no rodapé', 'mbo-advocacia'),
        'section'     => 'mbo_footer_section',
    )));

    // Legenda do Site no Rodapé
    $wp_customize->add_setting('mbo_footer_tagline', array(
        'default'           => 'Direito da Saúde',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_footer_tagline', array(
        'label'   => __('Legenda do Site', 'mbo-advocacia'),
        'section' => 'mbo_footer_section',
        'type'    => 'text',
    ));

    // Descrição do Site no Rodapé
    $wp_customize->add_setting('mbo_footer_description', array(
        'default'           => 'Especialistas em Direito da Saúde com mais de 15 anos de experiência em Minas Gerais.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('mbo_footer_description', array(
        'label'   => __('Descrição do Site', 'mbo-advocacia'),
        'section' => 'mbo_footer_section',
        'type'    => 'textarea',
    ));

    // === SEÇÃO DO WHATSAPP ===
    $wp_customize->add_section('mbo_whatsapp_section', array(
        'title'    => __('Configurações do WhatsApp', 'mbo-advocacia'),
        'priority' => 41,
    ));

    // Ativar/Desativar Botão do WhatsApp
    $wp_customize->add_setting('mbo_whatsapp_enable', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('mbo_whatsapp_enable', array(
        'label'       => __('Exibir Botão do WhatsApp', 'mbo-advocacia'),
        'description' => __('Ativa ou desativa o botão flutuante do WhatsApp no site', 'mbo-advocacia'),
        'section'     => 'mbo_whatsapp_section',
        'type'        => 'checkbox',
    ));

    // Número do WhatsApp
    $wp_customize->add_setting('mbo_whatsapp_number', array(
        'default'           => '5531999999999',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_whatsapp_number', array(
        'label'       => __('Número do WhatsApp', 'mbo-advocacia'),
        'description' => __('Digite o número com código do país e DDD (ex: 5531999999999)', 'mbo-advocacia'),
        'section'     => 'mbo_whatsapp_section',
        'type'        => 'text',
    ));

    // Mensagem Padrão
    $wp_customize->add_setting('mbo_whatsapp_message', array(
        'default'           => 'Olá! Gostaria de agendar uma consulta jurídica.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('mbo_whatsapp_message', array(
        'label'       => __('Mensagem Padrão', 'mbo-advocacia'),
        'description' => __('Mensagem que será enviada automaticamente quando o usuário clicar no botão', 'mbo-advocacia'),
        'section'     => 'mbo_whatsapp_section',
        'type'        => 'textarea',
    ));

    // Texto do Botão
    $wp_customize->add_setting('mbo_whatsapp_button_text', array(
        'default'           => 'Fale Conosco',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_whatsapp_button_text', array(
        'label'       => __('Texto do Botão', 'mbo-advocacia'),
        'description' => __('Texto que aparece ao lado do ícone do WhatsApp', 'mbo-advocacia'),
        'section'     => 'mbo_whatsapp_section',
        'type'        => 'text',
    ));

    // Posição do Botão
    $wp_customize->add_setting('mbo_whatsapp_position', array(
        'default'           => 'bottom-right',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mbo_whatsapp_position', array(
        'label'   => __('Posição do Botão', 'mbo-advocacia'),
        'section' => 'mbo_whatsapp_section',
        'type'    => 'select',
        'choices' => array(
            'bottom-right' => __('Inferior Direito', 'mbo-advocacia'),
            'bottom-left'  => __('Inferior Esquerdo', 'mbo-advocacia'),
        ),
    ));
}
add_action('customize_register', 'mbo_advocacia_customize_register');

/**
 * Processamento do formulário de contato
 */
function mbo_process_contact_form() {
    if (isset($_POST['submit_contact']) && wp_verify_nonce($_POST['mbo_contact_nonce'], 'mbo_contact_form')) {
        $name = sanitize_text_field($_POST['contact_name']);
        $email = sanitize_email($_POST['contact_email']);
        $phone = sanitize_text_field($_POST['contact_phone']);
        $subject = sanitize_text_field($_POST['contact_subject']);
        $message = sanitize_textarea_field($_POST['contact_message']);
        
        // Validação básica
        if (empty($name) || empty($email) || empty($subject) || empty($message)) {
            wp_die('Por favor, preencha todos os campos obrigatórios.', 'Erro no Formulário', array('back_link' => true));
        }
        
        // Preparar e-mail
        $to = get_theme_mod('mbo_contact_email', 'contato@mboadvocacia.com.br');
        $email_subject = 'Novo contato do site: ' . $subject;
        $email_message = "Nome: $name\n";
        $email_message .= "E-mail: $email\n";
        $email_message .= "Telefone: $phone\n";
        $email_message .= "Assunto: $subject\n\n";
        $email_message .= "Mensagem:\n$message";
        
        $headers = array(
            'Content-Type: text/plain; charset=UTF-8',
            'From: ' . get_bloginfo('name') . ' <noreply@' . $_SERVER['HTTP_HOST'] . '>',
            'Reply-To: ' . $name . ' <' . $email . '>'
        );
        
        // Enviar e-mail
        if (wp_mail($to, $email_subject, $email_message, $headers)) {
            wp_redirect(add_query_arg('contact', 'success', home_url('/#contato')));
        } else {
            wp_redirect(add_query_arg('contact', 'error', home_url('/#contato')));
        }
        exit;
    }
}
add_action('init', 'mbo_process_contact_form');

/**
 * Desativar comentários globalmente
 */
// Desativar comentários para todos os posts
function mbo_disable_comments_post_types_support() {
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
}
add_action('init', 'mbo_disable_comments_post_types_support');

// Fechar comentários no frontend
function mbo_disable_comments_status() {
    return false;
}
add_filter('comments_open', 'mbo_disable_comments_status', 20, 2);
add_filter('pings_open', 'mbo_disable_comments_status', 20, 2);

// Ocultar comentários existentes
function mbo_disable_comments_hide_existing_comments($comments) {
    $comments = array();
    return $comments;
}
add_filter('comments_array', 'mbo_disable_comments_hide_existing_comments', 10, 2);

// Remover menu de comentários do admin
function mbo_disable_comments_admin_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'mbo_disable_comments_admin_menu');

// Redirecionar tentativas de acesso à página de comentários
function mbo_disable_comments_admin_menu_redirect() {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
}
add_action('admin_init', 'mbo_disable_comments_admin_menu_redirect');

// Remover widget de comentários do dashboard
function mbo_disable_comments_dashboard() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'mbo_disable_comments_dashboard');

/**
 * Custom Post Type para FAQ
 */
function mbo_register_faq_post_type() {
    $labels = array(
        'name'                  => 'FAQs',
        'singular_name'         => 'FAQ',
        'menu_name'             => 'Perguntas Frequentes',
        'name_admin_bar'        => 'FAQ',
        'archives'              => 'Arquivo de FAQs',
        'attributes'            => 'Atributos do FAQ',
        'parent_item_colon'     => 'FAQ Pai:',
        'all_items'             => 'Todas as Perguntas',
        'add_new_item'          => 'Adicionar Nova Pergunta',
        'add_new'               => 'Adicionar Nova',
        'new_item'              => 'Nova Pergunta',
        'edit_item'             => 'Editar Pergunta',
        'update_item'           => 'Atualizar Pergunta',
        'view_item'             => 'Ver Pergunta',
        'view_items'            => 'Ver Perguntas',
        'search_items'          => 'Buscar Perguntas',
        'not_found'             => 'Nenhuma pergunta encontrada',
        'not_found_in_trash'    => 'Nenhuma pergunta encontrada na lixeira',
        'featured_image'        => 'Imagem Destacada',
        'set_featured_image'    => 'Definir imagem destacada',
        'remove_featured_image' => 'Remover imagem destacada',
        'use_featured_image'    => 'Usar como imagem destacada',
        'insert_into_item'      => 'Inserir na pergunta',
        'uploaded_to_this_item' => 'Enviado para esta pergunta',
        'items_list'            => 'Lista de perguntas',
        'items_list_navigation' => 'Navegação da lista de perguntas',
        'filter_items_list'     => 'Filtrar lista de perguntas',
    );

    $args = array(
        'label'                 => 'FAQ',
        'description'           => 'Perguntas Frequentes',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'page-attributes'),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 25,
        'menu_icon'             => 'dashicons-editor-help',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
        'show_in_rest'          => false,
    );

    register_post_type('faq', $args);
}
add_action('init', 'mbo_register_faq_post_type', 0);

/**
 * Adicionar campos personalizados para FAQ
 */
function mbo_add_faq_meta_boxes() {
    add_meta_box(
        'faq_answer',
        'Resposta da Pergunta',
        'mbo_faq_answer_callback',
        'faq',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'mbo_add_faq_meta_boxes');

function mbo_faq_answer_callback($post) {
    wp_nonce_field('mbo_faq_answer_nonce', 'faq_answer_nonce');
    $answer = get_post_meta($post->ID, '_faq_answer', true);
    
    echo '<div style="margin: 10px 0;">';
    echo '<label for="faq_answer"><strong>Resposta:</strong></label><br>';
    wp_editor($answer, 'faq_answer', array(
        'textarea_name' => 'faq_answer',
        'media_buttons' => false,
        'textarea_rows' => 8,
        'teeny' => true,
        'quicktags' => false
    ));
    echo '</div>';
    
    echo '<div style="margin: 15px 0; padding: 10px; background: var(--fundo-muito-claro); border-left: 4px solid var(--cor-info);">';
    echo '<strong>💡 Dica:</strong> Use o campo "Ordem" na lateral direita para definir a sequência das perguntas.';
    echo '</div>';
}

function mbo_save_faq_meta($post_id) {
    if (!isset($_POST['faq_answer_nonce']) || !wp_verify_nonce($_POST['faq_answer_nonce'], 'mbo_faq_answer_nonce')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['faq_answer'])) {
        update_post_meta($post_id, '_faq_answer', wp_kses_post($_POST['faq_answer']));
    }
}
add_action('save_post', 'mbo_save_faq_meta');

/**
 * Personalizar colunas da lista de FAQs no admin
 */
function mbo_faq_columns($columns) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['title'] = 'Pergunta';
    $new_columns['faq_answer'] = 'Resposta';
    $new_columns['menu_order'] = 'Ordem';
    $new_columns['date'] = $columns['date'];
    return $new_columns;
}
add_filter('manage_faq_posts_columns', 'mbo_faq_columns');

function mbo_faq_column_content($column, $post_id) {
    switch ($column) {
        case 'faq_answer':
            $answer = get_post_meta($post_id, '_faq_answer', true);
            echo wp_trim_words(strip_tags($answer), 15, '...');
            break;
        case 'menu_order':
            echo get_post_field('menu_order', $post_id);
            break;
    }
}
add_action('manage_faq_posts_custom_column', 'mbo_faq_column_content', 10, 2);

/**
 * Função para exibir FAQs
 */
function mbo_display_faqs($atts = array()) {
    $atts = shortcode_atts(array(
        'limit' => -1,
        'category' => '',
    ), $atts);

    $args = array(
        'post_type' => 'faq',
        'posts_per_page' => $atts['limit'],
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC',
    );

    $faqs = new WP_Query($args);
    
    if (!$faqs->have_posts()) {
        return '<p>Nenhuma pergunta frequente encontrada.</p>';
    }

    ob_start();
    ?>
    <div class="faq-section">
        <div class="faq-container">
            <?php while ($faqs->have_posts()) : $faqs->the_post(); ?>
                <?php 
                // Primeiro tenta o campo personalizado, depois o conteúdo do post
                $answer = get_post_meta(get_the_ID(), '_faq_answer', true);
                if (empty($answer)) {
                    $answer = get_the_content();
                }
                $faq_id = 'faq-' . get_the_ID();
                ?>
                <div class="faq-item">
                    <div class="faq-question" data-target="<?php echo esc_attr($faq_id); ?>">
                        <h3><?php the_title(); ?></h3>
                        <span class="faq-toggle">
                            <i class="fas fa-plus"></i>
                        </span>
                    </div>
                    <div class="faq-answer" id="<?php echo esc_attr($faq_id); ?>">
                        <div class="faq-content">
                            <?php 
                            if (!empty($answer)) {
                                echo wp_kses_post($answer);
                            } else {
                                echo '<p>Resposta não encontrada.</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php
    wp_reset_postdata();
    return ob_get_clean();
}

// Registrar shortcode para FAQs
function mbo_faq_shortcode($atts) {
    return mbo_display_faqs($atts);
}
add_shortcode('mbo_faq', 'mbo_faq_shortcode');

/**
 * Gera CSS dinâmico baseado nas configurações do customizador
 */
function mbo_advocacia_customizer_css() {
    // Obter valores das configurações
    $dourado_principal = get_theme_mod('mbo_color_dourado_principal', '#C9A64E');
    $dourado_claro = get_theme_mod('mbo_color_dourado_claro', '#E4C97D');
    $fundo_principal = get_theme_mod('mbo_color_fundo_principal', '#1A1A1A');
    $texto_principal = get_theme_mod('mbo_color_texto_principal', '#F5F5F5');

    // Gerar CSS personalizado
    $css = "
    <style type='text/css'>
    :root {
        --dourado-principal: {$dourado_principal} !important;
        --dourado-claro: {$dourado_claro} !important;
        --fundo-principal: {$fundo_principal} !important;
        --preto-marmore: {$fundo_principal} !important;
        --texto-principal: {$texto_principal} !important;
        --branco-suave: {$texto_principal} !important;
        
        /* Atualizar variáveis de compatibilidade */
        --cor-destaque: {$dourado_principal} !important;
        --cor-hover: {$dourado_claro} !important;
        --accent-color: {$dourado_principal} !important;
        --primary-color: {$fundo_principal} !important;
        --text-color: {$texto_principal} !important;
    }
    </style>
    ";

    echo $css;
}
add_action('wp_head', 'mbo_advocacia_customizer_css');

/**
 * JavaScript para preview em tempo real no customizador
 */
function mbo_advocacia_customizer_preview_js() {
    wp_enqueue_script(
        'mbo-customizer-preview',
        get_template_directory_uri() . '/assets/js/customizer-preview.js',
        array('customize-preview'),
        '1.0.0',
        true
    );
}
add_action('customize_preview_init', 'mbo_advocacia_customizer_preview_js');

// Forçar atualização do tema - versão 1.0.4

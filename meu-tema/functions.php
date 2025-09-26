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
 * Adiciona suporte a breadcrumbs simples
 */
function mbo_advocacia_breadcrumbs() {
    if (!is_home() && !is_front_page()) {
        echo '<nav class="breadcrumbs">';
        echo '<a href="' . home_url() . '">Início</a>';
        
        if (is_category() || is_single()) {
            echo ' &raquo; ';
            the_category(' &raquo; ');
            if (is_single()) {
                echo ' &raquo; ';
                the_title();
            }
        } elseif (is_page()) {
            echo ' &raquo; ';
            the_title();
        }
        
        echo '</nav>';
    }
}

/**
 * Adiciona meta tags personalizadas
 */
function mbo_advocacia_meta_tags() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<meta name="theme-color" content="#2c3e50">';
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
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
        $dropdown_menu_classes[] = '';
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
}
add_action('customize_register', 'mbo_advocacia_customize_register');

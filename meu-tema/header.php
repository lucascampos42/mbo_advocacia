<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary">
        <?php esc_html_e('Pular para o conteúdo', 'mbo-advocacia'); ?>
    </a>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="site-branding">
                <?php
                // Logo personalizado
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    // Fallback para título do site
                    if (is_front_page() && is_home()) : ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </h1>
                    <?php else : ?>
                        <p class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </p>
                    <?php endif;
                }

                $description = get_bloginfo('description', 'display');
                if ($description || is_customize_preview()) : ?>
                    <p class="site-description"><?php echo $description; ?></p>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <div class="header-actions">
                <!-- Botão de contato -->
                <a href="#contato" class="btn header-cta">
                    <i class="fa fa-phone"></i>
                    <?php esc_html_e('Entre em Contato', 'mbo-advocacia'); ?>
                </a>
            </div>
        </div><!-- .container -->
    </header><!-- #masthead -->

    <nav id="site-navigation" class="main-navigation">
        <div class="container">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
                <span class="menu-text"><?php esc_html_e('Menu', 'mbo-advocacia'); ?></span>
            </button>
            
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'menu_class'     => 'nav-menu',
                'container'      => false,
                'fallback_cb'    => 'mbo_advocacia_fallback_menu',
            ));
            ?>
            
            <!-- Formulário de pesquisa no header -->
            <div class="header-search">
                <button class="search-toggle" aria-expanded="false">
                    <i class="fa fa-search"></i>
                    <span class="screen-reader-text"><?php esc_html_e('Pesquisar', 'mbo-advocacia'); ?></span>
                </button>
                <div class="search-form-container">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div><!-- .container -->
    </nav><!-- #site-navigation -->

    <?php
    // Breadcrumbs (apenas se não for a página inicial)
    if (!is_front_page()) {
        echo '<div class="breadcrumbs-container">';
        echo '<div class="container">';
        mbo_advocacia_breadcrumbs();
        echo '</div>';
        echo '</div>';
    }
    ?>

<?php
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
?>
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
    <header id="masthead" class="site-header">
        <div class="container">
            <?php
            // Logo do MBO Advocacia
            $logo_url = get_template_directory_uri() . '/assets/images/logo.jpg';
            ?>
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="site-logo">
            </a>
            
            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => '',
                    'fallback_cb'    => '__return_false',
                    'depth'          => 1
                ));
                ?>
            </nav>
            
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <span>☰</span>
            </button>
        </div>
    </header><!-- #masthead -->

<?php
/**
 * Template principal do tema MBO Advocacia
 * 
 * Este é o template mais genérico em uma hierarquia de templates do WordPress
 * e um dos dois templates obrigatórios em um tema WordPress.
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="content-area">
            <div class="main-content">
                <?php if (have_posts()) : ?>
                    
                    <?php if (is_home() && !is_front_page()) : ?>
                        <header class="page-header">
                            <h1 class="page-title"><?php single_post_title(); ?></h1>
                        </header>
                    <?php endif; ?>

                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                            <header class="post-header">
                                <?php
                                if (is_singular()) :
                                    the_title('<h1 class="post-title">', '</h1>');
                                else :
                                    the_title('<h2 class="post-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                                endif;
                                ?>
                                
                                <?php if (!is_page()) : ?>
                                    <div class="post-meta">
                                        <span class="posted-on">
                                            <i class="fa fa-calendar"></i>
                                            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                <?php echo esc_html(get_the_date()); ?>
                                            </time>
                                        </span>
                                        
                                        <span class="byline">
                                            <i class="fa fa-user"></i>
                                            <span class="author vcard">
                                                <a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                    <?php echo esc_html(get_the_author()); ?>
                                                </a>
                                            </span>
                                        </span>
                                        
                                        <?php if (has_category()) : ?>
                                            <span class="cat-links">
                                                <i class="fa fa-folder"></i>
                                                <?php the_category(', '); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </header>

                            <div class="post-content">
                                <?php
                                if (is_singular() || is_home()) :
                                    the_content();
                                else :
                                    the_excerpt();
                                endif;
                                
                                wp_link_pages(array(
                                    'before' => '<div class="page-links">' . esc_html__('Páginas:', 'mbo-advocacia'),
                                    'after'  => '</div>',
                                ));
                                ?>
                            </div>

                            <?php if (!is_singular() && !is_home()) : ?>
                                <footer class="post-footer">
                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="btn">
                                        <?php esc_html_e('Leia mais', 'mbo-advocacia'); ?>
                                    </a>
                                </footer>
                            <?php endif; ?>
                        </article>
                    <?php endwhile; ?>

                    <?php
                    // Navegação de posts
                    the_posts_navigation(array(
                        'prev_text' => __('&larr; Posts anteriores', 'mbo-advocacia'),
                        'next_text' => __('Próximos posts &rarr;', 'mbo-advocacia'),
                    ));
                    ?>

                <?php else : ?>
                    
                    <section class="no-results not-found">
                        <header class="page-header">
                            <h1 class="page-title"><?php esc_html_e('Nada encontrado', 'mbo-advocacia'); ?></h1>
                        </header>

                        <div class="page-content">
                            <?php if (is_home() && current_user_can('publish_posts')) : ?>
                                <p>
                                    <?php
                                    printf(
                                        wp_kses(
                                            __('Pronto para publicar seu primeiro post? <a href="%1$s">Comece aqui</a>.', 'mbo-advocacia'),
                                            array(
                                                'a' => array(
                                                    'href' => array(),
                                                ),
                                            )
                                        ),
                                        esc_url(admin_url('post-new.php'))
                                    );
                                    ?>
                                </p>
                            <?php elseif (is_search()) : ?>
                                <p><?php esc_html_e('Desculpe, mas nada corresponde aos seus termos de pesquisa. Tente novamente com palavras-chave diferentes.', 'mbo-advocacia'); ?></p>
                                <?php get_search_form(); ?>
                            <?php else : ?>
                                <p><?php esc_html_e('Parece que não conseguimos encontrar o que você está procurando. Talvez a pesquisa possa ajudar.', 'mbo-advocacia'); ?></p>
                                <?php get_search_form(); ?>
                            <?php endif; ?>
                        </div>
                    </section>

                <?php endif; ?>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
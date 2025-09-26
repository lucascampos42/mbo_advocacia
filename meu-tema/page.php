<?php
/**
 * Template para exibir páginas
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="content-area">
            <div class="main-content">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="page-<?php the_ID(); ?>" <?php post_class('page'); ?>>
                        <header class="page-header">
                            <h1 class="page-title"><?php the_title(); ?></h1>
                        </header>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="page-thumbnail">
                                <?php the_post_thumbnail('mbo-featured', array('class' => 'featured-image')); ?>
                            </div>
                        <?php endif; ?>

                        <div class="page-content">
                            <?php
                            the_content();
                            
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Páginas:', 'mbo-advocacia'),
                                'after'  => '</div>',
                            ));
                            ?>
                        </div>

                        <?php if (comments_open() || get_comments_number()) : ?>
                            <footer class="page-footer">
                                <?php comments_template(); ?>
                            </footer>
                        <?php endif; ?>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
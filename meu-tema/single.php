<?php
/**
 * Template para exibir posts individuais
 * MBO Advocacia - Design personalizado para notícias individuais
 */

get_header(); ?>

<main id="primary" class="site-main single-news">
    <div class="container">
        <div class="content-area">
            <div class="main-content">
                <?php while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class('post single-post article-content'); ?>>
                        <header class="post-header">
                            <div class="post-categories">
                                <?php if (has_category()) : ?>
                                    <?php the_category(' '); ?>
                                <?php endif; ?>
                            </div>
                            
                            <h1 class="post-title"><?php the_title(); ?></h1>
                            
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
                        </header>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('mbo-featured', array('class' => 'featured-image')); ?>
                            </div>
                        <?php endif; ?>

                        <div class="post-content">
                            <?php
                            the_content();
                            
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Páginas:', 'mbo-advocacia'),
                                'after'  => '</div>',
                            ));
                            ?>
                        </div>

                        <footer class="post-footer">
                            <?php if (has_tag()) : ?>
                                <div class="post-tags">
                                    <i class="fa fa-tags"></i>
                                    <?php the_tags('<span class="tag">', '</span> <span class="tag">', '</span>'); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-share">
                                <h4><?php esc_html_e('Compartilhar:', 'mbo-advocacia'); ?></h4>
                                <div class="share-buttons">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                                       target="_blank" class="share-btn facebook" aria-label="Compartilhar no Facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                                       target="_blank" class="share-btn twitter" aria-label="Compartilhar no Twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" 
                                       target="_blank" class="share-btn linkedin" aria-label="Compartilhar no LinkedIn">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_the_title() . ' - ' . get_permalink()); ?>" 
                                       target="_blank" class="share-btn whatsapp" aria-label="Compartilhar no WhatsApp">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </footer>
                    </article>

                    <!-- Navegação entre posts melhorada -->
                    <nav class="post-navigation">
                        <div class="nav-links">
                            <?php
                            $prev_post = get_previous_post();
                            $next_post = get_next_post();
                            ?>
                            
                            <?php if ($prev_post) : ?>
                                <div class="nav-previous">
                                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="nav-link">
                                        <span class="nav-direction">
                                            <i class="fa fa-chevron-left"></i> Anterior
                                        </span>
                                        <span class="nav-title"><?php echo esc_html($prev_post->post_title); ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($next_post) : ?>
                                <div class="nav-next">
                                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="nav-link">
                                        <span class="nav-direction">
                                            Próximo <i class="fa fa-chevron-right"></i>
                                        </span>
                                        <span class="nav-title"><?php echo esc_html($next_post->post_title); ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </nav>

                    <!-- Artigos Relacionados -->
                    <?php
                    $categories = get_the_category();
                    if ($categories) {
                        $category_ids = array();
                        foreach ($categories as $category) {
                            $category_ids[] = $category->term_id;
                        }
                        
                        $related_posts = get_posts(array(
                            'category__in' => $category_ids,
                            'post__not_in' => array(get_the_ID()),
                            'posts_per_page' => 3,
                            'orderby' => 'rand'
                        ));
                        
                        if ($related_posts) :
                    ?>
                        <section class="related-articles">
                            <h3 class="related-title">Artigos Relacionados</h3>
                            <div class="related-grid">
                                <?php foreach ($related_posts as $post) : setup_postdata($post); ?>
                                    <article class="related-article">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="related-thumbnail">
                                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                                    <?php the_post_thumbnail('medium', array('class' => 'related-image')); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="related-content">
                                            <h4 class="related-article-title">
                                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h4>
                                            <span class="related-date">
                                                <?php echo esc_html(get_the_date('d/m/Y')); ?>
                                            </span>
                                        </div>
                                    </article>
                                <?php endforeach; wp_reset_postdata(); ?>
                            </div>
                        </section>
                    <?php 
                        endif;
                    }
                    ?>


                <?php endwhile; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
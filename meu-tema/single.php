<?php
/**
 * Template para exibir posts individuais
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="content-area">
            <div class="main-content">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post single-post'); ?>>
                        <header class="post-header">
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
                                
                                <?php if (comments_open() || get_comments_number()) : ?>
                                    <span class="comments-link">
                                        <i class="fa fa-comments"></i>
                                        <?php comments_popup_link(
                                            esc_html__('Deixe um comentário', 'mbo-advocacia'),
                                            esc_html__('1 Comentário', 'mbo-advocacia'),
                                            esc_html__('% Comentários', 'mbo-advocacia')
                                        ); ?>
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

                    <?php
                    // Navegação entre posts
                    mbo_advocacia_post_navigation();
                    
                    // Comentários
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>

                <?php endwhile; ?>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
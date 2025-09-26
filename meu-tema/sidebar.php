<?php
/**
 * A sidebar contendo a área de widgets principal
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="widget-area sidebar">
    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <?php dynamic_sidebar('sidebar-1'); ?>
    <?php else : ?>
        <!-- Conteúdo padrão da sidebar se não houver widgets -->
        <section class="widget widget_search">
            <h3 class="widget-title"><?php esc_html_e('Pesquisar', 'mbo-advocacia'); ?></h3>
            <?php get_search_form(); ?>
        </section>

        <section class="widget widget_recent_entries">
            <h3 class="widget-title"><?php esc_html_e('Posts Recentes', 'mbo-advocacia'); ?></h3>
            <ul>
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 5,
                    'post_status' => 'publish'
                ));
                
                foreach ($recent_posts as $post) : ?>
                    <li>
                        <a href="<?php echo get_permalink($post['ID']); ?>">
                            <?php echo esc_html($post['post_title']); ?>
                        </a>
                        <span class="post-date">
                            <?php echo get_the_date('d/m/Y', $post['ID']); ?>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section class="widget widget_categories">
            <h3 class="widget-title"><?php esc_html_e('Categorias', 'mbo-advocacia'); ?></h3>
            <ul>
                <?php
                wp_list_categories(array(
                    'orderby'    => 'count',
                    'order'      => 'DESC',
                    'show_count' => 1,
                    'title_li'   => '',
                    'number'     => 10,
                ));
                ?>
            </ul>
        </section>

        <section class="widget widget_tag_cloud">
            <h3 class="widget-title"><?php esc_html_e('Tags', 'mbo-advocacia'); ?></h3>
            <?php
            wp_tag_cloud(array(
                'smallest' => 0.8,
                'largest'  => 1.2,
                'unit'     => 'rem',
                'number'   => 20,
            ));
            ?>
        </section>

        <section class="widget widget_text">
            <h3 class="widget-title"><?php esc_html_e('Sobre o Escritório', 'mbo-advocacia'); ?></h3>
            <div class="textwidget">
                <p><?php esc_html_e('O escritório MBO Advocacia oferece serviços jurídicos especializados com foco na excelência e no atendimento personalizado aos nossos clientes.', 'mbo-advocacia'); ?></p>
                
                <div class="sidebar-contact">
                    <?php mbo_advocacia_contact_info(); ?>
                </div>
                
                <a href="<?php echo esc_url(home_url('/contato')); ?>" class="btn btn-small">
                    <?php esc_html_e('Entre em Contato', 'mbo-advocacia'); ?>
                </a>
            </div>
        </section>

        <section class="widget widget_archive">
            <h3 class="widget-title"><?php esc_html_e('Arquivo', 'mbo-advocacia'); ?></h3>
            <ul>
                <?php
                wp_get_archives(array(
                    'type'            => 'monthly',
                    'limit'           => 12,
                    'format'          => 'html',
                    'before'          => '<li>',
                    'after'           => '</li>',
                    'show_post_count' => true,
                ));
                ?>
            </ul>
        </section>

        <?php if (is_single() && has_tag()) : ?>
            <section class="widget widget_tag_cloud">
                <h3 class="widget-title"><?php esc_html_e('Tags do Post', 'mbo-advocacia'); ?></h3>
                <div class="post-tags">
                    <?php the_tags('<span class="tag">', '</span><span class="tag">', '</span>'); ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if (is_single()) : ?>
            <section class="widget widget_recent_entries">
                <h3 class="widget-title"><?php esc_html_e('Posts Relacionados', 'mbo-advocacia'); ?></h3>
                <?php
                $categories = get_the_category();
                if ($categories) {
                    $category_ids = array();
                    foreach ($categories as $category) {
                        $category_ids[] = $category->term_id;
                    }
                    
                    $related_posts = get_posts(array(
                        'category__in'   => $category_ids,
                        'post__not_in'   => array(get_the_ID()),
                        'posts_per_page' => 3,
                        'post_status'    => 'publish',
                    ));
                    
                    if ($related_posts) : ?>
                        <ul>
                            <?php foreach ($related_posts as $related_post) : ?>
                                <li>
                                    <a href="<?php echo get_permalink($related_post->ID); ?>">
                                        <?php echo esc_html($related_post->post_title); ?>
                                    </a>
                                    <span class="post-date">
                                        <?php echo get_the_date('d/m/Y', $related_post->ID); ?>
                                    </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else : ?>
                        <p><?php esc_html_e('Nenhum post relacionado encontrado.', 'mbo-advocacia'); ?></p>
                    <?php endif;
                }
                ?>
            </section>
        <?php endif; ?>

    <?php endif; ?>
</aside><!-- #secondary -->
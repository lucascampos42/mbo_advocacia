<?php
/**
 * Template para exibir arquivos (listagem de posts/notícias)
 * MBO Advocacia - Design personalizado para listagem de notícias
 */

get_header(); ?>

<main id="primary" class="site-main news-archive">
    <div class="container">
        <!-- Hero Section para Notícias -->
        <section class="news-hero">
            <div class="news-hero-content">
                <h1 class="news-hero-title">
                    <?php
                    if (is_category()) {
                        single_cat_title('Categoria: ');
                    } elseif (is_tag()) {
                        single_tag_title('Tag: ');
                    } elseif (is_author()) {
                        echo 'Autor: ' . get_the_author();
                    } elseif (is_date()) {
                        echo 'Arquivo: ' . get_the_date('F Y');
                    } else {
                        echo 'Notícias e Artigos';
                    }
                    ?>
                </h1>
                <p class="news-hero-subtitle">
                    <?php
                    if (is_category()) {
                        echo category_description();
                    } else {
                        echo 'Fique por dentro das últimas novidades do Direito da Saúde e atualizações jurídicas importantes.';
                    }
                    ?>
                </p>
            </div>
        </section>

        <div class="content-area">
            <div class="main-content">
                <?php if (have_posts()) : ?>
                    
                    <!-- Filtros de Categoria -->
                    <div class="news-filters">
                        <div class="filter-buttons">
                            <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" 
                               class="filter-btn <?php echo !is_category() ? 'active' : ''; ?>">
                                Todas
                            </a>
                            <?php
                            $categories = get_categories(array('hide_empty' => true));
                            foreach ($categories as $category) :
                            ?>
                                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                                   class="filter-btn <?php echo is_category($category->term_id) ? 'active' : ''; ?>">
                                    <?php echo esc_html($category->name); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Grid de Notícias -->
                    <div class="news-grid">
                        <?php 
                        $post_count = 0;
                        while (have_posts()) : the_post(); 
                            $post_count++;
                            $is_featured = ($post_count === 1); // Primeiro post em destaque
                        ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class($is_featured ? 'news-card featured-news' : 'news-card'); ?>>
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="news-thumbnail">
                                        <a href="<?php echo esc_url(get_permalink()); ?>">
                                            <?php the_post_thumbnail($is_featured ? 'large' : 'medium', array('class' => 'news-image')); ?>
                                        </a>
                                        <div class="news-overlay">
                                            <a href="<?php echo esc_url(get_permalink()); ?>" class="read-more-overlay">
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="news-content">
                                    <div class="news-meta">
                                        <span class="news-date">
                                            <i class="fa fa-calendar"></i>
                                            <?php echo esc_html(get_the_date('d/m/Y')); ?>
                                        </span>
                                        
                                        <?php if (has_category()) : ?>
                                            <span class="news-category">
                                                <?php the_category(', '); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <h2 class="news-title">
                                        <a href="<?php echo esc_url(get_permalink()); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>

                                    <div class="news-excerpt">
                                        <?php 
                                        if ($is_featured) {
                                            echo wp_trim_words(get_the_excerpt(), 30, '...');
                                        } else {
                                            echo wp_trim_words(get_the_excerpt(), 20, '...');
                                        }
                                        ?>
                                    </div>

                                    <div class="news-footer">
                                        <span class="news-author">
                                            <i class="fa fa-user"></i>
                                            <?php echo esc_html(get_the_author()); ?>
                                        </span>
                                        
                                        <a href="<?php echo esc_url(get_permalink()); ?>" class="read-more-btn">
                                            Leia mais <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>

                    <!-- Paginação -->
                    <div class="news-pagination">
                        <?php
                        echo paginate_links(array(
                            'prev_text' => '<i class="fa fa-chevron-left"></i> Anterior',
                            'next_text' => 'Próxima <i class="fa fa-chevron-right"></i>',
                            'type' => 'list',
                            'class' => 'pagination-list'
                        ));
                        ?>
                    </div>

                <?php else : ?>
                    
                    <!-- Nenhum post encontrado -->
                    <section class="no-results not-found">
                        <div class="no-results-content">
                            <i class="fa fa-search no-results-icon"></i>
                            <h2 class="no-results-title">Nenhuma notícia encontrada</h2>
                            <p class="no-results-text">
                                Não encontramos notícias para esta categoria. 
                                Que tal explorar outras seções ou voltar para todas as notícias?
                            </p>
                            <a href="<?php echo esc_url(home_url('/blog')); ?>" class="btn btn-primary">
                                Ver todas as notícias
                            </a>
                        </div>
                    </section>

                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <aside class="news-sidebar">
                <div class="sidebar-widget">
                    <h3 class="widget-title">Buscar Notícias</h3>
                    <?php get_search_form(); ?>
                </div>

                <div class="sidebar-widget">
                    <h3 class="widget-title">Categorias</h3>
                    <ul class="category-list">
                        <?php
                        wp_list_categories(array(
                            'title_li' => '',
                            'show_count' => true,
                            'hide_empty' => true
                        ));
                        ?>
                    </ul>
                </div>

                <div class="sidebar-widget">
                    <h3 class="widget-title">Notícias Recentes</h3>
                    <div class="recent-posts">
                        <?php
                        $recent_posts = wp_get_recent_posts(array(
                            'numberposts' => 5,
                            'post_status' => 'publish'
                        ));
                        
                        foreach ($recent_posts as $post) :
                        ?>
                            <div class="recent-post-item">
                                <h4 class="recent-post-title">
                                    <a href="<?php echo esc_url(get_permalink($post['ID'])); ?>">
                                        <?php echo esc_html($post['post_title']); ?>
                                    </a>
                                </h4>
                                <span class="recent-post-date">
                                    <?php echo esc_html(date('d/m/Y', strtotime($post['post_date']))); ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="sidebar-widget cta-widget">
                    <h3 class="widget-title">Precisa de Ajuda Jurídica?</h3>
                    <p>Nossa equipe especializada está pronta para atendê-lo.</p>
                    <a href="<?php echo esc_url(home_url('/contato')); ?>" class="btn btn-secondary">
                        Entre em Contato
                    </a>
                </div>
            </aside>
        </div>
    </div>
</main>

<?php get_footer(); ?>
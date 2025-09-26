<?php
/**
 * Template para página 404 (página não encontrada)
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="content-area">
            <div class="main-content">
                <section class="error-404 not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e('Oops! Página não encontrada', 'mbo-advocacia'); ?></h1>
                    </header>

                    <div class="page-content">
                        <div class="error-404-content">
                            <div class="error-number">
                                <span class="error-404-number">404</span>
                            </div>
                            
                            <div class="error-message">
                                <p class="error-description">
                                    <?php esc_html_e('Parece que a página que você está procurando não existe ou foi movida.', 'mbo-advocacia'); ?>
                                </p>
                                
                                <p class="error-suggestion">
                                    <?php esc_html_e('Que tal tentar uma das opções abaixo?', 'mbo-advocacia'); ?>
                                </p>
                            </div>
                        </div>

                        <div class="error-404-actions">
                            <div class="action-item">
                                <h3><?php esc_html_e('Pesquisar no site', 'mbo-advocacia'); ?></h3>
                                <?php get_search_form(); ?>
                            </div>

                            <div class="action-item">
                                <h3><?php esc_html_e('Páginas mais visitadas', 'mbo-advocacia'); ?></h3>
                                <ul class="popular-pages">
                                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Página Inicial', 'mbo-advocacia'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/sobre')); ?>"><?php esc_html_e('Sobre Nós', 'mbo-advocacia'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/servicos')); ?>"><?php esc_html_e('Nossos Serviços', 'mbo-advocacia'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/blog')); ?>"><?php esc_html_e('Blog', 'mbo-advocacia'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/contato')); ?>"><?php esc_html_e('Contato', 'mbo-advocacia'); ?></a></li>
                                </ul>
                            </div>

                            <div class="action-item">
                                <h3><?php esc_html_e('Posts recentes', 'mbo-advocacia'); ?></h3>
                                <?php
                                $recent_posts = wp_get_recent_posts(array(
                                    'numberposts' => 5,
                                    'post_status' => 'publish'
                                ));
                                
                                if ($recent_posts) : ?>
                                    <ul class="recent-posts-404">
                                        <?php foreach ($recent_posts as $post) : ?>
                                            <li>
                                                <a href="<?php echo get_permalink($post['ID']); ?>">
                                                    <?php echo esc_html($post['post_title']); ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else : ?>
                                    <p><?php esc_html_e('Nenhum post encontrado.', 'mbo-advocacia'); ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="action-item">
                                <h3><?php esc_html_e('Categorias', 'mbo-advocacia'); ?></h3>
                                <?php
                                $categories = get_categories(array(
                                    'orderby' => 'count',
                                    'order'   => 'DESC',
                                    'number'  => 5,
                                ));
                                
                                if ($categories) : ?>
                                    <ul class="categories-404">
                                        <?php foreach ($categories as $category) : ?>
                                            <li>
                                                <a href="<?php echo get_category_link($category->term_id); ?>">
                                                    <?php echo esc_html($category->name); ?>
                                                    <span class="post-count">(<?php echo $category->count; ?>)</span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="error-404-contact">
                            <div class="contact-cta">
                                <h3><?php esc_html_e('Precisa de ajuda jurídica?', 'mbo-advocacia'); ?></h3>
                                <p><?php esc_html_e('Nossa equipe está pronta para atendê-lo. Entre em contato conosco!', 'mbo-advocacia'); ?></p>
                                <a href="<?php echo esc_url(home_url('/contato')); ?>" class="btn btn-large legal-bg">
                                    <i class="fa fa-phone"></i>
                                    <?php esc_html_e('Entre em Contato', 'mbo-advocacia'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<style>
.error-404-content {
    text-align: center;
    margin-bottom: 3rem;
}

.error-404-number {
    font-size: 8rem;
    font-weight: bold;
    color: var(--cor-perigo);
    line-height: 1;
    display: block;
    margin-bottom: 1rem;
}

.error-description {
    font-size: 1.2rem;
    color: var(--texto-escuro);
    margin-bottom: 1rem;
}

.error-suggestion {
    font-size: 1rem;
    color: var(--texto-cinza-claro);
}

.error-404-actions {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.action-item {
    background: white;
    padding: 1.5rem;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.action-item h3 {
    color: var(--texto-azul-claro);
    margin-bottom: 1rem;
    font-size: 1.1rem;
}

.popular-pages, .recent-posts-404, .categories-404 {
    list-style: none;
    padding: 0;
}

.popular-pages li, .recent-posts-404 li, .categories-404 li {
    margin-bottom: 0.5rem;
}

.popular-pages a, .recent-posts-404 a, .categories-404 a {
    color: var(--cor-azul-escuro);
    text-decoration: none;
    transition: color 0.3s;
}

.popular-pages a:hover, .recent-posts-404 a:hover, .categories-404 a:hover {
    color: var(--cor-info);
}

.post-count {
    color: var(--texto-cinza-medio-claro);
    font-size: 0.9rem;
}

.error-404-contact {
    background: var(--fundo-claro);
    padding: 2rem;
    border-radius: 8px;
    text-align: center;
    border-left: 4px solid var(--cor-perigo);
}

.contact-cta h3 {
    color: var(--texto-azul-claro);
    margin-bottom: 1rem;
}

.contact-cta p {
    color: #666;
    margin-bottom: 1.5rem;
}

@media (max-width: 768px) {
    .error-404-number {
        font-size: 5rem;
    }
    
    .error-404-actions {
        grid-template-columns: 1fr;
    }
}
</style>

<?php get_footer(); ?>
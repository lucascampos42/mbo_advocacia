<?php
/**
 * Template para página de FAQ
 * Template Name: Página de FAQ
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            
            <!-- Hero Section -->
            <section class="page-hero">
                <div class="hero-content">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php if (get_the_content()) : ?>
                        <div class="page-description">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

            <!-- FAQ Section -->
            <?php echo do_shortcode('[mbo_faq]'); ?>

        <?php endwhile; ?>
    </div>
</main>

<style>
.page-hero {
    padding: 80px 0 40px 0;
    text-align: center;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.page-title {
    font-size: 3rem;
    color: var(--primary-color);
    margin-bottom: 20px;
    font-weight: 700;
}

.page-description {
    max-width: 600px;
    margin: 0 auto;
    font-size: 1.1rem;
    color: #666;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .page-hero {
        padding: 60px 0 30px 0;
    }
    
    .page-title {
        font-size: 2.2rem;
    }
    
    .page-description {
        font-size: 1rem;
        padding: 0 20px;
    }
}
</style>

<?php get_footer(); ?>
<footer id="colophon" class="site-footer">
        <div class="container">
            <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')) : ?>
                <div class="footer-widgets">
                    <div class="footer-widget-area">
                        <?php if (is_active_sidebar('footer-1')) : ?>
                            <div class="footer-widget footer-widget-1">
                                <?php dynamic_sidebar('footer-1'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (is_active_sidebar('footer-2')) : ?>
                            <div class="footer-widget footer-widget-2">
                                <?php dynamic_sidebar('footer-2'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (is_active_sidebar('footer-3')) : ?>
                            <div class="footer-widget footer-widget-3">
                                <?php dynamic_sidebar('footer-3'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div><!-- .footer-widgets -->
            <?php else : ?>
                <!-- Conteúdo padrão do rodapé - Layout Horizontal -->
                <div class="footer-widgets">
                    <!-- Primeira Coluna: Logo e Nome do Site -->
                    <div class="footer-widget footer-widget-1">
                        <h4 class="widget-title"><?php echo esc_html(get_theme_mod('mbo_footer_site_name', 'MBO Advocacia')); ?></h4>
                        <div class="footer-logo-subtitle-wrapper">
                            <?php 
                            $footer_logo = get_theme_mod('mbo_footer_logo');
                            if ($footer_logo) : ?>
                                <img src="<?php echo esc_url($footer_logo); ?>" alt="<?php echo esc_attr(get_theme_mod('mbo_footer_site_name', 'MBO Advocacia')); ?>" class="footer-logo">
                            <?php endif; ?>
                            <h5 class="footer-subtitle"><?php echo esc_html(get_theme_mod('mbo_footer_tagline', 'Direito da Saúde')); ?></h5>
                        </div>
                        <p><?php echo esc_html(get_theme_mod('mbo_footer_description', 'Especialistas em Direito da Saúde com mais de 15 anos de experiência em Minas Gerais.')); ?></p>
                    </div>
                    
                    <!-- Segunda Coluna: Áreas de Atuação -->
                    <div class="footer-widget footer-widget-2">
                        <h4 class="widget-title">Áreas de Atuação</h4>
                        <ul class="footer-menu">
                            <li><a href="#">Planos de Saúde</a></li>
                            <li><a href="#">Erro Médico</a></li>
                            <li><a href="#">Direito do Paciente</a></li>
                            <li><a href="#">Judicialização da Saúde</a></li>
                        </ul>
                    </div>
                    
                    <!-- Terceira Coluna: Informações de Contato -->
                    <div class="footer-widget footer-widget-3">
                        <h4 class="widget-title">Contato</h4>
                        <div class="footer-contact">
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                                        </svg>
                                    </div>
                                    <div class="contact-details">
                                        <span>Telefone:</span>
                                        <a href="tel:<?php echo esc_attr(str_replace(['(', ')', ' ', '-'], '', get_theme_mod('mbo_contact_phone', '(31) 9999-9999'))); ?>"><?php echo esc_html(get_theme_mod('mbo_contact_phone', '(31) 9999-9999')); ?></a>
                                    </div>
                                </div>
                                
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.89 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                        </svg>
                                    </div>
                                    <div class="contact-details">
                                        <span>E-mail:</span>
                                        <a href="mailto:<?php echo esc_attr(get_theme_mod('mbo_contact_email', 'contato@mboadvocacia.com.br')); ?>"><?php echo esc_html(get_theme_mod('mbo_contact_email', 'contato@mboadvocacia.com.br')); ?></a>
                                    </div>
                                </div>
                                
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/>
                                            <path d="M12.5 7H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                                        </svg>
                                    </div>
                                    <div class="contact-details">
                                        <span>Horário:</span>
                                        <span><?php echo esc_html(get_theme_mod('mbo_contact_hours', 'Segunda a Sexta: 8h às 18h')); ?></span>
                                    </div>
                                </div>
                                
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                        </svg>
                                    </div>
                                    <div class="contact-details">
                                        <span>Localização:</span>
                                        <span><?php echo esc_html(get_theme_mod('mbo_contact_location', 'Belo Horizonte - MG')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .footer-widgets -->
            <?php endif; ?>
            
            <!-- Menu do rodapé -->
            <?php if (has_nav_menu('footer')) : ?>
                <nav class="footer-navigation" aria-label="<?php esc_attr_e('Menu do Rodapé', 'mbo-advocacia'); ?>">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'container'      => false,
                        'depth'          => 1,
                    ));
                    ?>
                </nav>
            <?php endif; ?>
            
            <div class="site-info">
                <div class="copyright">
                    <p>
                        &copy; <?php echo date('Y'); ?> MBO Advocacia - Dra. Marília Bueno Osório. Todos os direitos reservados.
                    </p>
                </div>
                
                <div class="site-credits">
                    <p>
                        Desenvolvido por 
                        <a href="https://codesdevs.com.br/" target="_blank" rel="noopener">Codesdevs</a> 
                        e 
                        <a href="https://www.cbtitech.com.br/" target="_blank" rel="noopener">cbtitech</a>
                    </p>
                </div>
            </div><!-- .site-info -->
        </div><!-- .container -->
    </footer><!-- #colophon -->
    
    <!-- Botão voltar ao topo -->
    <button id="back-to-top" class="back-to-top" aria-label="<?php esc_attr_e('Voltar ao topo', 'mbo-advocacia'); ?>">
        <i class="fa fa-chevron-up"></i>
    </button>
    
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Script básico para funcionalidades do tema -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Menu mobile toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const navigation = document.querySelector('.main-navigation');
    
    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
            navigation.classList.toggle('toggled');
        });
    }
    
    // Search toggle
    const searchToggle = document.querySelector('.search-toggle');
    const searchContainer = document.querySelector('.search-form-container');
    
    if (searchToggle) {
        searchToggle.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
            searchContainer.classList.toggle('active');
            
            if (!expanded) {
                const searchField = searchContainer.querySelector('.search-field');
                if (searchField) {
                    searchField.focus();
                }
            }
        });
    }
    
    // Back to top button
    const backToTop = document.getElementById('back-to-top');
    
    if (backToTop) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });
        
        backToTop.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // Smooth scroll para links âncora
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '#0') {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
});
</script>

</body>
</html>

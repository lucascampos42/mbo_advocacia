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
                <!-- Conteúdo padrão do rodapé se não houver widgets -->
                <div class="footer-default-content">
                    <div class="footer-widget-area">
                        <div class="footer-widget footer-widget-1">
                            <h4 class="widget-title"><?php esc_html_e('MBO Advocacia', 'mbo-advocacia'); ?></h4>
                            <p><?php esc_html_e('Escritório especializado em direito empresarial, trabalhista e civil, oferecendo soluções jurídicas personalizadas para empresas e pessoas físicas.', 'mbo-advocacia'); ?></p>
                            
                            <div class="social-links">
                                <a href="#" class="social-link" aria-label="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-link" aria-label="LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="social-link" aria-label="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-link" aria-label="WhatsApp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="footer-widget footer-widget-2">
                            <h4 class="widget-title"><?php esc_html_e('Áreas de Atuação', 'mbo-advocacia'); ?></h4>
                            <ul class="footer-menu">
                                <li><a href="#"><?php esc_html_e('Direito Empresarial', 'mbo-advocacia'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('Direito Trabalhista', 'mbo-advocacia'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('Direito Civil', 'mbo-advocacia'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('Direito Tributário', 'mbo-advocacia'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('Consultoria Jurídica', 'mbo-advocacia'); ?></a></li>
                            </ul>
                        </div>
                        
                        <div class="footer-widget footer-widget-3">
                            <h4 class="widget-title"><?php esc_html_e('Contato', 'mbo-advocacia'); ?></h4>
                            <?php mbo_advocacia_contact_info(); ?>
                            
                            <div class="office-hours">
                                <h5><?php esc_html_e('Horário de Atendimento', 'mbo-advocacia'); ?></h5>
                                <p><?php esc_html_e('Segunda a Sexta: 8h às 18h', 'mbo-advocacia'); ?></p>
                                <p><?php esc_html_e('Sábado: 8h às 12h', 'mbo-advocacia'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
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
                        &copy; <?php echo date('Y'); ?> 
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php bloginfo('name'); ?>
                        </a>
                        <?php esc_html_e('- Todos os direitos reservados.', 'mbo-advocacia'); ?>
                    </p>
                </div>
                
                <div class="site-credits">
                    <p>
                        <?php
                        printf(
                            esc_html__('Desenvolvido com %s WordPress', 'mbo-advocacia'),
                            '<span class="heart" aria-label="amor">♥</span>'
                        );
                        ?>
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
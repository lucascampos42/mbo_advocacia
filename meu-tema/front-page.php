<?php 
get_header(); 

// Se o parâmetro show_all_posts estiver presente, mostrar todos os posts
if (isset($_GET['show_all_posts'])) {
    // Configurar query para mostrar todos os posts
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 12,
        'post_status' => 'publish',
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1
    );
    
    // Executar a query
    $all_posts_query = new WP_Query($args);
    
    // Definir a query global para que o template archive.php funcione
    global $wp_query;
    $wp_query = $all_posts_query;
    
    // Incluir o template de arquivo
    include(get_template_directory() . '/archive.php');
    get_footer();
    return;
}
?>
<!-- Atualização dos ícones SVG - versão 1.0.3 -->

<main id="primary" class="site-main">
    
    <!-- Hero Section -->
    <section class="hero-section" style="<?php 
        $hero_styles = array();
        
        // Imagem de fundo
        $bg_image = get_theme_mod('mbo_hero_background_image', '');
        if (!empty($bg_image)) {
            $hero_styles[] = 'background-image: linear-gradient(rgba(26, 26, 26, 0.4), rgba(26, 26, 26, 0.4)), url(' . esc_url($bg_image) . ') !important';
            $hero_styles[] = 'background-size: cover !important';
            $hero_styles[] = 'background-position: center center !important';
            $hero_styles[] = 'background-repeat: no-repeat !important';
            $hero_styles[] = 'background-attachment: scroll !important';
        }
        
        // CSS personalizado
        $custom_css = get_theme_mod('mbo_hero_custom_css', '');
        if (!empty($custom_css)) {
            $hero_styles[] = wp_strip_all_tags($custom_css);
        }
        
        echo implode('; ', $hero_styles);
    ?>"><?php 
        // Camada de cor sobre a imagem
        $overlay_enabled = get_theme_mod('mbo_hero_overlay_enable', false);
        $bg_image = get_theme_mod('mbo_hero_background_image', '');
        if ($overlay_enabled && !empty($bg_image)) {
            $overlay_color = get_theme_mod('mbo_hero_overlay_color', 'var(--preto-marmore)');
            $overlay_opacity = get_theme_mod('mbo_hero_overlay_opacity', 50);
            $rgba_color = sscanf($overlay_color, "#%02x%02x%02x");
            $rgba = 'rgba(' . implode(',', $rgba_color) . ',' . ($overlay_opacity / 100) . ')';
            echo '<div class="hero-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: ' . $rgba . '; z-index: 1;"></div>';
        }
     ?>
        <div class="container" style="position: relative; z-index: 2;">
            
            <!-- Card de Experiência -->
            <div class="experience-card">
                <div class="medal-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L15.09 8.26L22 9L17 14L18.18 21L12 17.77L5.82 21L7 14L2 9L8.91 8.26L12 2Z" fill="currentColor"/>
                    </svg>
                </div>
                <span class="experience-text">
                    <?php echo esc_html(get_theme_mod('mbo_experience_text', 'Mais de 15 anos de experiência')); ?>
                </span>
            </div>

            <!-- Conteúdo Principal -->
            <div class="hero-content">
                <h1 class="hero-title">
                    <?php echo esc_html(get_theme_mod('mbo_lawyer_name', 'Dra. Marília Bueno Osório')); ?>
                </h1>
                
                <h2 class="hero-subtitle">
                    <?php echo esc_html(get_theme_mod('mbo_specialty', 'Especialista em Direito da Saúde')); ?>
                </h2>
                
                <p class="hero-description">
                    <?php echo esc_html(get_theme_mod('mbo_description', 'Advocacia especializada com foco na defesa dos seus direitos na área da saúde. Experiência sólida em Minas Gerais com atendimento personalizado e resultados efetivos.')); ?>
                </p>
                
                <!-- Botões de Ação -->
                <div class="hero-buttons">
                    <?php if (get_theme_mod('mbo_primary_button_enable', true)) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('mbo_primary_button_link', '#contato')); ?>" class="btn btn-primary">
                            <?php echo esc_html(get_theme_mod('mbo_primary_button_text', 'Consulta Gratuita')); ?>
                        </a>
                    <?php endif; ?>
                    
                    <?php if (get_theme_mod('mbo_secondary_button_enable', true)) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('mbo_secondary_button_link', '#sobre')); ?>" class="btn btn-secondary">
                            <?php echo esc_html(get_theme_mod('mbo_secondary_button_text', 'Fale Conosco')); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Sobre a Dra. Marília -->
    <section id="sobre" class="about-section">
        <div class="container">
            <!-- Título da Seção -->
            <h2 class="about-section-title">
                <?php echo esc_html(get_theme_mod('mbo_about_title', 'Sobre a Dra. Marília')); ?>
            </h2>
            
            <!-- Descrição Centralizada -->
            <p class="about-description">
                <?php echo esc_html(get_theme_mod('mbo_about_description', 'Profissional dedicada com mais de 15 anos de experiência em Direito da Saúde, oferecendo soluções jurídicas especializadas em Minas Gerais.')); ?>
            </p>
            
            <div class="about-content">
                <!-- Conteúdo Principal -->
                <div class="about-main">
                    <!-- Três Tópicos com Ícones -->
                    <div class="about-features">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="feature-content">
                                <h3><?php echo esc_html(get_theme_mod('mbo_feature_1_title', 'Experiência Comprovada')); ?></h3>
                                <p><?php echo esc_html(get_theme_mod('mbo_feature_1_text', 'Mais de 15 anos atuando exclusivamente em Direito da Saúde, com centenas de casos bem-sucedidos.')); ?></p>
                            </div>
                        </div>
                        
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.84 4.61C19.32 3.04 17.19 2 14.83 2C13.5 2 12.23 2.39 11.18 3.11C10.13 2.39 8.86 2 7.53 2C5.17 2 3.04 3.04 1.52 4.61C0.56 5.61 0 6.96 0 8.4C0 9.84 0.56 11.19 1.52 12.19L11.18 22.35C11.39 22.57 11.68 22.69 12 22.69C12.32 22.69 12.61 22.57 12.82 22.35L22.48 12.19C23.44 11.19 24 9.84 24 8.4C24 6.96 23.44 5.61 22.48 4.61H20.84Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="feature-content">
                                <h3><?php echo esc_html(get_theme_mod('mbo_feature_2_title', 'Atendimento Humanizado')); ?></h3>
                                <p><?php echo esc_html(get_theme_mod('mbo_feature_2_text', 'Compreendemos que questões de saúde são delicadas e oferecemos suporte completo aos nossos clientes.')); ?></p>
                            </div>
                        </div>
                        
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2L13.09 8.26L22 9L17 14L18.18 21L12 17.77L5.82 21L7 14L2 9L8.91 8.26L12 2Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="feature-content">
                                <h3><?php echo esc_html(get_theme_mod('mbo_feature_3_title', 'Atuação em MG')); ?></h3>
                                <p><?php echo esc_html(get_theme_mod('mbo_feature_3_text', 'Conhecimento profundo da legislação e práticas jurídicas específicas de Minas Gerais.')); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Card de Resultados -->
                <div class="results-card">
                    <div class="results-medal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award" aria-hidden="true">
                            <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path>
                            <circle cx="12" cy="8" r="6"></circle>
                        </svg>
                    </div>
                    
                    <h3 class="results-title">
                        <?php echo esc_html(get_theme_mod('mbo_results_title', 'Resultados que Falam')); ?>
                    </h3>
                    
                    <div class="results-stats">
                        <div class="stat-item">
                            <div class="stat-number">
                                <?php echo esc_html(get_theme_mod('mbo_stat_1_number', '15+')); ?>
                            </div>
                            <div class="stat-label">
                                <?php echo esc_html(get_theme_mod('mbo_stat_1_label', 'Anos de Experiência')); ?>
                            </div>
                        </div>
                        
                        <div class="stat-item">
                            <div class="stat-number">
                                <?php echo esc_html(get_theme_mod('mbo_stat_2_number', '500+')); ?>
                            </div>
                            <div class="stat-label">
                                <?php echo esc_html(get_theme_mod('mbo_stat_2_label', 'Casos Resolvidos')); ?>
                            </div>
                        </div>
                        
                        <div class="stat-item">
                            <div class="stat-number">
                                <?php echo esc_html(get_theme_mod('mbo_stat_3_number', '95%')); ?>
                            </div>
                            <div class="stat-label">
                                <?php echo esc_html(get_theme_mod('mbo_stat_3_label', 'Taxa de Sucesso')); ?>
                            </div>
                        </div>
                        
                        <div class="stat-item">
                            <div class="stat-number">
                                <?php echo esc_html(get_theme_mod('mbo_stat_4_number', '24h')); ?>
                            </div>
                            <div class="stat-label">
                                <?php echo esc_html(get_theme_mod('mbo_stat_4_label', 'Resposta Média')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Áreas de Atuação -->
    <section id="servicos" class="services-section">
        <div class="container">
            <div class="services-header">
                <h2 class="services-title">
                    <?php echo esc_html(get_theme_mod('mbo_atuacao_title', 'Áreas de Atuação')); ?>
                </h2>
                <p class="services-description">
                    <?php echo esc_html(get_theme_mod('mbo_atuacao_text', 'Especialização completa em Direito da Saúde com foco em resultados práticos e efetivos.')); ?>
                </p>
            </div>
            
            <div class="services-grid">
                <!-- Card 1: Planos de Saúde -->
                <div class="service-card">
                    <div class="service-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                        </svg>
                    </div>
                    <h3 class="service-title">
                        <?php echo esc_html(get_theme_mod('mbo_service_1_title', 'Planos de Saúde')); ?>
                    </h3>
                    <p class="service-description">
                        <?php echo esc_html(get_theme_mod('mbo_service_1_description', 'Negativa de cobertura, reembolsos, autorização de procedimentos e cirurgias.')); ?>
                    </p>
                </div>
                
                <!-- Card 2: Erro Médico -->
                <div class="service-card">
                    <div class="service-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                        </svg>
                    </div>
                    <h3 class="service-title">
                        <?php echo esc_html(get_theme_mod('mbo_service_2_title', 'Erro Médico')); ?>
                    </h3>
                    <p class="service-description">
                        <?php echo esc_html(get_theme_mod('mbo_service_2_description', 'Responsabilidade civil por negligência, imperícia ou imprudência médica.')); ?>
                    </p>
                </div>
                
                <!-- Card 3: Direito do Paciente -->
                <div class="service-card">
                    <div class="service-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <path d="M16 3.128a4 4 0 0 1 0 7.744"></path>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <h3 class="service-title">
                        <?php echo esc_html(get_theme_mod('mbo_service_3_title', 'Direito do Paciente')); ?>
                    </h3>
                    <p class="service-description">
                        <?php echo esc_html(get_theme_mod('mbo_service_3_description', 'Defesa dos direitos fundamentais do paciente e acesso à saúde de qualidade.')); ?>
                    </p>
                </div>
                
                <!-- Card 4: Judicialização da Saúde -->
                <div class="service-card">
                    <div class="service-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="m14.5 12.5-8 8a2.119 2.119 0 1 1-3-3l8-8"></path>
                            <path d="m16 16 6-6"></path>
                            <path d="m8 8 6-6"></path>
                            <path d="m9 7 8 8"></path>
                            <path d="m21 11-8-8"></path>
                        </svg>
                    </div>
                    <h3 class="service-title">
                        <?php echo esc_html(get_theme_mod('mbo_service_4_title', 'Judicialização da Saúde')); ?>
                    </h3>
                    <p class="service-description">
                        <?php echo esc_html(get_theme_mod('mbo_service_4_description', 'Ações contra o SUS para garantir tratamentos e medicamentos essenciais.')); ?>
                    </p>
                </div>
                
                <!-- Card 5: Regulamentação -->
                <div class="service-card">
                    <div class="service-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 7v14"></path>
                            <path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"></path>
                        </svg>
                    </div>
                    <h3 class="service-title">
                        <?php echo esc_html(get_theme_mod('mbo_service_5_title', 'Regulamentação')); ?>
                    </h3>
                    <p class="service-description">
                        <?php echo esc_html(get_theme_mod('mbo_service_5_description', 'Consultoria em regulamentação sanitária e compliance para profissionais da saúde.')); ?>
                    </p>
                </div>
                
                <!-- Card 6: Consultoria Preventiva -->
                <div class="service-card">
                    <div class="service-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                        </svg>
                    </div>
                    <h3 class="service-title">
                        <?php echo esc_html(get_theme_mod('mbo_service_6_title', 'Consultoria Preventiva')); ?>
                    </h3>
                    <p class="service-description">
                        <?php echo esc_html(get_theme_mod('mbo_service_6_description', 'Orientação jurídica preventiva para evitar problemas futuros na área da saúde.')); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de FAQ -->
    <section id="faq" class="faq-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Perguntas Frequentes</h2>
                <p class="section-subtitle">Tire suas dúvidas sobre nossos serviços jurídicos</p>
            </div>
            
            <?php echo do_shortcode('[mbo_faq]'); ?>
        </div>
    </section>

    <!-- Seção de Contato -->
    <section id="contato" class="contact-section">
        <div class="container">
            <div class="contact-header">
                <h2 class="section-title">Entre em Contato</h2>
                <p class="section-subtitle">Agende sua consulta gratuita e descubra como podemos ajudar você.</p>
            </div>
            
            <div class="contact-content">
                <div class="contact-info">
                    <h3>Informações de Contato</h3>
                    <p>Entre em contato conosco através dos canais abaixo ou preencha o formulário.</p>
                    
                    <div class="contact-items">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                                </svg>
                            </div>
                            <div class="contact-details">
                                <h4>Telefone</h4>
                                <p><?php echo esc_html(get_theme_mod('mbo_contact_phone', '(31) 9999-9999')); ?></p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.89 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                            </div>
                            <div class="contact-details">
                                <h4>E-mail</h4>
                                <p><?php echo esc_html(get_theme_mod('mbo_contact_email', 'contato@mboadvocacia.com.br')); ?></p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/>
                                    <path d="M12.5 7H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                                </svg>
                            </div>
                            <div class="contact-details">
                                <h4>Horário de Atendimento</h4>
                                <p><?php echo esc_html(get_theme_mod('mbo_contact_hours', 'Segunda a Sexta: 8h às 18h')); ?></p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                            </div>
                            <div class="contact-details">
                                <h4>Localização</h4>
                                <p><?php echo esc_html(get_theme_mod('mbo_contact_location', 'Belo Horizonte - MG')); ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Google Maps -->
                    <div class="contact-map">
                        <iframe 
                            src="<?php echo esc_url(get_theme_mod('mbo_google_maps_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3751.8984!2d-43.9378!3d-19.9167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTnCsDU1JzAwLjEiUyA0M8KwNTYnMTYuMSJX!5e0!3m2!1spt-BR!2sbr!4v1234567890123')); ?>"
                            width="100%" 
                            height="250" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
                
                <div class="contact-form">
                    <h3>Envie sua Mensagem</h3>
                    <p>Preencha o formulário abaixo e entraremos em contato em breve.</p>
                    
                    <?php if (isset($_GET['contact'])): ?>
                        <?php if ($_GET['contact'] == 'success'): ?>
                            <div class="contact-message success">
                                <p>✅ <strong>Mensagem enviada com sucesso!</strong> Entraremos em contato em breve.</p>
                            </div>
                        <?php elseif ($_GET['contact'] == 'error'): ?>
                            <div class="contact-message error">
                                <p>❌ <strong>Erro ao enviar mensagem.</strong> Tente novamente ou entre em contato por telefone.</p>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                    <form class="contact-form-wrapper" method="post" action="">
                        <?php wp_nonce_field('mbo_contact_form', 'mbo_contact_nonce'); ?>
                        
                        <div class="form-group">
                            <label for="contact-name">Nome Completo</label>
                            <input type="text" id="contact-name" name="contact_name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-email">E-mail</label>
                            <input type="email" id="contact-email" name="contact_email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-phone">Telefone</label>
                            <input type="tel" id="contact-phone" name="contact_phone">
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-subject">Assunto</label>
                            <select id="contact-subject" name="contact_subject" required>
                                <option value="">Selecione um assunto</option>
                                <option value="planos-saude">Planos de Saúde</option>
                                <option value="direito-medico">Direito Médico</option>
                                <option value="direito-consumidor">Direito do Consumidor</option>
                                <option value="consultoria">Consultoria Jurídica</option>
                                <option value="outros">Outros</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-message">Mensagem</label>
                            <textarea id="contact-message" name="contact_message" rows="5" required placeholder="Descreva sua situação ou dúvida..."></textarea>
                        </div>
                        
                        <button type="submit" name="submit_contact" class="btn-submit">
                            Enviar Mensagem
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Últimas Notícias -->
    <section class="news-section">
        <div class="container">
            <div class="news-header">
                <h2 class="section-title">Últimas Notícias</h2>
                <p class="section-subtitle">Fique por dentro das novidades do Direito da Saúde</p>
            </div>
            
            <div class="news-grid">
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 3,
                    'post_status' => 'publish'
                ));
                
                if (!empty($recent_posts)) :
                    foreach ($recent_posts as $post) :
                        $post_id = $post['ID'];
                        $post_title = $post['post_title'];
                        $post_excerpt = wp_trim_words($post['post_content'], 20, '...');
                        $post_date = date('d/m/Y', strtotime($post['post_date']));
                        $post_url = get_permalink($post_id);
                        $post_thumbnail = get_the_post_thumbnail_url($post_id, 'medium');
                ?>
                <article class="news-card">
                    <?php if ($post_thumbnail) : ?>
                    <div class="news-image">
                        <img src="<?php echo esc_url($post_thumbnail); ?>" alt="<?php echo esc_attr($post_title); ?>">
                    </div>
                    <?php else : ?>
                    <div class="news-image news-placeholder">
                        <div class="placeholder-icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                            </svg>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-date"><?php echo esc_html($post_date); ?></span>
                        </div>
                        <h3 class="news-title">
                            <a href="<?php echo esc_url($post_url); ?>"><?php echo esc_html($post_title); ?></a>
                        </h3>
                        <p class="news-excerpt"><?php echo esc_html($post_excerpt); ?></p>
                        <a href="<?php echo esc_url($post_url); ?>" class="news-link">
                            Leia mais
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/>
                            </svg>
                        </a>
                    </div>
                </article>
                <?php 
                    endforeach;
                else : 
                    // Dados de exemplo quando não há posts publicados
                    $example_news = array(
                        array(
                            'title' => 'Novos Direitos dos Pacientes em Planos de Saúde',
                            'excerpt' => 'Entenda as mudanças na legislação que ampliam os direitos dos beneficiários de planos de saúde e como isso impacta seu atendimento médico.',
                            'date' => date('d/m/Y'),
                            'image' => false
                        ),
                        array(
                            'title' => 'STJ Define Critérios para Cobertura de Tratamentos',
                            'excerpt' => 'Superior Tribunal de Justiça estabelece novos parâmetros para obrigatoriedade de cobertura de procedimentos médicos pelos planos de saúde.',
                            'date' => date('d/m/Y', strtotime('-3 days')),
                            'image' => false
                        ),
                        array(
                            'title' => 'Direito à Saúde: Avanços na Jurisprudência',
                            'excerpt' => 'Análise das principais decisões judiciais recentes que fortalecem o direito fundamental à saúde no Brasil.',
                            'date' => date('d/m/Y', strtotime('-7 days')),
                            'image' => false
                        )
                    );
                    
                    foreach ($example_news as $news) :
                ?>
                <article class="news-card">
                    <div class="news-image news-placeholder">
                        <div class="placeholder-icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-date"><?php echo esc_html($news['date']); ?></span>
                        </div>
                        <h3 class="news-title">
                            <a href="#" onclick="return false;"><?php echo esc_html($news['title']); ?></a>
                        </h3>
                        <p class="news-excerpt"><?php echo esc_html($news['excerpt']); ?></p>
                        <a href="#" onclick="return false;" class="news-link">
                            Leia mais
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/>
                            </svg>
                        </a>
                    </div>
                </article>
                <?php 
                    endforeach;
                endif; ?>
            </div>
            
            <div class="news-footer">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn-view-all">
                    Ver Todas as Notícias
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

</main><!-- #main -->

<?php get_footer(); ?>

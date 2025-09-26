<?php get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            
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
                    <a href="#contato" class="btn btn-primary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 5C3 3.89543 3.89543 3 5 3H8.27924C8.70967 3 9.09181 3.27543 9.22792 3.68377L10.7257 8.17721C10.8831 8.64932 10.6694 9.16531 10.2243 9.38787L7.96701 10.5165C9.06925 12.9612 11.0388 14.9308 13.4835 16.033L14.6121 13.7757C14.8347 13.3306 15.3507 13.1169 15.8228 13.2743L20.3162 14.7721C20.7246 14.9082 21 15.2903 21 15.7208V19C21 20.1046 20.1046 21 19 21H18C9.71573 21 3 14.2843 3 6V5Z" fill="currentColor"/>
                        </svg>
                        <?php echo esc_html(get_theme_mod('mbo_primary_button_text', 'Consulta Gratuita')); ?>
                    </a>
                    
                    <a href="#sobre" class="btn btn-secondary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="currentColor" stroke-width="2" fill="none"/>
                            <path d="M22 6L12 13L2 6" stroke="currentColor" stroke-width="2" fill="none"/>
                        </svg>
                        <?php echo esc_html(get_theme_mod('mbo_secondary_button_text', 'Fale Conosco')); ?>
                    </a>
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
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 3H5C3.89543 3 3 3.89543 3 5V19C3 20.1046 3.89543 21 5 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 9H15M9 13H15M9 17H13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 12H18L15 21L9 3L6 12H2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 21V19C16 17.9391 15.5786 16.9217 14.8284 16.1716C14.0783 15.4214 13.0609 15 12 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="8.5" cy="7" r="4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23 21V19C23 18.1332 22.7361 17.2863 22.2416 16.5555C21.747 15.8248 21.0421 15.2426 20.2175 14.8717" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 18.9078 6.11683 18.7176 6.95013C18.5274 7.78343 18.0644 8.53234 17.4021 9.06558C16.7398 9.59882 15.9129 9.88823 15.06 9.88823" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21 7L12 13L3 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7 3H17L21 7H3L7 3Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 2V8H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16 13H8M16 17H8M10 9H8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.09 9C9.3251 8.33167 9.78915 7.76811 10.4 7.40913C11.0108 7.05016 11.7289 6.91894 12.4272 7.03871C13.1255 7.15849 13.7588 7.52152 14.2151 8.06353C14.6713 8.60553 14.9211 9.29152 14.92 10C14.92 12 11.92 13 11.92 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 17H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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

    <section id="contato" class="py-5">
        <div class="container">
            <h2>Contato</h2>
            <p>Adicione aqui as informações de contato ou um formulário. Você pode editar este texto no arquivo front-page.php.</p>
        </div>
    </section>

</main><!-- #main -->

<?php get_footer(); ?>

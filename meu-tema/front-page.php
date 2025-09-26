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

    <!-- Seções Adicionais -->
    <section id="sobre" class="py-5">
        <div class="container">
            <h2>Sobre</h2>
            <p>Adicione aqui o conteúdo da seção Sobre. Você pode editar este texto no arquivo front-page.php.</p>
        </div>
    </section>

    <section id="servicos" class="py-5 bg-light">
        <div class="container">
            <h2>Serviços</h2>
            <p>Adicione aqui o conteúdo da seção Serviços. Você pode editar este texto no arquivo front-page.php.</p>
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

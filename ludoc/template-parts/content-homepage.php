<?php
/**
 * Template part for displaying homepage content
 */
?>

<div class="homepage-hero">
    <div class="container">
        <h1><?php echo esc_html(ludoc_get_translated_string('hero_title', 'Transforme sua Visão em Realidade Digital')); ?></h1>
        <p><?php echo esc_html(ludoc_get_translated_string('hero_subtitle', 'Soluções digitais personalizadas para o sucesso do seu negócio')); ?></p>
        <div class="hero-buttons">
            <a href="#contact" class="button primary"><?php echo esc_html(ludoc_get_translated_string('hero_cta_primary', 'Comece Agora')); ?></a>
            <a href="#portfolio" class="button secondary"><?php echo esc_html(ludoc_get_translated_string('hero_cta_secondary', 'Ver Portfólio')); ?></a>
        </div>
    </div>
</div>

<section id="services" class="section services">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html(ludoc_get_translated_string('services_title', 'Nossos Serviços')); ?></h2>
        <div class="grid services-grid">
            <?php
            $services = array(
                array(
                    'icon' => 'desktop',
                    'title' => 'Web Design',
                    'description' => 'Sites modernos e responsivos'
                ),
                array(
                    'icon' => 'shopping-cart',
                    'title' => 'E-commerce',
                    'description' => 'Lojas virtuais otimizadas'
                ),
                array(
                    'icon' => 'mobile-alt',
                    'title' => 'Apps',
                    'description' => 'Aplicativos personalizados'
                ),
                array(
                    'icon' => 'chart-line',
                    'title' => 'Marketing Digital',
                    'description' => 'Estratégias completas'
                )
            );

            foreach ($services as $service) : ?>
                <div class="service-card">
                    <i class="fas fa-<?php echo esc_attr($service['icon']); ?>"></i>
                    <h3><?php echo esc_html(ludoc_get_translated_string('service_' . $service['title'], $service['title'])); ?></h3>
                    <p><?php echo esc_html(ludoc_get_translated_string('service_' . $service['title'] . '_desc', $service['description'])); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="contact" class="section contact">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html(ludoc_get_translated_string('contact_title', 'Entre em Contato')); ?></h2>
        <div class="contact-wrapper">
            <div class="contact-form">
                <?php echo do_shortcode('[contact-form-7 id="contact-form"]'); ?>
            </div>
            <div class="contact-info">
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <p><?php echo esc_html(get_theme_mod('contact_email', 'contato@exemplo.com')); ?></p>
                </div>
                <div class="info-item">
                    <i class="fas fa-phone"></i>
                    <p><?php echo esc_html(get_theme_mod('contact_phone', '+55 11 9999-9999')); ?></p>
                </div>
                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <p><?php echo esc_html(get_theme_mod('contact_address', 'São Paulo, SP')); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
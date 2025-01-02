<?php
/**
 * Template Name: Homepage
 * 
 * Template para a página inicial do site
 */

get_header();
?>

<div class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title"><?php echo ludoc_get_translated_string('hero_title', 'Transforme sua Presença Digital'); ?></h1>
            <p class="hero-description">
                <?php echo ludoc_get_translated_string('hero_description', 'Websites modernos, responsivos e otimizados para seus objetivos de negócio.'); ?>
            </p>
            <a href="#contact" class="button button-primary"><?php esc_html_e('Solicite um Orçamento', 'ludoc'); ?></a>
        </div>
    </div>
</div>

<section class="services-section">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e('Nossos Serviços', 'ludoc'); ?></h2>
        <div class="services-grid">
            <div class="card service-card">
                <i class="fas fa-laptop-code"></i>
                <h3><?php esc_html_e('Desenvolvimento Web', 'ludoc'); ?></h3>
                <p><?php esc_html_e('Sites profissionais e sistemas web personalizados para sua empresa.', 'ludoc'); ?></p>
            </div>
            <div class="card service-card">
                <i class="fas fa-mobile-alt"></i>
                <h3><?php esc_html_e('Design Responsivo', 'ludoc'); ?></h3>
                <p><?php esc_html_e('Layouts adaptáveis que funcionam perfeitamente em qualquer dispositivo.', 'ludoc'); ?></p>
            </div>
            <div class="card service-card">
                <i class="fas fa-search"></i>
                <h3><?php esc_html_e('Otimização SEO', 'ludoc'); ?></h3>
                <p><?php esc_html_e('Melhore seu posicionamento nos motores de busca.', 'ludoc'); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="portfolio-section">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e('Projetos Recentes', 'ludoc'); ?></h2>
        <div class="portfolio-grid">
            <?php
            $portfolio_query = new WP_Query(array(
                'post_type' => 'portfolio',
                'posts_per_page' => 6
            ));

            if ($portfolio_query->have_posts()) :
                while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                    get_template_part('template-parts/content', 'portfolio');
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<section id="contact" class="contact-section">
    <div class="container">
        <div class="card contact-card">
            <h2 class="section-title"><?php esc_html_e('Entre em Contato', 'ludoc'); ?></h2>
            <div class="contact-form">
                <?php echo do_shortcode('[contact-form-7 id="123" title="Formulário de Contato"]'); ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
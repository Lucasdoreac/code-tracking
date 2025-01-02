<?php
/**
 * Template Name: Contato
 * 
 * Template para a página de contato
 */

get_header();
?>

<div class="contact-page">
    <div class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title"><?php the_title(); ?></h1>
                <p class="hero-description"><?php echo get_the_excerpt(); ?></p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="contact-content">
            <div class="contact-info-grid">
                <div class="card contact-info">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3><?php esc_html_e('Endereço', 'ludoc'); ?></h3>
                    <p><?php echo esc_html(get_theme_mod('contact_address', 'Rua Exemplo, 123 - São Paulo, SP')); ?></p>
                </div>

                <div class="card contact-info">
                    <i class="fas fa-phone"></i>
                    <h3><?php esc_html_e('Telefone', 'ludoc'); ?></h3>
                    <p><a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone', '+55 11 9999-9999')); ?>">
                        <?php echo esc_html(get_theme_mod('contact_phone', '+55 11 9999-9999')); ?>
                    </a></p>
                </div>

                <div class="card contact-info">
                    <i class="fas fa-envelope"></i>
                    <h3><?php esc_html_e('Email', 'ludoc'); ?></h3>
                    <p><a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'contato@ludoc.com.br')); ?>">
                        <?php echo esc_html(get_theme_mod('contact_email', 'contato@ludoc.com.br')); ?>
                    </a></p>
                </div>

                <div class="card contact-info">
                    <i class="fas fa-clock"></i>
                    <h3><?php esc_html_e('Horário de Atendimento', 'ludoc'); ?></h3>
                    <p><?php echo esc_html(get_theme_mod('contact_hours', 'Segunda a Sexta: 9h às 18h')); ?></p>
                </div>
            </div>

            <div class="contact-form-section">
                <div class="card contact-form-card">
                    <h2><?php esc_html_e('Envie sua Mensagem', 'ludoc'); ?></h2>
                    <p><?php esc_html_e('Preencha o formulário abaixo e entraremos em contato o mais breve possível.', 'ludoc'); ?></p>
                    
                    <div class="contact-form">
                        <?php echo do_shortcode('[contact-form-7 id="123" title="Formulário de Contato"]'); ?>
                    </div>
                </div>

                <div class="social-media-section">
                    <h3><?php esc_html_e('Siga-nos nas Redes Sociais', 'ludoc'); ?></h3>
                    <div class="social-links">
                        <?php
                        $social_networks = array(
                            'facebook' => get_theme_mod('social_facebook', '#'),
                            'instagram' => get_theme_mod('social_instagram', '#'),
                            'linkedin' => get_theme_mod('social_linkedin', '#'),
                            'github' => get_theme_mod('social_github', '#')
                        );

                        foreach ($social_networks as $network => $url) :
                            if ($url && $url !== '#') :
                        ?>
                            <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-<?php echo esc_attr($network); ?>"></i>
                            </a>
                        <?php 
                            endif;
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>

            <div class="map-section">
                <div class="card map-card">
                    <div class="map-wrapper">
                        <?php echo get_theme_mod('contact_map_embed', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m..." width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
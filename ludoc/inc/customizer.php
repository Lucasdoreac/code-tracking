<?php
/**
 * Personalizador do tema Ludoc
 */

if (!defined('ABSPATH')) {
    exit;
}

function ludoc_customize_register($wp_customize) {
    // Seção de Identidade do Site
    $wp_customize->add_section('ludoc_site_identity', array(
        'title' => esc_html__('Identidade do Site', 'ludoc'),
        'priority' => 20,
    ));

    // Seção de Cores
    $wp_customize->add_section('ludoc_colors', array(
        'title' => esc_html__('Cores do Tema', 'ludoc'),
        'priority' => 30,
    ));

    // Cor Primária
    $wp_customize->add_setting('primary_color', array(
        'default' => '#2c3e50',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => esc_html__('Cor Primária', 'ludoc'),
        'section' => 'ludoc_colors',
    )));

    // Cor Secundária
    $wp_customize->add_setting('secondary_color', array(
        'default' => '#3498db',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label' => esc_html__('Cor Secundária', 'ludoc'),
        'section' => 'ludoc_colors',
    )));

    // Seção do Rodapé
    $wp_customize->add_section('ludoc_footer', array(
        'title' => esc_html__('Configurações do Rodapé', 'ludoc'),
        'priority' => 90,
    ));

    // Texto de Copyright
    $wp_customize->add_setting('copyright_text', array(
        'default' => '© ' . date('Y') . ' Ludoc. ' . esc_html__('Todos os direitos reservados.', 'ludoc'),
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('copyright_text', array(
        'label' => esc_html__('Texto de Copyright', 'ludoc'),
        'section' => 'ludoc_footer',
        'type' => 'textarea',
    ));

    // Texto do Rodapé
    $wp_customize->add_setting('footer_text', array(
        'default' => esc_html__('Desenvolvido com ♥ pela equipe Ludoc', 'ludoc'),
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('footer_text', array(
        'label' => esc_html__('Texto do Rodapé', 'ludoc'),
        'section' => 'ludoc_footer',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'ludoc_customize_register');

// Gera CSS personalizado com base nas configurações do personalizador
function ludoc_customizer_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo get_theme_mod('primary_color', '#2c3e50'); ?>;
            --secondary-color: <?php echo get_theme_mod('secondary_color', '#3498db'); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'ludoc_customizer_css');
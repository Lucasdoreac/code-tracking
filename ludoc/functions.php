<?php
/**
 * Funções principais do tema Ludoc
 */

if (!defined('ABSPATH')) {
    exit; // Saída se acessado diretamente
}

// Configurações do tema
if (!function_exists('ludoc_setup')):
    function ludoc_setup() {
        // Suporte para tradução
        load_theme_textdomain('ludoc', get_template_directory() . '/languages');

        // Recursos do tema
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script'
        ));
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('custom-logo');
        add_theme_support('elementor');
        add_theme_support('woocommerce');
    }
endif;
add_action('after_setup_theme', 'ludoc_setup');

// Registro de menus
function ludoc_register_menus() {
    register_nav_menus(array(
        'primary' => esc_html__('Menu Principal', 'ludoc'),
        'footer' => esc_html__('Menu Rodapé', 'ludoc')
    ));
}
add_action('init', 'ludoc_register_menus');

// Enfileiramento de scripts e estilos
function ludoc_enqueue_scripts() {
    wp_enqueue_style('ludoc-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('ludoc-templates', get_template_directory_uri() . '/assets/css/templates.css', array(), '1.0.0');
    wp_enqueue_style('ludoc-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0.0');
    wp_enqueue_style('ludoc-services', get_template_directory_uri() . '/assets/css/services.css', array(), '1.0.0');
    wp_enqueue_script('ludoc-dark-mode', get_template_directory_uri() . '/assets/js/dark-mode.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('ludoc-responsive-menu', get_template_directory_uri() . '/assets/js/responsive-menu.js', array('jquery'), '1.0.0', true);
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4');
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null);
}
add_action('wp_enqueue_scripts', 'ludoc_enqueue_scripts');

// Incluir arquivos necessários
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/dark-mode.php';
require get_template_directory() . '/inc/multilingual.php';
require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/theme-options.php';
require get_template_directory() . '/inc/google-login.php';

// Largura do conteúdo
if (!isset($content_width)) {
    $content_width = 1200;
}

// Widgets
function ludoc_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Barra Lateral', 'ludoc'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Adicione widgets aqui.', 'ludoc'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'ludoc_widgets_init');

// Elementor Hooks
function ludoc_elementor_setup() {
    update_option('elementor_disable_color_schemes', true);
    update_option('elementor_disable_typography_schemes', true);
    update_option('elementor_page_title_selector', 'h1.entry-title');
    update_option('elementor_default_generic_fonts', 'Inter');
}
add_action('after_switch_theme', 'ludoc_elementor_setup');
<?php
/**
 * Implementação do modo escuro
 */

if (!defined('ABSPATH')) {
    exit;
}

// Adiciona scripts do modo escuro
function ludoc_dark_mode_scripts() {
    wp_enqueue_script('ludoc-dark-mode', get_template_directory_uri() . '/assets/js/dark-mode.js', array('jquery'), '1.0.0', true);
    
    // Localize script para tradução
    wp_localize_script('ludoc-dark-mode', 'ludocDarkMode', array(
        'switchLabel' => esc_html__('Alternar modo escuro', 'ludoc')
    ));
}
add_action('wp_enqueue_scripts', 'ludoc_dark_mode_scripts');

// Adiciona botão de alternância do modo escuro no cabeçalho
function ludoc_dark_mode_switch() {
    // Don't show the dark mode toggle in Elementor editor
    if (class_exists('\Elementor\Plugin') && \Elementor\Plugin::$instance->editor->is_edit_mode()) {
        return;
    }
    ?>
    <button id="dark-mode-toggle" class="dark-mode-toggle" aria-label="<?php esc_attr_e('Alternar modo escuro', 'ludoc'); ?>">
        <svg class="sun-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path d="M12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.65 0-3 1.35-3 3s1.35 3 3 3 3-1.35 3-3-1.35-3-3-3z"/>
            <path d="M12 1v2m0 18v2M4.22 4.22l1.42 1.42m12.72 12.72l1.42 1.42M1 12h2m18 0h2M4.22 19.78l1.42-1.42m12.72-12.72l1.42-1.42"/>
        </svg>
        <svg class="moon-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"/>
        </svg>
    </button>
    <?php
}
add_action('wp_body_open', 'ludoc_dark_mode_switch');

// Adiciona classe ao body quando modo escuro está ativo
function ludoc_dark_mode_body_class($classes) {
    if (isset($_COOKIE['darkMode']) && $_COOKIE['darkMode'] === 'true') {
        $classes[] = 'dark-mode';
    }
    return $classes;
}
add_filter('body_class', 'ludoc_dark_mode_body_class');
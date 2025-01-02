<?php
/**
 * Suporte multilíngue
 */

if (!defined('ABSPATH')) {
    exit;
}

// Verifica se WPML está ativo
function ludoc_is_wpml_active() {
    return defined('ICL_SITEPRESS_VERSION');
}

// Verifica se Polylang está ativo
function ludoc_is_polylang_active() {
    return defined('POLYLANG_VERSION');
}

// Registra strings para tradução
function ludoc_register_strings() {
    if (ludoc_is_wpml_active()) {
        // Registra strings para WPML
        do_action('wpml_register_single_string', 'ludoc', 'copyright_text', get_theme_mod('copyright_text'));
        do_action('wpml_register_single_string', 'ludoc', 'footer_text', get_theme_mod('footer_text'));
    } elseif (ludoc_is_polylang_active() && function_exists('pll_register_string')) {
        // Registra strings para Polylang
        pll_register_string('copyright_text', get_theme_mod('copyright_text'), 'ludoc');
        pll_register_string('footer_text', get_theme_mod('footer_text'), 'ludoc');
    }
}
add_action('after_setup_theme', 'ludoc_register_strings');

// Obtém string traduzida
function ludoc_get_translated_string($string_name, $default = '') {
    if (ludoc_is_wpml_active()) {
        return apply_filters('wpml_translate_single_string', get_theme_mod($string_name, $default), 'ludoc', $string_name);
    } elseif (ludoc_is_polylang_active() && function_exists('pll__')) {
        return pll__(get_theme_mod($string_name, $default));
    }
    return get_theme_mod($string_name, $default);
}

// Adiciona seletor de idioma no cabeçalho
function ludoc_language_selector() {
    if (ludoc_is_wpml_active()) {
        do_action('wpml_add_language_selector');
    } elseif (ludoc_is_polylang_active() && function_exists('pll_the_languages')) {
        pll_the_languages(array('show_flags' => 1, 'show_names' => 1));
    }
}
add_action('ludoc_header_right', 'ludoc_language_selector');
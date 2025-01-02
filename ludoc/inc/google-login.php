<?php
if (!defined('ABSPATH')) {
    exit;
}

// Registrar configurações do Google Login
function ludoc_google_login_settings() {
    register_setting('ludoc_options', 'ludoc_google_client_id');
    register_setting('ludoc_options', 'ludoc_google_client_secret');
}
add_action('admin_init', 'ludoc_google_login_settings');

// Adicionar campos nas opções do tema
function ludoc_google_login_fields() {
    add_settings_section(
        'ludoc_google_login_section',
        __('Configurações do Login Google', 'ludoc'),
        'ludoc_google_login_section_callback',
        'ludoc_options'
    );

    add_settings_field(
        'ludoc_google_client_id',
        __('Client ID', 'ludoc'),
        'ludoc_google_client_id_callback',
        'ludoc_options',
        'ludoc_google_login_section'
    );

    add_settings_field(
        'ludoc_google_client_secret',
        __('Client Secret', 'ludoc'),
        'ludoc_google_client_secret_callback',
        'ludoc_options',
        'ludoc_google_login_section'
    );
}
add_action('admin_init', 'ludoc_google_login_fields');

// Callbacks
function ludoc_google_login_section_callback() {
    echo '<p>' . __('Configure suas credenciais do Google OAuth para habilitar o login social.', 'ludoc') . '</p>';
}

function ludoc_google_client_id_callback() {
    $client_id = get_option('ludoc_google_client_id');
    echo '<input type="text" name="ludoc_google_client_id" value="' . esc_attr($client_id) . '" class="regular-text">';
}

function ludoc_google_client_secret_callback() {
    $client_secret = get_option('ludoc_google_client_secret');
    echo '<input type="text" name="ludoc_google_client_secret" value="' . esc_attr($client_secret) . '" class="regular-text">';
}

// Adicionar botão de login do Google
function ludoc_add_google_login_button() {
    if (!is_user_logged_in()) {
        ?>
        <div class="google-login-container">
            <a href="<?php echo esc_url(wp_login_url()); ?>?google_login=1" class="google-login-button">
                <svg class="google-icon" viewBox="0 0 24 24">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                <?php _e('Entrar com Google', 'ludoc'); ?>
            </a>
        </div>
        <?php
    }
}
add_action('login_form', 'ludoc_add_google_login_button');
add_action('register_form', 'ludoc_add_google_login_button');
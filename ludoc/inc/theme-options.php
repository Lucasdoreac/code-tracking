<?php
/**
 * Opções do tema
 */

if (!defined('ABSPATH')) {
    exit;
}

// Registra as opções do tema
function ludoc_register_theme_options() {
    // Opções da página inicial
    add_option('ludoc_hero_title', 'Transforme sua Presença Digital');
    add_option('ludoc_hero_description', 'Websites modernos, responsivos e otimizados para seus objetivos de negócio.');
    
    // Opções do rodapé
    add_option('ludoc_footer_text', 'Desenvolvido com ♥ pela equipe Ludoc');
    add_option('ludoc_copyright_text', '© ' . date('Y') . ' Ludoc. Todos os direitos reservados.');
}
add_action('after_switch_theme', 'ludoc_register_theme_options');

// Página de opções do tema no admin
function ludoc_add_theme_options_page() {
    add_menu_page(
        __('Opções do Tema', 'ludoc'),
        __('Ludoc Opções', 'ludoc'),
        'manage_options',
        'ludoc-options',
        'ludoc_theme_options_page',
        'dashicons-admin-customizer',
        60
    );
}
add_action('admin_menu', 'ludoc_add_theme_options_page');

// Renderiza a página de opções
function ludoc_theme_options_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

    if (isset($_POST['ludoc_options_nonce']) && wp_verify_nonce($_POST['ludoc_options_nonce'], 'ludoc_save_options')) {
        // Salva as opções
        $options = array(
            'ludoc_hero_title',
            'ludoc_hero_description',
            'ludoc_footer_text',
            'ludoc_copyright_text'
        );

        foreach ($options as $option) {
            if (isset($_POST[$option])) {
                update_option($option, wp_kses_post($_POST[$option]));
            }
        }

        add_settings_error(
            'ludoc_messages',
            'ludoc_options_updated',
            __('Opções atualizadas com sucesso!', 'ludoc'),
            'updated'
        );
    }

    settings_errors('ludoc_messages');
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="" method="post">
            <?php wp_nonce_field('ludoc_save_options', 'ludoc_options_nonce'); ?>
            
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="ludoc_hero_title"><?php esc_html_e('Título do Hero', 'ludoc'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="ludoc_hero_title" name="ludoc_hero_title" class="regular-text"
                               value="<?php echo esc_attr(get_option('ludoc_hero_title')); ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="ludoc_hero_description"><?php esc_html_e('Descrição do Hero', 'ludoc'); ?></label>
                    </th>
                    <td>
                        <textarea id="ludoc_hero_description" name="ludoc_hero_description" class="large-text" rows="3"
                        ><?php echo esc_textarea(get_option('ludoc_hero_description')); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="ludoc_footer_text"><?php esc_html_e('Texto do Rodapé', 'ludoc'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="ludoc_footer_text" name="ludoc_footer_text" class="regular-text"
                               value="<?php echo esc_attr(get_option('ludoc_footer_text')); ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="ludoc_copyright_text"><?php esc_html_e('Texto de Copyright', 'ludoc'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="ludoc_copyright_text" name="ludoc_copyright_text" class="regular-text"
                               value="<?php echo esc_attr(get_option('ludoc_copyright_text')); ?>">
                    </td>
                </tr>
            </table>
            
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
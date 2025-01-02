<?php
/**
 * Registro de tipos de post personalizados
 */

if (!defined('ABSPATH')) {
    exit;
}

// Registra o tipo de post Portfolio
function ludoc_register_portfolio_post_type() {
    $labels = array(
        'name'                  => _x('Portfólio', 'Post Type General Name', 'ludoc'),
        'singular_name'         => _x('Projeto', 'Post Type Singular Name', 'ludoc'),
        'menu_name'            => __('Portfólio', 'ludoc'),
        'name_admin_bar'       => __('Projeto', 'ludoc'),
        'archives'             => __('Arquivo de Projetos', 'ludoc'),
        'attributes'           => __('Atributos do Projeto', 'ludoc'),
        'parent_item_colon'    => __('Projeto Pai:', 'ludoc'),
        'all_items'            => __('Todos os Projetos', 'ludoc'),
        'add_new_item'         => __('Adicionar Novo Projeto', 'ludoc'),
        'add_new'              => __('Adicionar Novo', 'ludoc'),
        'new_item'             => __('Novo Projeto', 'ludoc'),
        'edit_item'            => __('Editar Projeto', 'ludoc'),
        'update_item'          => __('Atualizar Projeto', 'ludoc'),
        'view_item'            => __('Ver Projeto', 'ludoc'),
        'view_items'           => __('Ver Projetos', 'ludoc'),
        'search_items'         => __('Procurar Projeto', 'ludoc'),
    );

    $args = array(
        'label'               => __('Portfólio', 'ludoc'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-portfolio',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
    );

    register_post_type('portfolio', $args);
}
add_action('init', 'ludoc_register_portfolio_post_type');

// Registra taxonomias para o Portfolio
function ludoc_register_portfolio_taxonomies() {
    // Categoria de Portfólio
    $labels = array(
        'name'              => _x('Categorias', 'taxonomy general name', 'ludoc'),
        'singular_name'     => _x('Categoria', 'taxonomy singular name', 'ludoc'),
        'search_items'      => __('Procurar Categorias', 'ludoc'),
        'all_items'         => __('Todas as Categorias', 'ludoc'),
        'parent_item'       => __('Categoria Pai', 'ludoc'),
        'parent_item_colon' => __('Categoria Pai:', 'ludoc'),
        'edit_item'         => __('Editar Categoria', 'ludoc'),
        'update_item'       => __('Atualizar Categoria', 'ludoc'),
        'add_new_item'      => __('Adicionar Nova Categoria', 'ludoc'),
        'new_item_name'     => __('Nova Categoria', 'ludoc'),
        'menu_name'         => __('Categorias', 'ludoc'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'portfolio-category'),
        'show_in_rest'      => true,
    );

    register_taxonomy('portfolio_category', array('portfolio'), $args);

    // Tags de Portfólio
    $labels = array(
        'name'              => _x('Tags', 'taxonomy general name', 'ludoc'),
        'singular_name'     => _x('Tag', 'taxonomy singular name', 'ludoc'),
        'search_items'      => __('Procurar Tags', 'ludoc'),
        'all_items'         => __('Todas as Tags', 'ludoc'),
        'edit_item'         => __('Editar Tag', 'ludoc'),
        'update_item'       => __('Atualizar Tag', 'ludoc'),
        'add_new_item'      => __('Adicionar Nova Tag', 'ludoc'),
        'new_item_name'     => __('Nova Tag', 'ludoc'),
        'menu_name'         => __('Tags', 'ludoc'),
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'portfolio-tag'),
        'show_in_rest'      => true,
    );

    register_taxonomy('portfolio_tag', array('portfolio'), $args);
}
add_action('init', 'ludoc_register_portfolio_taxonomies');

// Adiciona campos personalizados para o Portfolio
function ludoc_add_portfolio_meta_boxes() {
    add_meta_box(
        'portfolio_details',
        __('Detalhes do Projeto', 'ludoc'),
        'ludoc_portfolio_details_callback',
        'portfolio',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'ludoc_add_portfolio_meta_boxes');

function ludoc_portfolio_details_callback($post) {
    wp_nonce_field('ludoc_portfolio_details', 'ludoc_portfolio_details_nonce');

    $client = get_post_meta($post->ID, '_portfolio_client', true);
    $url = get_post_meta($post->ID, '_portfolio_url', true);
    $completion_date = get_post_meta($post->ID, '_portfolio_completion_date', true);

    ?>
    <div class="portfolio-fields">
        <p>
            <label for="portfolio_client"><?php esc_html_e('Cliente:', 'ludoc'); ?></label>
            <input type="text" id="portfolio_client" name="portfolio_client" value="<?php echo esc_attr($client); ?>" class="widefat">
        </p>
        <p>
            <label for="portfolio_url"><?php esc_html_e('URL do Projeto:', 'ludoc'); ?></label>
            <input type="url" id="portfolio_url" name="portfolio_url" value="<?php echo esc_url($url); ?>" class="widefat">
        </p>
        <p>
            <label for="portfolio_completion_date"><?php esc_html_e('Data de Conclusão:', 'ludoc'); ?></label>
            <input type="date" id="portfolio_completion_date" name="portfolio_completion_date" value="<?php echo esc_attr($completion_date); ?>" class="widefat">
        </p>
    </div>
    <?php
}

function ludoc_save_portfolio_details($post_id) {
    if (!isset($_POST['ludoc_portfolio_details_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['ludoc_portfolio_details_nonce'], 'ludoc_portfolio_details')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = array(
        'portfolio_client' => '_portfolio_client',
        'portfolio_url' => '_portfolio_url',
        'portfolio_completion_date' => '_portfolio_completion_date'
    );

    foreach ($fields as $field => $meta_key) {
        if (isset($_POST[$field])) {
            $value = sanitize_text_field($_POST[$field]);
            update_post_meta($post_id, $meta_key, $value);
        }
    }
}
add_action('save_post_portfolio', 'ludoc_save_portfolio_details');
<?php
/**
 * O template do cabeçalho do tema
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <div class="header-wrapper">
            <div class="site-branding">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                    <?php
                }
                ?>
            </div>

            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'primary-menu',
                    'container' => false,
                ));
                ?>
            </nav>

            <div class="header-right">
                <?php do_action('ludoc_header_right'); ?>
                <?php get_template_part('template-parts/dark-mode-toggle'); ?>
            </div>
        </div>
    </div>
</header>
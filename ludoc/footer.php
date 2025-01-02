<?php
/**
 * O template do rodapé do tema
 */
?>

<footer class="site-footer">
    <div class="container">
        <div class="footer-widgets">
            <div class="footer-widget-area">
                <?php dynamic_sidebar('footer-1'); ?>
            </div>
            <div class="footer-widget-area">
                <?php dynamic_sidebar('footer-2'); ?>
            </div>
            <div class="footer-widget-area">
                <?php dynamic_sidebar('footer-3'); ?>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-menu">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class' => 'footer-menu',
                    'container' => false,
                ));
                ?>
            </div>
            
            <div class="footer-info">
                <p class="copyright">
                    <?php echo ludoc_get_translated_string('copyright_text', '© ' . date('Y') . ' Ludoc. ' . esc_html__('Todos os direitos reservados.', 'ludoc')); ?>
                </p>
                <p class="footer-text">
                    <?php echo ludoc_get_translated_string('footer_text', esc_html__('Desenvolvido com ♥ pela equipe Ludoc', 'ludoc')); ?>
                </p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
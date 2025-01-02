<?php
/**
 * O template principal
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                endwhile;

                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => esc_html__('Anterior', 'ludoc'),
                    'next_text' => esc_html__('Próximo', 'ludoc'),
                ));
            else :
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </div>
    </main>
</div>

<?php
get_sidebar();
get_footer();
<?php
/**
 * Template Name: Portfolio Grid
 * 
 * This is the template that displays the portfolio in a grid layout.
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="portfolio-filters">
            <?php
            $terms = get_terms('portfolio_category');
            if ($terms && !is_wp_error($terms)) :
            ?>
                <ul class="filter-list">
                    <li><button class="filter-button active" data-filter="*"><?php _e('Todos', 'ludoc'); ?></button></li>
                    <?php foreach ($terms as $term) : ?>
                        <li><button class="filter-button" data-filter=".<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></button></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <div class="portfolio-grid">
            <?php
            $args = array(
                'post_type' => 'portfolio',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    get_template_part('template-parts/content', 'portfolio-item');
                endwhile;
                wp_reset_postdata();
            else :
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </div>
    </main>
</div>

<?php get_footer(); ?>
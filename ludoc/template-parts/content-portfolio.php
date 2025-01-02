<?php
/**
 * Template para exibir itens do portfólio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-item'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="portfolio-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="portfolio-content">
        <h3 class="portfolio-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        
        <?php if (get_field('client')) : ?>
            <p class="portfolio-client">
                <?php esc_html_e('Cliente:', 'ludoc'); ?> <?php the_field('client'); ?>
            </p>
        <?php endif; ?>

        <div class="portfolio-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="button button-primary">
            <?php esc_html_e('Ver Projeto', 'ludoc'); ?>
        </a>
    </div>
</article>
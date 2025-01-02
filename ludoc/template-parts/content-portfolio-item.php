<?php
/**
 * Template part for displaying portfolio items
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-item'); ?>>
    <div class="portfolio-thumbnail">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('ludoc-portfolio'); ?>
        <?php endif; ?>
        <div class="portfolio-overlay">
            <div class="portfolio-links">
                <a href="<?php the_permalink(); ?>" class="portfolio-link">
                    <i class="fas fa-link"></i>
                </a>
                <?php if (get_post_meta(get_the_ID(), 'portfolio_url', true)) : ?>
                    <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'portfolio_url', true)); ?>" class="portfolio-external-link" target="_blank">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <header class="entry-header">
        <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
    </header>

    <div class="entry-content">
        <?php
        $categories = get_the_terms(get_the_ID(), 'portfolio_category');
        if ($categories && !is_wp_error($categories)) :
        ?>
            <div class="portfolio-categories">
                <?php foreach ($categories as $category) : ?>
                    <span class="portfolio-category"><?php echo esc_html($category->name); ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="portfolio-excerpt">
            <?php the_excerpt(); ?>
        </div>
    </div>
</article>
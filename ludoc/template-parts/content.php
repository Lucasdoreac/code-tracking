<?php
/**
 * Template para exibir posts
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;

        if ('post' === get_post_type()) :
            ?>
            <div class="entry-meta">
                <?php
                ludoc_posted_on();
                ludoc_posted_by();
                ?>
            </div>
        <?php endif; ?>
    </header>

    <?php if (has_post_thumbnail() && !is_singular()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php
        if (is_singular()) :
            the_content(
                sprintf(
                    wp_kses(
                        __('Continue lendo<span class="screen-reader-text"> "%s"</span>', 'ludoc'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post(get_the_title())
                )
            );

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Páginas:', 'ludoc'),
                'after' => '</div>',
            ));
        else :
            the_excerpt();
            ?>
            <a href="<?php the_permalink(); ?>" class="read-more">
                <?php esc_html_e('Continuar lendo', 'ludoc'); ?>
            </a>
        <?php endif; ?>
    </div>

    <footer class="entry-footer">
        <?php ludoc_entry_footer(); ?>
    </footer>
</article>
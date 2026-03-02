<?php
if ( ! defined( 'ABSPATH' ) ) {
        exit;
}
$term = get_queried_object();
$thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
$image = wp_get_attachment_url($thumbnail_id);
get_header(); ?>
<?php if ( astra_page_layout() === 'left-sidebar' ) { ?>
        <?php get_sidebar(); ?>
<?php } ?>
	<div id="primary" <?php astra_primary_class(); ?> style="padding:0 40px;">
                <?php astra_primary_content_top(); ?>
                <?php if($image): ?>
                <div style="padding:30px 0 20px 0;">
                <img src="<?php echo esc_url($image); ?>" style="width:200px;height:200px;object-fit:cover;">
                </div>
                <?php endif; ?>
                <h1><?php echo $term->name; ?></h1>
                <p><?php echo $term->description; ?></p>
                <?php woocommerce_product_loop_start(); ?>
                <?php while ( have_posts() ) : the_post(); ?>
                        <?php wc_get_template_part( 'content', 'product' ); ?>
                <?php endwhile; ?>
                <?php woocommerce_product_loop_end(); ?>
                <?php astra_pagination(); ?>
                <?php astra_primary_content_bottom(); ?>
        </div><!-- #primary -->
<?php if ( astra_page_layout() === 'right-sidebar' ) { ?>
        <?php get_sidebar(); ?>
<?php } ?>
<?php get_footer(); ?>

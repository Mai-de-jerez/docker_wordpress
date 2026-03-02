<?php
/**
 * Template Name: Autores
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$per_page = 6;
$args = array(
    'taxonomy'   => 'product_brand',
    'hide_empty' => false,
    'number'     => $per_page,
    'offset'     => ( $paged - 1 ) * $per_page,
);
$terms = get_terms($args);
$total = wp_count_terms('product_brand');
$total_pages = ceil($total / $per_page);

get_header(); ?>

<div id="primary" <?php astra_primary_class(); ?>>
    <h1 style="margin-bottom:30px;">Autores</h1>
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:30px;">
    <?php foreach($terms as $term):
        $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
        $image = wp_get_attachment_url($thumbnail_id);
    ?>
    <div style="text-align:center;">
        <a href="<?php echo get_term_link($term); ?>">
            <?php if($image): ?>
            <img src="<?php echo esc_url($image); ?>" style="width:100%;height:300px;object-fit:cover;">
            <?php endif; ?>
            <h3><?php echo $term->name; ?></h3>
        </a>
    </div>
    <?php endforeach; ?>
    </div>

    <div style="margin-top:40px;text-align:center;">
        <?php for($i=1; $i<=$total_pages; $i++): ?>
        <a href="<?php echo get_pagenum_link($i); ?>" style="margin:0 5px;padding:8px 15px;border:1px solid #333;<?php echo ($i==$paged)?'background:#333;color:#fff;':'' ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</div>

<?php get_footer(); ?>

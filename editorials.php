<?php
/*
Template Name: Editorials
*/
?>

<?php get_header(); ?>

<?php // note: this is just index.php with the tag filter replaced
      // reusing the code sucks but there's not really a good way
      // to accomplish this crap in wordpress
?>

<img id="background" src="<?php echo site_url(); echo get_option('imageurl'); ?>">

<img id="logo" src="<?php bloginfo('template_url'); ?>/img/placeholderlogo.png">

<h2>Gather <em>Your</em> Party</h2>
<div id="strap">Editorials</div>

<section id="main">
    <div class="wrap">

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'tag__not_in' => convert_slug_to_id('bio'),
    'tag' => 'editorial',
    'posts_per_page' => 10,
    'paged' => $paged,
    'showposts' => 5,
    'offset' => (($paged-1)*10),
);
$wp_query = new WP_Query( $args ); // don't show user bios
$wp_query->is_archive = false; $wp_query->is_home = true;
while($wp_query->have_posts()) : $wp_query->the_post(); ?>

<?php get_template_part( 'frontpost', 'large' ); ?>

<?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query ?>

        <div class="older-articles">

<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'tag__not_in' => convert_slug_to_id('bio'),
    'tag' => 'editorial',
    'posts_per_page' => 10,
    'paged' => $paged,
    'showposts' => 5,
    'offset' => (($paged-1)*10)+6,
);

$wp_query = new WP_Query($args); // don't show user bios
$wp_query->is_archive = false; $wp_query->is_home = true;
while($wp_query->have_posts()) : $wp_query->the_post(); ?>

<?php get_template_part( 'frontpost', 'small' ); ?>


<?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query ?>

<?php get_template_part( 'pagination' ); ?>

        </div>

        
    <div id="sidebar" class="sidebar">
    <?php if ( is_active_sidebar( 'sidebar-front' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-front' ); ?>
    <?php endif; ?>
    </div>

    </div>

</section>

<?php get_footer(); ?>
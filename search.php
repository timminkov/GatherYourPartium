<?php get_header(); ?>

<img id="background" src="<?php echo site_url(); echo get_option('imageurl'); ?>">

<img id="logo" src="<?php bloginfo('template_url'); ?>/img/placeholderlogo.png">

<h2>Gather <em>Your</em> Party</h2>
<div id="strap">Search results for: <?php echo get_search_query(); ?></div>

<section id="main">
    <div class="wrap">

<?php $custom_query = new WP_Query(); // don't show user bios
while(have_posts()) : the_post(); ?>
<?php if (is_search() && ($post->post_type=='page')) continue; //excludes pages ?> 

<?php get_template_part( 'frontpost', 'large' ); ?>

<?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query ?>

<?php get_template_part( 'pagination' ); ?>

        </div>

    </div>

</section>

<?php get_footer(); ?>
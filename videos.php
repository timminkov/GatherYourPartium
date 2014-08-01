<?php
/*
Template Name: Videos
*/
$test = 'Videos'
?>

<?php get_header(); ?>

<?php get_template_part( 'partials/test' ); ?>

<section id="main">
  <div class="wrap">

    <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      $args = array(
          'tag__not_in' => convert_slug_to_id('bio'),
          'tag' => 'video',
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
            'tag' => 'video',
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

    <?php get_template_part( 'partials/sidebar' ); ?>
  </div>
</section>

<?php get_footer(); ?>

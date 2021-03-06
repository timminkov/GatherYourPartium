<?php get_header(); ?>

<img id="background" src="<?php bloginfo('template_url'); ?>/img/defaultbgv4.jpg">

<a href="<?php echo site_url(); ?>" class="title">
  <img id="logo" src="<?php bloginfo('template_url'); ?>/img/placeholderlogo.png">
</a>

<h2>Gather <em>Your</em> Party</h2>

<div id="strap">Just Video Games</div>

<section id="main">
  <div class="wrap">

    <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      $args = array(
          'tag__not_in' => convert_slug_to_id('bio'),
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
            'tag__not_in' => 'maden',
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

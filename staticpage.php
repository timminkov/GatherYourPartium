<?php
  /*
  Template Name: Static Page
  */
?>

<?php get_header(); ?>

<?php if(get_field('add-youtube-embed') == true) echo'<style>#logo, #strap, h2, .custom-image-head{visibility:hidden;}</style>'; ?>

<?php if (get_field('show-header-image') == true) echo "<section id=\"cover-image\">";?>
  <?php while ( have_posts() ) : the_post(); ?>
    <img id="<?php if (get_field('show-header-image') == true && (get_field('add-youtube-embed') != true)) echo "background-custom"; else echo "background"; ?>" src="<?php if (get_field('show-header-image') == true) {the_field('header-image-location'); } elseif (get_field('header-image-location') == false ) { echo site_url(); echo get_option('imageurl'); } ?>">
    <a href="<?php echo site_url(); ?>"><img id="logo" <?php if (get_field('show-header-image') == true) {echo "class=\"custom-image-logo\"";} ?> src="<?php bloginfo('template_url'); ?>/img/placeholderlogo.png"></a>
    <h2 <?php if(get_field('show-header-image') == true) {echo "class=\"custom-image-head\" ";} ?> > <?php the_field('header-title'); ?></h2>
    <div id="strap" <?php if (get_field('show-header-image') == true) {echo "class=\"custom-image-strap\" ";} ?> ><?php the_field('header-strap'); ?></div>
    <?php
      if (get_field('add-youtube-embed') != false)
        echo'<div id="video-player"> <div class="embed-container"> <iframe width="100%" height="100%" src="http://www.youtube.com/embed/iZNven6Nuzs?modestbranding=1&rel=0" frameborder="0"></iframe></div></div>';
    ?>
    </section>

    <section id="main">
      <article class="single-article" id="single-article">
        <?php the_content();?>
        <hr />

  <?php endwhile; ?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
  <?php dynamic_sidebar( 'sidebar-1' ); ?>
<?php endif; ?>


      </article>
    </section>

<?php get_footer(); ?>

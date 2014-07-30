<?php get_header(); ?>

<?php if(get_field('add-youtube-embed') == true) echo'<style> #logo, #strap, h2, .custom-image-head{ visibility:hidden; } @media all and (max-width: 650px) {  #video-player:not(#cover-image){display:none} #background:not(#cover-image){display:none} } </style>'; ?>
<?php if(get_field('show-header-image') != true && get_field('add-youtube-embed') == true) echo'<style>#logo, #strap, h2, .custom-image-head{ position: absolute; overflow: hidden; clip: rect(0 0 0 0); height: 1px; width: 1px; margin: -1px; padding: 0; border: 0;}</style>'; ?>

<?php if (get_field('show-header-image') == true) echo "<section id=\"cover-image\">";?>
    <?php while ( have_posts() ) : the_post(); ?>
    <img id="<?php if (get_field('show-header-image') == true && (get_field('add-youtube-embed') != true)) echo "background-custom"; else echo "background"; ?>" src="<?php if (get_field('show-header-image') == true) {the_field('header-image-location'); } elseif (get_field('header-image-location') == false ) {echo site_url(); echo get_option('imageurl'); } ?>">
    <a href="<?php echo site_url(); ?>"><img id="logo" <?php if (get_field('show-header-image') == true) {echo "class=\"custom-image-logo\"";} ?> src="<?php bloginfo('template_url'); ?>/img/placeholderlogo.png"></a>
    <h2 <?php if(get_field('show-header-image') == true) {echo "class=\"custom-image-head\" ";} ?> > <?php the_field('header-title'); ?></h2>
    <div id="strap" <?php if (get_field('show-header-image') == true) {echo "class=\"custom-image-strap\" ";} ?> ><?php the_field('header-strap'); ?></div>
    
    <?php
    if (get_field('add-youtube-embed') != false)
        echo'<div id="video-player"> <div class="embed-container"> <iframe width="100%" height="100%" src="http://www.youtube.com/embed/'.get_field('youtube-video-uri').'?modestbranding=1&rel=0" frameborder="0"></iframe></div></div>';
    ?>

</section>

<section id="main">
    <article class="single-article" id="single-article">

    <?php if (get_field('have-audio-player') == true) { $location = get_field("audio-ogg-location"); echo do_shortcode('[audio src="'.($location).'" preload="true"]'); } ?>

    <div id="mobile-audio"><?php if (get_field('have-audio-player') == true) { $location = get_field("audio-ogg-location"); echo '<audio src="'.($location).'" preload="auto" controls></audio>'; } ?></div>

    <?php if(get_field('add-youtube-embed') == true or (get_field('header-title') == false)) echo "<h3 class=\"youtube-title\">".get_the_title($ID)."</h3>"; ?>

    <h3 class="mobile-title"> <?php echo get_the_title($ID) ?> </h3>

    <?php if(get_field('add-youtube-embed') == true) echo '<div id="video-player-mobile"> <div class="embed-container"> <iframe width="100%" height="100%" src="http://www.youtube.com/embed/'.get_field('youtube-video-uri').'?modestbranding=1&rel=0" frameborder="0"></iframe></div></div>'; ?>

    <?php the_content();?>

    <!-- Some adblocks hide perfectly innocuous elements if you name them things like 'facebook'.
    Naughty! Here's my magic solution. N.B. -->

    <div id="not-allowed-to-name-this-semantically-sorry">
        <ul id="fuck-off-adblock-stop-hiding-these" class="button-list">
            <li><a target="_blank" class="button fqacebook-button" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share this post on Facebook">Share on Facebook</a></li>
            <li><a target="_blank" class="button tqwitter-button" href="http://twitter.com/share?text=Currently reading <?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" title="Tweet this post">Tweet this post</a></li>
            <li><a target="_blank" class="button le-rqeddit-button-dae-me-gusta-true-story" href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" title="Reddit this post">Submit to Reddit</a></li>
        </ul>
    </div>

    <p class="single-article-meta">Article by <?php the_author_posts_link(); ?>. Last updated <?php the_modified_date(); ?>.</p>
    <p class="tags"><?php the_tags( 'Filed under: ' ); ?> </p>

    <hr />  

    <?php endwhile; ?>

    <?php if(function_exists('echo_ald_crp')) echo_ald_crp(); ?>

    <hr />

    <?php if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
    ?>

    </article>

</section>

<?php get_footer(); ?>
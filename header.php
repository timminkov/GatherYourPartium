<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php wp_title('>', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <meta name="description" content="Unbiased video game articles. Gather Your Party features Reviews, Interviews, Editorials, Podcasts, Videos and Web Comics. Now 100% DRM Free!">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.png">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <link href='http://fonts.googleapis.com/css?family=Raleway:900,700,600,800,500,400,300,200,100' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Mr+Dafoe' rel='stylesheet' type='text/css'>

    <link href="//gatheryourparty.com" rel="dns-prefetch" />
    <link href="//fonts.googleapis.com" rel="dns-prefetch" />
    <link href="//ajax.googleapis.com" rel="dns-prefetch" />
    <link href="//www.google-analytics.com" rel="dns-prefetch" />

    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
  </head>

  <body>
    <noscript>
        <style>#header-search{display:none;}</style>
    </noscript>

    <!--[if IE]>
      <style>
        *{font-family:Comic Sans, cursive!important;}
      </style>
      <p class="upgrade-browser">You are using an <strong>outdated</strong> browser. Please <a href="http://getfirefox.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <nav id="topbar">
      <ul id="header-nav">
        <li><h1><a href="<?php echo site_url(); ?>">Gather Your Party</a></h1></li>
        <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'items_wrap' => '%3$s', ) ); ?>
        <li><a href="<?php echo site_url(); ?>/search/" id="search-button">Search</a></li>
      </ul>

      <?php get_search_form(); ?>

      <?php
        wp_nav_menu( array(
          'items_wrap' => '<select id="mobile-menu"> <option value="">Navigation</option>%3$s  <option value="'.get_home_url().'">Home</option>   </select>',
          'show_home' => true,
          'walker'  => new Walker_Nav_Menu_Dropdown()));
      ?>

    </nav>

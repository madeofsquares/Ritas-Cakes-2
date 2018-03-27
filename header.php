<!doctype html>
<html <?php language_attributes(); ?> >

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php bloginfo( 'name' ); ?> <?php wp_title( ', ', true, 'left' ); ?></title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php bloginfo( 'template_url' ); ?>/jquery.min.js"></script>
    <script type='text/javascript' src='<?php bloginfo( 'template_url' ); ?>/script.js'></script>
    
    <link rel="shortcut icon" href="<?php bloginfo( 'template_url' ); ?>/assets/favicon.png" />
    
    <base href="<?php echo site_url(); ?>/">
        
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    
    <?php wp_head(); ?> 
</head>

<body>

<header role="banner" class="site-header">
    <div class="site-branding">
        <?php
        if ( has_custom_logo() ) {
            if ( function_exists( 'the_custom_logo' ) ) { 
                the_custom_logo();
            }
        } else { ?>
            <h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
        <?php } ?>
    </div>
    
    <nav role="navigation" class="site-nav">
        <div class="menu-btn"><span id="lbl-off">menu</span><span id="lbl-on">close</span></div>
        <?php wp_nav_menu( array(
            'theme_location'    => 'main-nav',
            'container'         => 'div',
            'container_class'   => 'nav-menu',
            'container_id'      => 'nav-menu',
            'items_wrap'        => '%3$s',
            'walker'            => new Microdot_Walker_Nav_Menu(),
        ) ); ?>
    </nav>
    
</header>


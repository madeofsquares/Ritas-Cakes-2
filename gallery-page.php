<?php /* Template Name: Gallery Page */ ?>

<?php get_header(); ?>

<main role="main">
    
    <?php
    $args = array(
        'post_status' =>        'inherit',
        'posts_per_page' =>     20,
        'post_type' =>          'attachment',
    );
    
    $terms = get_post_meta( $post->ID, 'image_cat', false );
    
    $args['tax_query'] = array(
        array(
            'taxonomy' =>       'image_category',
            'terms' =>          $terms,
            'field' =>          'slug',
        ),
    );
    
    $the_query = new WP_Query( $args );
    
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            
            $img_src = wp_get_attachment_image_src( $post->ID );
            echo '<img src="' . $img_src[0] . '" />';
        }
    }
    
    wp_reset_postdata();
    ?>
    
</main>

<?php get_footer(); ?>
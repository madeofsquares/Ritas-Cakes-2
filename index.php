<?php get_header(); ?>

<main role="main">
        <?php if( have_posts() ) : while( have_posts() ) : the_post();
        
        get_template_part( 'template_parts/loop', get_post_format() );

        endwhile;

        get_template_part( 'template_parts/pagination' );

        else :
            get_template_part( 'template_parts/nothing' );

        endif; ?>
</main>

<?php get_footer(); ?>